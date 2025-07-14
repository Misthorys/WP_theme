<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Gestion complète du système de contact
 * - Création de la table
 * - Traitement du formulaire
 * - Envoi d'emails
 * - Suppression des contacts
 * VERSION CORRIGÉE
 */

// ========================================
// CRÉATION DE LA TABLE DES CONTACTS
// ========================================

// Créer la table des contacts
function isabel_create_contacts_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'isabel_contacts';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        service varchar(100) NOT NULL,
        message text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $result = dbDelta($sql);
    
    // Log pour vérifier la création
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
        error_log('Isabel Contact Form - Table créée avec succès');
    } else {
        error_log('Isabel Contact Form - Erreur lors de la création de la table');
    }
    
    return $result;
}

// Hook pour créer la table
add_action('after_switch_theme', 'isabel_create_contacts_table');

// Créer la table si elle n'existe pas au chargement
add_action('init', function() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'isabel_contacts';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        isabel_create_contacts_table();
    }
});

// ========================================
// GESTION DU FORMULAIRE DE CONTACT
// ========================================

// Fonction pour sauvegarder les contacts dans la base de données
function isabel_save_contact_to_db($name, $email, $phone, $service, $message) {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'isabel_contacts';
    
    // Vérifier que la table existe
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        error_log('Isabel Contact Form - Table isabel_contacts n\'existe pas');
        isabel_create_contacts_table(); // Tenter de créer la table
    }
    
    $result = $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'service' => $service,
            'message' => $message,
            'created_at' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s')
    );
    
    if ($result === false) {
        error_log('Isabel Contact Form - Erreur SQL: ' . $wpdb->last_error);
        return false;
    }
    
    error_log('Isabel Contact Form - Contact sauvegardé avec ID: ' . $wpdb->insert_id);
    return true;
}

// Fonction pour construire le corps de l'email
function isabel_build_email_body($name, $email, $phone, $service, $message) {
    $html_body = '<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px;">';
    $html_body .= '<div style="background: linear-gradient(135deg, #e4a7f5, #c47dd9); padding: 20px; text-align: center; color: white;">';
    $html_body .= '<h1 style="margin: 0; font-size: 24px;">Nouvelle demande de contact</h1>';
    $html_body .= '</div>';
    
    $html_body .= '<div style="padding: 30px; background: #f9f9f9;">';
    $html_body .= '<div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">';
    
    $html_body .= '<h2 style="color: #c47dd9; margin-top: 0;">Informations du contact</h2>';
    $html_body .= '<table style="width: 100%; border-collapse: collapse;">';
    $html_body .= '<tr><td style="padding: 10px 0; border-bottom: 1px solid #eee;"><strong>Nom :</strong></td><td style="padding: 10px 0; border-bottom: 1px solid #eee;">' . esc_html($name) . '</td></tr>';
    $html_body .= '<tr><td style="padding: 10px 0; border-bottom: 1px solid #eee;"><strong>Email :</strong></td><td style="padding: 10px 0; border-bottom: 1px solid #eee;"><a href="mailto:' . esc_attr($email) . '" style="color: #c47dd9;">' . esc_html($email) . '</a></td></tr>';
    $html_body .= '<tr><td style="padding: 10px 0; border-bottom: 1px solid #eee;"><strong>Téléphone :</strong></td><td style="padding: 10px 0; border-bottom: 1px solid #eee;"><a href="tel:' . esc_attr($phone) . '" style="color: #c47dd9;">' . esc_html($phone) . '</a></td></tr>';
    $html_body .= '<tr><td style="padding: 10px 0; border-bottom: 1px solid #eee;"><strong>Service :</strong></td><td style="padding: 10px 0; border-bottom: 1px solid #eee;">' . esc_html($service) . '</td></tr>';
    $html_body .= '</table>';
    
    if (!empty($message)) {
        $html_body .= '<h3 style="color: #c47dd9; margin-top: 25px;">Message :</h3>';
        $html_body .= '<div style="background: #f8f9fa; padding: 15px; border-left: 4px solid #c47dd9; margin: 10px 0; border-radius: 5px;">';
        $html_body .= nl2br(esc_html($message));
        $html_body .= '</div>';
    }
    
    $html_body .= '</div>';
    $html_body .= '</div>';
    
    $html_body .= '<div style="padding: 20px; text-align: center; background: #333; color: #999; font-size: 12px;">';
    $html_body .= '<p style="margin: 0;">Email envoyé depuis : ' . get_site_url() . '</p>';
    $html_body .= '<p style="margin: 5px 0 0 0;">Date : ' . date('d/m/Y à H:i') . '</p>';
    $html_body .= '</div>';
    $html_body .= '</div>';
    
    return $html_body;
}

// Traitement AJAX du formulaire - VERSION CORRIGÉE
function isabel_handle_contact_ajax() {
    // Log pour débug
    error_log('Isabel Contact Form - Début du traitement AJAX');
    error_log('Isabel Contact Form - POST data: ' . print_r($_POST, true));
    
    // Vérification du nonce pour la sécurité
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'isabel_contact_nonce')) {
        error_log('Isabel Contact Form - Erreur de nonce');
        wp_send_json_error('Erreur de sécurité - Nonce invalide');
        return;
    }
    
    // Récupération et nettoyage des données
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $service = isset($_POST['service']) ? sanitize_text_field($_POST['service']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
    
    // Log des données nettoyées
    error_log('Isabel Contact Form - Données nettoyées: Name=' . $name . ', Email=' . $email . ', Phone=' . $phone);
    
    // Validation des champs obligatoires
    if (empty($name) || empty($email) || empty($phone)) {
        error_log('Isabel Contact Form - Champs obligatoires manquants');
        wp_send_json_error('Veuillez remplir tous les champs obligatoires.');
        return;
    }
    
    // Validation de l'email
    if (!is_email($email)) {
        error_log('Isabel Contact Form - Email invalide: ' . $email);
        wp_send_json_error('Veuillez entrer une adresse email valide.');
        return;
    }
    
    // Sauvegarde en base de données EN PREMIER
    error_log('Isabel Contact Form - Tentative de sauvegarde en base');
    $saved = isabel_save_contact_to_db($name, $email, $phone, $service, $message);
    
    if (!$saved) {
        error_log('Isabel Contact Form - Erreur lors de la sauvegarde en base');
        wp_send_json_error('Erreur lors de la sauvegarde. Veuillez réessayer.');
        return;
    }
    
    error_log('Isabel Contact Form - Sauvegarde en base réussie');
    
    // Configuration de l'email
    $admin_email = get_option('admin_email'); // Email admin WordPress
    $site_email = isabel_get_option('isabel_email', 'contact@forma-coach.com');
    
    // Utiliser l'email admin si pas d'email configuré
    $to = !empty($site_email) ? $site_email : $admin_email;
    
    $subject = 'Nouvelle demande de contact - ' . isabel_get_option('isabel_main_name', 'Isabel GONCALVES');
    
    // Corps de l'email en HTML
    $html_body = isabel_build_email_body($name, $email, $phone, $service, $message);
    
    // Headers de l'email - VERSION CORRIGÉE
    $headers = array();
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $admin_email . '>'; // Utiliser l'email admin pour From
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    
    error_log('Isabel Contact Form - Tentative d\'envoi email vers: ' . $to);
    
    // Envoi de l'email
    $sent = wp_mail($to, $subject, $html_body, $headers);
    
    // Log pour debug
    if ($sent) {
        error_log('Isabel Contact Form - Email envoyé avec succès');
    } else {
        error_log('Isabel Contact Form - Erreur lors de l\'envoi de l\'email');
        // Récupérer l'erreur PHPMailer si disponible
        global $phpmailer;
        if (isset($phpmailer)) {
            error_log('Isabel Contact Form - Erreur PHPMailer: ' . $phpmailer->ErrorInfo);
        }
    }
    
    // Réponse TOUJOURS positive car la sauvegarde a fonctionné
    if ($sent) {
        error_log('Isabel Contact Form - Succès complet');
        wp_send_json_success('🎉 Parfait ! Votre demande a été enregistrée et envoyée. Isabel vous contactera très rapidement pour programmer votre rendez-vous.');
    } else {
        error_log('Isabel Contact Form - Succès partiel (sauvegarde OK, email KO)');
        wp_send_json_success('✅ Votre demande a été enregistrée avec succès. Isabel vous contactera très rapidement. (Note: problème temporaire d\'envoi email)');
    }
}

// Hook pour les utilisateurs connectés et non connectés
add_action('wp_ajax_isabel_contact', 'isabel_handle_contact_ajax');
add_action('wp_ajax_nopriv_isabel_contact', 'isabel_handle_contact_ajax');

// ========================================
// SUPPRESSION DES CONTACTS
// ========================================

// Traitement AJAX de la suppression
function isabel_delete_contact_ajax() {
    // Vérification des permissions
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Permissions insuffisantes');
        return;
    }
    
    // Vérification du nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'isabel_delete_contact_nonce')) {
        wp_send_json_error('Erreur de sécurité');
        return;
    }
    
    $contact_id = isset($_POST['contact_id']) ? intval($_POST['contact_id']) : 0;
    
    if ($contact_id <= 0) {
        wp_send_json_error('ID de contact invalide');
        return;
    }
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'isabel_contacts';
    
    $deleted = $wpdb->delete(
        $table_name,
        array('id' => $contact_id),
        array('%d')
    );
    
    if ($deleted !== false) {
        wp_send_json_success('Contact supprimé avec succès');
    } else {
        wp_send_json_error('Erreur lors de la suppression');
    }
}

add_action('wp_ajax_isabel_delete_contact', 'isabel_delete_contact_ajax');

// ========================================
// FONCTIONS DE DEBUG
// ========================================

// Fonction pour tester la configuration email
function isabel_test_email_config() {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    error_log('=== TEST EMAIL CONFIG ===');
    error_log('Admin email: ' . get_option('admin_email'));
    error_log('Site email: ' . isabel_get_option('isabel_email', 'contact@forma-coach.com'));
    error_log('Bloginfo name: ' . get_bloginfo('name'));
    
    // Test basique d'envoi
    $test_result = wp_mail(
        get_option('admin_email'), 
        'Test Isabel Contact Form', 
        'Ceci est un test d\'envoi email depuis le thème Isabel.',
        array('Content-Type: text/html; charset=UTF-8')
    );
    
    error_log('Test email result: ' . ($test_result ? 'SUCCESS' : 'FAILED'));
    error_log('=== FIN TEST EMAIL ===');
}

// Hook pour tester la config email depuis l'admin
add_action('wp_ajax_isabel_test_email', 'isabel_test_email_config');

// ========================================
// HOOKS POUR AMÉLIORER LA COMPATIBILITÉ
// ========================================

// S'assurer que les hooks AJAX sont bien enregistrés
add_action('wp_loaded', function() {
    if (!has_action('wp_ajax_isabel_contact')) {
        add_action('wp_ajax_isabel_contact', 'isabel_handle_contact_ajax');
        add_action('wp_ajax_nopriv_isabel_contact', 'isabel_handle_contact_ajax');
        error_log('Isabel Contact Form - Hooks AJAX réenregistrés');
    }
});

// Debug pour vérifier que les hooks sont actifs
add_action('init', function() {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Isabel Contact Form - Hooks enregistrés: ' . 
            (has_action('wp_ajax_isabel_contact') ? 'OUI' : 'NON'));
    }
});