<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * CUSTOMIZER MODULAIRE ISABEL GONCALVES
 * Version 1.0 - Système organisé par ordre visuel de la page
 * 
 * ORDRE STRICT : DE HAUT EN BAS DE LA PAGE
 * 🏠 En-tête → 🖼️ Images → ✨ Section hero → 🏆 Qualiopi → 🎯 Services → 
 * 💬 Témoignages → 📞 CTA → 📝 Formulaire → 📄 Footer → 📋 Pages détaillées → 🎨 Couleurs
 */

/**
 * Fonction principale du customizer - ORDRE STRICT DE HAUT EN BAS
 */
function isabel_customize_register($wp_customize) {
    
    // ==========================================
    // 1️⃣ EN-TÊTE DU SITE (priority: 10)
    // ==========================================
    isabel_customizer_header($wp_customize);
    
    // ==========================================
    // 2️⃣ MES PHOTOS (priority: 20)
    // ==========================================
    isabel_customizer_images($wp_customize);
    
    // ==========================================
    // 3️⃣ SECTION D'ACCUEIL - HERO (priority: 30)
    // ==========================================
    isabel_customizer_homepage($wp_customize);
    
    // ==========================================
    // 4️⃣ CERTIFICATION QUALIOPI (priority: 40)
    // ==========================================
    isabel_customizer_qualiopi($wp_customize);
    
    // ==========================================
    // 5️⃣ MES SERVICES (priority: 50)
    // ==========================================
    isabel_customizer_services($wp_customize);
    
    // ==========================================
    // 6️⃣ TÉMOIGNAGES CLIENTS (priority: 60)
    // ==========================================
    isabel_customizer_testimonials($wp_customize);
    
    // ==========================================
    // 7️⃣ APPEL À L'ACTION FINAL (priority: 70)
    // ==========================================
    isabel_customizer_contact($wp_customize);
    
    // ==========================================
    // 8️⃣ PIED DE PAGE (priority: 80)
    // ==========================================
    isabel_customizer_footer($wp_customize);
    
    // ==========================================
    // 9️⃣ PAGES DÉTAILLÉES (priority: 90+)
    // ==========================================
    isabel_customizer_coaching($wp_customize);    // priority: 91
    isabel_customizer_vae($wp_customize);         // priority: 92
    isabel_customizer_hypno($wp_customize);       // priority: 93
    isabel_customizer_consultation($wp_customize); // priority: 94
    
    // ==========================================
    // 🔟 COULEURS ET STYLE GLOBAL (priority: 200)
    // ==========================================
    isabel_customizer_colors($wp_customize);
}

/**
 * Charger tous les fichiers modulaires dans l'ordre
 */
function isabel_load_customizer_modules() {
    $customizer_dir = get_template_directory() . '/inc/customizer/';
    
    // Liste des fichiers dans l'ordre EXACT du cours de la page
    $modules = array(
        'customizer-header.php',         // 🏠 EN-TÊTE
        'customizer-images.php',         // 🖼️ IMAGES
        'customizer-homepage.php',       // ✨ SECTION HERO
        'customizer-qualiopi.php',       // 🏆 CERTIFICATION
        'customizer-services.php',       // 🎯 SERVICES
        'customizer-testimonials.php',   // 💬 TÉMOIGNAGES
        'customizer-contact.php',        // 📞 CTA + FORMULAIRE
        'customizer-footer.php',         // 📄 PIED DE PAGE
        'customizer-coaching.php',       // 📋 PAGE COACHING
        'customizer-vae.php',           // 📋 PAGE VAE
        'customizer-hypno.php',         // 📋 PAGE HYPNO
        'customizer-consultation.php',   // 📋 PAGE CONSULTATION
        'customizer-colors.php',        // 🎨 COULEURS
    );
    
    // Charger chaque module
    foreach ($modules as $module) {
        $file_path = $customizer_dir . $module;
        if (file_exists($file_path)) {
            require_once $file_path;
        } else {
            // Log d'erreur si un fichier est manquant
            error_log('Isabel Customizer: Fichier manquant - ' . $file_path);
        }
    }
}

/**
 * Fonctions utilitaires communes à tous les modules
 */

/**
 * Créer une section avec priorité automatique
 */
function isabel_add_customizer_section($wp_customize, $id, $title, $description, $priority) {
    $wp_customize->add_section($id, array(
        'title' => $title,
        'description' => $description,
        'priority' => $priority,
    ));
}

/**
 * Ajouter un paramètre et un contrôle de texte
 */
function isabel_add_text_control($wp_customize, $setting_id, $section, $label, $description = '', $default = '', $type = 'text') {
    // Paramètre
    $wp_customize->add_setting($setting_id, array(
        'default' => $default,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    
    // Contrôle
    $wp_customize->add_control($setting_id, array(
        'label' => $label,
        'description' => $description,
        'section' => $section,
        'type' => $type,
    ));
}

/**
 * Ajouter un paramètre et un contrôle de textarea
 */
function isabel_add_textarea_control($wp_customize, $setting_id, $section, $label, $description = '', $default = '') {
    // Paramètre
    $wp_customize->add_setting($setting_id, array(
        'default' => $default,
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'refresh',
    ));
    
    // Contrôle
    $wp_customize->add_control($setting_id, array(
        'label' => $label,
        'description' => $description,
        'section' => $section,
        'type' => 'textarea',
    ));
}

/**
 * Ajouter un paramètre et un contrôle d'image
 */
function isabel_add_image_control($wp_customize, $setting_id, $section, $label, $description = '') {
    // Paramètre
    $wp_customize->add_setting($setting_id, array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    
    // Contrôle
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, array(
        'label' => $label,
        'description' => $description,
        'section' => $section,
        'settings' => $setting_id,
    )));
}

/**
 * Ajouter un paramètre et un contrôle de couleur
 */
function isabel_add_color_control($wp_customize, $setting_id, $section, $label, $default = '#e4a7f5') {
    // Paramètre
    $wp_customize->add_setting($setting_id, array(
        'default' => $default,
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    
    // Contrôle
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
        'label' => $label,
        'section' => $section,
        'settings' => $setting_id,
    )));
}

/**
 * Ajouter un paramètre et un contrôle checkbox
 */
function isabel_add_checkbox_control($wp_customize, $setting_id, $section, $label, $description = '', $default = true) {
    // Paramètre
    $wp_customize->add_setting($setting_id, array(
        'default' => $default,
        'sanitize_callback' => 'isabel_sanitize_checkbox',
        'transport' => 'refresh',
    ));
    
    // Contrôle
    $wp_customize->add_control($setting_id, array(
        'label' => $label,
        'description' => $description,
        'section' => $section,
        'type' => 'checkbox',
    ));
}

/**
 * Ajouter un paramètre et un contrôle select
 */
function isabel_add_select_control($wp_customize, $setting_id, $section, $label, $choices, $description = '', $default = '') {
    // Paramètre
    $wp_customize->add_setting($setting_id, array(
        'default' => $default,
        'sanitize_callback' => 'isabel_sanitize_select',
        'transport' => 'refresh',
    ));
    
    // Contrôle
    $wp_customize->add_control($setting_id, array(
        'label' => $label,
        'description' => $description,
        'section' => $section,
        'type' => 'select',
        'choices' => $choices,
    ));
}

/**
 * Fonctions de validation
 */
function isabel_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

function isabel_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

/**
 * Initialisation du système modulaire
 */
function isabel_init_modular_customizer() {
    // Charger tous les modules
    isabel_load_customizer_modules();
    
    // Hook pour enregistrer le customizer
    add_action('customize_register', 'isabel_customize_register');
    
    // Log de confirmation
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('✅ Isabel Customizer Modulaire initialisé avec succès');
    }
}

// Lancer l'initialisation
isabel_init_modular_customizer();

/**
 * Documentation pour Isabel
 * 
 * STRUCTURE DU CUSTOMIZER - ORDRE VISUEL DE LA PAGE :
 * 
 * 1. 🏠 En-tête du site (Logo, nom, sous-titre)
 * 2. 🖼️ Mes photos (Profil desktop, mobile, fond hero)
 * 3. ✨ Section d'accueil (Badge, nom, titre, présentation, bouton)
 * 4. 🏆 Certification Qualiopi (Logo, texte, style)
 * 5. 🎯 Mes services (Titre, 4 services complets)
 * 6. 💬 Témoignages clients (Titre, description)
 * 7. 📞 Appel à l'action (Titre, texte, bouton)
 * 8. 📝 Formulaire de contact (Titre, sous-titre, note, bouton)
 * 9. 📄 Pied de page (Email, téléphone, texte)
 * 10. 📋 Pages détaillées (Coaching, VAE, Hypno, Consultation)
 * 11. 🎨 Couleurs et style global
 * 
 * UTILISATION :
 * - Allez dans Apparence > Personnaliser
 * - Les sections apparaissent dans l'ordre EXACT de votre page
 * - Chaque modification se voit immédiatement
 * - Utilisez **texte** pour le gras et les retours à la ligne
 */