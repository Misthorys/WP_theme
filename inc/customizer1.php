<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Customizer COMPLET pour le thème Isabel
 * TOUS les textes sont maintenant modifiables
 * VERSION COMPLÈTE AVEC QUALIOPI ET ZONES SÉPARÉES
 */

function isabel_customize_register($wp_customize) {
    
    // ===== SECTION HEADER ET LOGO =====
    $wp_customize->add_section('isabel_header_section', array(
        'title' => '🏠 Header et Logo',
        'priority' => 28,
    ));
    
    // Logo du header
    $wp_customize->add_setting('isabel_header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'isabel_header_logo', array(
        'label' => 'Logo du header',
        'description' => 'Logo affiché dans le header (recommandé: 100x100px)',
        'section' => 'isabel_header_section',
        'settings' => 'isabel_header_logo',
    )));

    // Nom principal (header)
    $wp_customize->add_setting('isabel_header_name', array(
        'default' => 'Isabel GONCALVES',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_header_name', array(
        'label' => 'Nom dans le header',
        'description' => 'Nom affiché à côté du logo dans le header',
        'section' => 'isabel_header_section',
        'type' => 'text',
    ));
    
    // Sous-titre (header)
    $wp_customize->add_setting('isabel_header_subtitle', array(
        'default' => 'Formatrice & Coach Certifiée',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_header_subtitle', array(
        'label' => 'Sous-titre dans le header',
        'description' => 'Texte affiché sous le nom dans le header',
        'section' => 'isabel_header_section',
        'type' => 'text',
    ));
    
    // ===== SECTION IMAGES =====
    $wp_customize->add_section('isabel_profile_section', array(
        'title' => '📷 Images du site',
        'priority' => 29,
    ));
    
    // Image de profil principale (cercle desktop)
    $wp_customize->add_setting('isabel_profile_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'isabel_profile_image', array(
        'label' => 'Image de profil principale (cercle desktop)',
        'description' => 'Cette image apparaît dans le cercle à droite sur desktop (recommandé: 400x400px)',
        'section' => 'isabel_profile_section',
        'settings' => 'isabel_profile_image',
    )));

    // Image de fond hero mobile/desktop
    $wp_customize->add_setting('isabel_hero_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'isabel_hero_background_image', array(
        'label' => 'Image de fond - Section héro',
        'description' => 'Image de fond pour la section héro (cerisier). Visible sur mobile et desktop (recommandé: 1920x1080px)',
        'section' => 'isabel_profile_section',
        'settings' => 'isabel_hero_background_image',
    )));

    // Image de profil mobile
    $wp_customize->add_setting('isabel_mobile_profile_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'isabel_mobile_profile_image', array(
        'label' => 'Image de profil pour mobile',
        'description' => 'Image de profil spécifique pour mobile, s\'affiche au-dessus du texte (recommandé: 300x300px)',
        'section' => 'isabel_profile_section',
        'settings' => 'isabel_mobile_profile_image',
    )));
    
    // ==========================================
    // ✨ SECTION D'ACCUEIL
    // ==========================================
    $wp_customize->add_section('isabel_homepage', array(
        'title' => '✨ Section d\'accueil',
        'priority' => 30,
    ));
    
    // Badge
    $wp_customize->add_setting('isabel_badge', array(
        'default' => 'Coach certifié',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_badge', array(
        'label' => 'Badge',
        'section' => 'isabel_homepage',
        'type' => 'text',
    ));
    
    // Nom
    $wp_customize->add_setting('isabel_name', array(
        'default' => 'Isabel Goncalves',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_name', array(
        'label' => 'Nom',
        'section' => 'isabel_homepage',
        'type' => 'text',
    ));
    
    // Titre principal
    $wp_customize->add_setting('isabel_main_title', array(
        'default' => 'Accompagnement personnalisé vers votre réussite professionnelle',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_main_title', array(
        'label' => 'Titre principal',
        'section' => 'isabel_homepage',
        'type' => 'text',
    ));
    
    // Présentation
    $wp_customize->add_setting('isabel_presentation', array(
        'default' => 'Coach professionnel certifié, je vous accompagne dans votre développement personnel et professionnel.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('isabel_presentation', array(
        'label' => 'Présentation',
        'section' => 'isabel_homepage',
        'type' => 'textarea',
    ));
    
    // Texte du bouton
    $wp_customize->add_setting('isabel_button_text', array(
        'default' => 'Découvrir mes services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_button_text', array(
        'label' => 'Texte du bouton',
        'section' => 'isabel_homepage',
        'type' => 'text',
    ));
    
    // ==========================================
    // 🏆 CERTIFICATION QUALIOPI
    // ==========================================
    $wp_customize->add_section('isabel_qualiopi', array(
        'title' => '🏆 Certification Qualiopi',
        'priority' => 40,
    ));

    // Activer/désactiver la section
    $wp_customize->add_setting('isabel_qualiopi_enable', array(
        'default' => true,
        'sanitize_callback' => 'isabel_sanitize_checkbox',
    ));

    $wp_customize->add_control('isabel_qualiopi_enable', array(
        'label' => 'Afficher la certification Qualiopi',
        'section' => 'isabel_qualiopi',
        'type' => 'checkbox',
    ));

    // Logo Qualiopi
    $wp_customize->add_setting('isabel_qualiopi_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'isabel_qualiopi_logo', array(
        'label' => 'Logo Qualiopi',
        'section' => 'isabel_qualiopi',
        'settings' => 'isabel_qualiopi_logo',
    )));

    // Titre
    $wp_customize->add_setting('isabel_qualiopi_title', array(
        'default' => 'Organisme de formation certifié Qualiopi',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('isabel_qualiopi_title', array(
        'label' => 'Titre',
        'section' => 'isabel_qualiopi',
        'type' => 'text',
    ));

    // Description
    $wp_customize->add_setting('isabel_qualiopi_description', array(
        'default' => 'La certification qualité a été délivrée au titre de la catégorie d\'actions suivante : actions de formation',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('isabel_qualiopi_description', array(
        'label' => 'Description',
        'section' => 'isabel_qualiopi',
        'type' => 'textarea',
    ));

    // Numéro de certification
    $wp_customize->add_setting('isabel_qualiopi_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('isabel_qualiopi_number', array(
        'label' => 'Numéro de certification',
        'section' => 'isabel_qualiopi',
        'type' => 'text',
    ));

    // Date de certification
    $wp_customize->add_setting('isabel_qualiopi_date', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('isabel_qualiopi_date', array(
        'label' => 'Date de certification',
        'section' => 'isabel_qualiopi',
        'type' => 'text',
    ));

    // Style de la section
    $wp_customize->add_setting('isabel_qualiopi_style', array(
        'default' => 'standard',
        'sanitize_callback' => 'isabel_sanitize_select',
    ));

    $wp_customize->add_control('isabel_qualiopi_style', array(
        'label' => 'Style de la section',
        'section' => 'isabel_qualiopi',
        'type' => 'select',
        'choices' => array(
            'standard' => 'Standard',
            'compact' => 'Compact',
            'premium' => 'Premium',
        ),
    ));

    // ==========================================
    // 🎯 MES SERVICES
    // ==========================================
    $wp_customize->add_section('isabel_services', array(
        'title' => '🎯 Mes services',
        'priority' => 50,
    ));
    
    // Titre de la section
    $wp_customize->add_setting('isabel_services_title', array(
        'default' => 'Mes services d\'accompagnement',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_services_title', array(
        'label' => 'Titre de la section',
        'section' => 'isabel_services',
        'type' => 'text',
    ));
    
    // Service 1
    $wp_customize->add_setting('isabel_service_1_title', array(
        'default' => 'Coaching personnel',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_service_1_title', array(
        'label' => 'Service 1 - Titre',
        'section' => 'isabel_services',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_service_1_description', array(
        'default' => 'Accompagnement personnalisé pour développer votre potentiel',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('isabel_service_1_description', array(
        'label' => 'Service 1 - Description',
        'section' => 'isabel_services',
        'type' => 'textarea',
    ));
    
    // Service 2
    $wp_customize->add_setting('isabel_service_2_title', array(
        'default' => 'Accompagnement VAE',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_service_2_title', array(
        'label' => 'Service 2 - Titre',
        'section' => 'isabel_services',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_service_2_description', array(
        'default' => 'Validation des Acquis de l\'Expérience',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('isabel_service_2_description', array(
        'label' => 'Service 2 - Description',
        'section' => 'isabel_services',
        'type' => 'textarea',
    ));
    
    // Service 3
    $wp_customize->add_setting('isabel_service_3_title', array(
        'default' => 'Hypnocoaching',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_service_3_title', array(
        'label' => 'Service 3 - Titre',
        'section' => 'isabel_services',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_service_3_description', array(
        'default' => 'Combinaison d\'hypnose et de coaching',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('isabel_service_3_description', array(
        'label' => 'Service 3 - Description',
        'section' => 'isabel_services',
        'type' => 'textarea',
    ));
    
    // Service 4
    $wp_customize->add_setting('isabel_service_4_title', array(
        'default' => 'Consultation découverte',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_service_4_title', array(
        'label' => 'Service 4 - Titre',
        'section' => 'isabel_services',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_service_4_description', array(
        'default' => 'Première rencontre pour définir vos objectifs',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('isabel_service_4_description', array(
        'label' => 'Service 4 - Description',
        'section' => 'isabel_services',
        'type' => 'textarea',
    ));
    
    // ==========================================
    // 💬 TÉMOIGNAGES CLIENTS
    // ==========================================
    $wp_customize->add_section('isabel_testimonials', array(
        'title' => '💬 Témoignages clients',
        'priority' => 60,
    ));
    
    // Titre de la section
    $wp_customize->add_setting('isabel_testimonials_title', array(
        'default' => 'Ce que disent mes clients',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_testimonials_title', array(
        'label' => 'Titre de la section',
        'section' => 'isabel_testimonials',
        'type' => 'text',
    ));
    
    // Description
    $wp_customize->add_setting('isabel_testimonials_description', array(
        'default' => 'Découvrez les retours d\'expérience de mes clients',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('isabel_testimonials_description', array(
        'label' => 'Description',
        'section' => 'isabel_testimonials',
        'type' => 'textarea',
    ));
    
    // ==========================================
    // 📞 APPEL À L'ACTION
    // ==========================================
    $wp_customize->add_section('isabel_contact', array(
        'title' => '📞 Appel à l\'action',
        'priority' => 70,
    ));
    
    // Titre
    $wp_customize->add_setting('isabel_cta_title', array(
        'default' => 'Prêt à transformer votre vie ?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_cta_title', array(
        'label' => 'Titre',
        'section' => 'isabel_contact',
        'type' => 'text',
    ));
    
    // Texte
    $wp_customize->add_setting('isabel_cta_text', array(
        'default' => 'Contactez-moi pour un accompagnement personnalisé',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('isabel_cta_text', array(
        'label' => 'Texte',
        'section' => 'isabel_contact',
        'type' => 'textarea',
    ));
    
    // Texte du bouton
    $wp_customize->add_setting('isabel_cta_button', array(
        'default' => 'Me contacter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_cta_button', array(
        'label' => 'Texte du bouton',
        'section' => 'isabel_contact',
        'type' => 'text',
    ));
    
    // ==========================================
    // 📄 PIED DE PAGE
    // ==========================================
    $wp_customize->add_section('isabel_footer', array(
        'title' => '📄 Pied de page',
        'priority' => 80,
    ));
    
    // Email
    $wp_customize->add_setting('isabel_footer_email', array(
        'default' => 'contact@isabelgoncalves.fr',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('isabel_footer_email', array(
        'label' => 'Email',
        'section' => 'isabel_footer',
        'type' => 'email',
    ));
    
    // Téléphone
    $wp_customize->add_setting('isabel_footer_phone', array(
        'default' => '06 12 34 56 78',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_footer_phone', array(
        'label' => 'Téléphone',
        'section' => 'isabel_footer',
        'type' => 'text',
    ));
    
    // Texte du footer
    $wp_customize->add_setting('isabel_footer_text', array(
        'default' => '© 2024 Isabel Goncalves - Tous droits réservés',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('isabel_footer_text', array(
        'label' => 'Texte du footer',
        'section' => 'isabel_footer',
        'type' => 'text',
    ));
    
    // ==========================================
    // 🎨 COULEURS ET STYLE
    // ==========================================
    $wp_customize->add_section('isabel_colors', array(
        'title' => '🎨 Couleurs et style',
        'priority' => 200,
    ));
    
    // Couleur principale
    $wp_customize->add_setting('isabel_primary_color', array(
        'default' => '#e4a7f5',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'isabel_primary_color', array(
        'label' => 'Couleur principale',
        'section' => 'isabel_colors',
        'settings' => 'isabel_primary_color',
    )));
    
    // Couleur secondaire
    $wp_customize->add_setting('isabel_secondary_color', array(
        'default' => '#8b5cf6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'isabel_secondary_color', array(
        'label' => 'Couleur secondaire',
        'section' => 'isabel_colors',
        'settings' => 'isabel_secondary_color',
    )));
}

// Fonctions de validation
function isabel_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

function isabel_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}
