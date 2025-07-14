<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

// ========================================
// CONFIGURATION DU THÈME
// ========================================

function isabel_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ));
    
    register_nav_menus(array(
        'main-menu' => 'Menu Principal',
    ));
}
add_action('after_setup_theme', 'isabel_theme_setup');

// Enqueue des styles et scripts - VERSION CORRIGÉE
function isabel_theme_scripts() {
    // Enqueue du CSS
    wp_enqueue_style('isabel-style', get_stylesheet_uri(), array(), '2.0.2');
    
    // Enqueue du JavaScript - CORRECTION : enlever jQuery en dépendance
    wp_enqueue_script('isabel-script', get_template_directory_uri() . '/js/main.js', array(), '2.0.2', true);
    
    // CORRECTION : Localiser le script APRÈS l'avoir enregistré
    wp_localize_script('isabel-script', 'isabel_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('isabel_contact_nonce'),
        'delete_nonce' => wp_create_nonce('isabel_delete_contact_nonce'),
        'debug' => defined('WP_DEBUG') && WP_DEBUG ? true : false
    ));
    
    // Debug pour vérifier la localisation
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Isabel Theme - Script isabel-script enregistré et localisé');
        error_log('Isabel Theme - AJAX URL: ' . admin_url('admin-ajax.php'));
        error_log('Isabel Theme - Nonce généré: ' . wp_create_nonce('isabel_contact_nonce'));
    }
}
add_action('wp_enqueue_scripts', 'isabel_theme_scripts');

// ========================================
// INCLUSIONS DES FICHIERS ORGANISÉS
// ========================================

// Charger le customizer (toutes les options de personnalisation)
require_once get_template_directory() . '/inc/customizer.php';

// Charger la gestion des contacts
require_once get_template_directory() . '/inc/contact-handler.php';

// Charger la gestion des témoignages
require_once get_template_directory() . '/inc/testimonials.php';

// Charger la gestion des pages de services
require_once get_template_directory() . '/inc/service-pages.php';

// Charger l'interface d'administration
require_once get_template_directory() . '/inc/admin-interface.php';

// ========================================
// FONCTIONS UTILITAIRES
// ========================================

// Fonction pour récupérer les options du thème
function isabel_get_option($option_name, $default = '') {
    return get_theme_mod($option_name, $default);
}

// Fonction pour afficher l'image de profil ou le placeholder
function isabel_get_profile_image($size = 'full', $css_class = '') {
    $profile_image = isabel_get_option('isabel_profile_image', '');
    
    if (!empty($profile_image)) {
        return '<img src="' . esc_url($profile_image) . '" alt="Photo de profil" class="' . esc_attr($css_class) . '" />';
    }
    
    return ''; // Retourne vide si pas d'image, le CSS placeholder s'occupera du reste
}

// ========================================
// SÉCURITÉ ET NETTOYAGE
// ========================================

// Nettoyage et sécurité
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

function isabel_remove_version() {
    return '';
}
add_filter('the_generator', 'isabel_remove_version');

// ========================================
// ACTIVATION DU CUSTOMIZER
// ========================================

add_action('customize_register', 'isabel_customize_register');

// ========================================
// AMÉLIORATION DE LA CONFIGURATION EMAIL
// ========================================

// Configurer WordPress pour améliorer l'envoi d'emails
add_action('phpmailer_init', function($phpmailer) {
    // Log de debug pour l'email
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Isabel Email - Configuration PHPMailer');
        error_log('From: ' . $phpmailer->From);
        error_log('FromName: ' . $phpmailer->FromName);
    }
});

// Filtre pour forcer l'email From
add_filter('wp_mail_from', function($from_email) {
    // Utiliser l'email admin par défaut pour éviter les problèmes de deliverabilité
    $admin_email = get_option('admin_email');
    
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Isabel Email - From email: ' . $admin_email);
    }
    
    return $admin_email;
});

add_filter('wp_mail_from_name', function($from_name) {
    return get_bloginfo('name');
});

// ========================================
// HOOKS DE VÉRIFICATION AU CHARGEMENT
// ========================================

// Vérifier que tout est en ordre au chargement
add_action('wp_loaded', function() {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('=== ISABEL THEME LOADED CHECK ===');
        error_log('Contact handler hooks registered: ' . (has_action('wp_ajax_isabel_contact') ? 'YES' : 'NO'));
        error_log('Admin interface loaded: ' . (function_exists('isabel_contacts_page') ? 'YES' : 'NO'));
        error_log('Customizer loaded: ' . (function_exists('isabel_customize_register') ? 'YES' : 'NO'));
        
        // Vérifier la table
        global $wpdb;
        $table_name = $wpdb->prefix . 'isabel_contacts';
        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name;
        error_log('Contact table exists: ' . ($table_exists ? 'YES' : 'NO'));
        
        error_log('===================================');
    }
});

// ========================================
// CODE DE DIAGNOSTIC TEMPORAIRE
// ========================================

// DIAGNOSTIC COMPLET AU CHARGEMENT
add_action('wp_footer', function() {
    if (is_front_page() || is_home()) {
        ?>
        <script>
        console.log('=== DIAGNOSTIC ISABEL - DÉBUT ===');
        
        // Vérifier que le DOM est chargé
        document.addEventListener('DOMContentLoaded', function() {
            console.log('✅ DOM chargé');
            
            // 1. Vérifier isabel_ajax
            if (typeof isabel_ajax !== 'undefined') {
                console.log('✅ isabel_ajax disponible:', isabel_ajax);
            } else {
                console.error('❌ isabel_ajax NON DÉFINI - PROBLÈME CRITIQUE');
                console.log('Scripts chargés:', document.querySelectorAll('script[src*="main.js"]'));
            }
            
            // 2. Vérifier les éléments DOM
            const modal = document.getElementById('modal-overlay');
            const form = document.querySelector('.modal-form');
            const submitButton = document.querySelector('.form-submit');
            
            console.log('Modal overlay:', modal ? '✅ Trouvé' : '❌ Manquant');
            console.log('Formulaire:', form ? '✅ Trouvé' : '❌ Manquant');
            console.log('Bouton submit:', submitButton ? '✅ Trouvé' : '❌ Manquant');
            
            // 3. Vérifier les fonctions globales
            console.log('openPopup fonction:', typeof window.openPopup);
            console.log('handleFormSubmit fonction:', typeof window.handleFormSubmit);
            
            // 4. Test direct de l'URL AJAX
            console.log('URL AJAX WordPress:', '<?php echo admin_url('admin-ajax.php'); ?>');
            
            // 5. Vérifier que le formulaire a bien l'événement onsubmit
            if (form) {
                console.log('Attribut onsubmit du formulaire:', form.getAttribute('onsubmit'));
            }
            
            console.log('=== FIN DIAGNOSTIC INITIAL ===');
        });
        </script>
        <?php
    }
});

// SOLUTION ALTERNATIVE - Script direct dans le footer
add_action('wp_footer', function() {
    if (is_front_page() || is_home()) {
        ?>
        <script>
        // Définir isabel_ajax manuellement si pas défini
        if (typeof isabel_ajax === 'undefined') {
            window.isabel_ajax = {
                ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>',
                nonce: '<?php echo wp_create_nonce('isabel_contact_nonce'); ?>',
                debug: <?php echo (defined('WP_DEBUG') && WP_DEBUG) ? 'true' : 'false'; ?>
            };
            console.log('🔧 isabel_ajax défini manuellement:', isabel_ajax);
        } else {
            console.log('✅ isabel_ajax déjà disponible via wp_localize_script');
        }
        </script>
        <?php
    }
}, 5); // Priorité haute pour charger avant les autres scripts

// TEST DIRECT DE L'ACTION AJAX
add_action('wp_ajax_test_isabel', 'test_isabel_ajax');
add_action('wp_ajax_nopriv_test_isabel', 'test_isabel_ajax');

function test_isabel_ajax() {
    wp_send_json_success('Test AJAX fonctionne ! Heure: ' . current_time('mysql'));
}

// FORCER LA VÉRIFICATION DES HOOKS
add_action('wp_head', function() {
    if (current_user_can('manage_options')) {
        echo '<!-- ISABEL DEBUG: Hook isabel_contact = ' . (has_action('wp_ajax_isabel_contact') ? 'ACTIF' : 'INACTIF') . ' -->' . "\n";
        echo '<!-- ISABEL DEBUG: Hook isabel_contact_nopriv = ' . (has_action('wp_ajax_nopriv_isabel_contact') ? 'ACTIF' : 'INACTIF') . ' -->' . "\n";
    }
});

// LOG DÉTAILLÉ DU CHARGEMENT DES SCRIPTS
add_action('wp_enqueue_scripts', function() {
    error_log('=== ISABEL SCRIPT ENQUEUE ===');
    error_log('Template directory: ' . get_template_directory_uri());
    error_log('Main.js path: ' . get_template_directory_uri() . '/js/main.js');
    error_log('Main.js exists: ' . (file_exists(get_template_directory() . '/js/main.js') ? 'YES' : 'NO'));
    error_log('AJAX URL: ' . admin_url('admin-ajax.php'));
    error_log('===========================');
}, 999);

// VÉRIFICATION DE LA TABLE
add_action('init', function() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'isabel_contacts';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name;
    
    if (!$table_exists) {
        error_log('ISABEL: Table contacts manquante - création en cours');
        if (function_exists('isabel_create_contacts_table')) {
            isabel_create_contacts_table();
        }
    } else {
        error_log('ISABEL: Table contacts existe');
    }
});

// INTERCEPTER TOUTES LES REQUÊTES AJAX avec priorité haute
add_action('wp_ajax_isabel_contact', function() {
    error_log('ISABEL: Action isabel_contact appelée avec POST: ' . print_r($_POST, true));
    
    // Appeler la fonction originale si elle existe
    if (function_exists('isabel_handle_contact_ajax')) {
        isabel_handle_contact_ajax();
    } else {
        error_log('ISABEL: Fonction isabel_handle_contact_ajax non trouvée');
        wp_send_json_error('Fonction de traitement non trouvée');
    }
}, 1);

add_action('wp_ajax_nopriv_isabel_contact', function() {
    error_log('ISABEL: Action isabel_contact (nopriv) appelée');
    
    if (function_exists('isabel_handle_contact_ajax')) {
        isabel_handle_contact_ajax();
    } else {
        error_log('ISABEL: Fonction isabel_handle_contact_ajax non trouvée');
        wp_send_json_error('Fonction de traitement non trouvée');
    }
}, 1);

?>