<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Customizer COMPLET pour le thème Isabel
 * TOUS les textes sont maintenant modifiables
 * VERSION COMPLÈTE
 */

function isabel_customize_register($wp_customize) {
    
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
    
    // ===== SECTION HERO =====
    $wp_customize->add_section('isabel_hero_section', array(
        'title' => '🏠 Section d\'accueil',
        'priority' => 30,
    ));
    
    // Nom principal
    $wp_customize->add_setting('isabel_main_name', array(
        'default' => 'Isabel GONCALVES',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_main_name', array(
        'label' => 'Nom principal',
        'section' => 'isabel_hero_section',
        'type' => 'text',
    ));
    
    // Sous-titre
    $wp_customize->add_setting('isabel_subtitle', array(
        'default' => 'Coach Certifiée & Hypnocoach',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_subtitle', array(
        'label' => 'Sous-titre',
        'section' => 'isabel_hero_section',
        'type' => 'text',
    ));
    
    // Texte d'introduction
    $wp_customize->add_setting('isabel_intro_text', array(
        'default' => 'Bienvenue dans votre espace de transformation personnelle ! Je vous accompagne avec bienveillance vers l\'épanouissement de votre potentiel grâce au coaching, à la VAE et à l\'hypnocoaching.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('isabel_intro_text', array(
        'label' => 'Texte d\'introduction',
        'section' => 'isabel_hero_section',
        'type' => 'textarea',
    ));
    
    // Texte du bouton principal
    $wp_customize->add_setting('isabel_main_button_text', array(
        'default' => 'Prendre rendez-vous',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_main_button_text', array(
        'label' => 'Texte du bouton principal',
        'section' => 'isabel_hero_section',
        'type' => 'text',
    ));
    
    // === SECTION CARD SECONDAIRE ===
    $wp_customize->add_setting('isabel_why_choose_title', array(
        'default' => '✨ Pourquoi me choisir ?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_why_choose_title', array(
        'label' => 'Titre "Pourquoi me choisir"',
        'section' => 'isabel_hero_section',
        'type' => 'text',
    ));
    
    // 4 points "Pourquoi me choisir"
    for ($i = 1; $i <= 4; $i++) {
        $defaults = array(
            1 => '🎯 Approche personnalisée',
            2 => '📜 Certification professionnelle',
            3 => '🧠 Méthodes innovantes',
            4 => '💼 Accompagnement sur mesure'
        );
        
        $wp_customize->add_setting("isabel_why_point_$i", array(
            'default' => $defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("isabel_why_point_$i", array(
            'label' => "Point $i - Pourquoi me choisir",
            'section' => 'isabel_hero_section',
            'type' => 'text',
        ));
    }
    
    // ===== SECTION ALERTE =====
    $wp_customize->add_section('isabel_alert_section', array(
        'title' => '🎁 Barre d\'alerte',
        'priority' => 31,
    ));
    
    $wp_customize->add_setting('isabel_alert_text', array(
        'default' => '🎯 Transformez votre vie avec un accompagnement personnalisé sur mesure !',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_alert_text', array(
        'label' => 'Texte de l\'alerte',
        'section' => 'isabel_alert_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_alert_button', array(
        'default' => 'Prendre rendez-vous',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_alert_button', array(
        'label' => 'Texte du bouton d\'alerte',
        'section' => 'isabel_alert_section',
        'type' => 'text',
    ));
    
    // ===== SECTION SERVICES =====
    $wp_customize->add_section('isabel_services_section', array(
        'title' => '🎯 Services',
        'priority' => 32,
    ));
    
    $wp_customize->add_setting('isabel_services_title', array(
        'default' => 'Mes Accompagnements Sur Mesure',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_services_title', array(
        'label' => 'Titre de la section services',
        'section' => 'isabel_services_section',
        'type' => 'text',
    ));
    
    // Sous-titre des services
    $wp_customize->add_setting('isabel_services_subtitle', array(
        'default' => 'Quatre approches complémentaires pour révéler votre potentiel et atteindre vos objectifs personnels et professionnels.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('isabel_services_subtitle', array(
        'label' => 'Sous-titre de la section services',
        'section' => 'isabel_services_section',
        'type' => 'textarea',
    ));
    
    // Services 1, 2, 3, 4 - TOUS LES SERVICES
    $services = array(
        1 => array('icon' => '🎯', 'title' => 'Coaching Personnel', 'desc' => 'Révélez votre potentiel, clarifiez vos objectifs et transformez votre vie avec un accompagnement personnalisé et des outils concrets.'),
        2 => array('icon' => '🎓', 'title' => 'Accompagnement VAE', 'desc' => 'Valorisez votre expérience et obtenez une reconnaissance officielle de vos compétences grâce à un accompagnement expert VAE.'),
        3 => array('icon' => '🧘', 'title' => 'Hypnocoaching', 'desc' => 'Libérez-vous de vos blocages en profondeur en combinant les bienfaits de l\'hypnose thérapeutique et du coaching de vie.'),
        4 => array('icon' => '💡', 'title' => 'Consultation Découverte', 'desc' => 'Première rencontre gratuite pour faire connaissance, comprendre vos besoins et définir ensemble le meilleur accompagnement pour vous.')
    );
    
    foreach ($services as $num => $service) {
        // Icône
        $wp_customize->add_setting("isabel_service{$num}_icon", array(
            'default' => $service['icon'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("isabel_service{$num}_icon", array(
            'label' => "Service $num - Icône",
            'section' => 'isabel_services_section',
            'type' => 'text',
        ));
        
        // Titre
        $wp_customize->add_setting("isabel_service{$num}_title", array(
            'default' => $service['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("isabel_service{$num}_title", array(
            'label' => "Service $num - Titre",
            'section' => 'isabel_services_section',
            'type' => 'text',
        ));
        
        // Description
        $wp_customize->add_setting("isabel_service{$num}_desc", array(
            'default' => $service['desc'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("isabel_service{$num}_desc", array(
            'label' => "Service $num - Description",
            'section' => 'isabel_services_section',
            'type' => 'textarea',
        ));
    }

    // ===== SECTION TÉMOIGNAGES =====
    $wp_customize->add_section('isabel_testimonials_section', array(
        'title' => '💬 Témoignages',
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('isabel_testimonials_title', array(
        'default' => 'Ce que disent mes clients',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_testimonials_title', array(
        'label' => 'Titre de la section témoignages',
        'section' => 'isabel_testimonials_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_testimonials_subtitle', array(
        'default' => 'Découvrez les témoignages de personnes qui ont transformé leur vie grâce à un accompagnement personnalisé.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('isabel_testimonials_subtitle', array(
        'label' => 'Sous-titre de la section témoignages',
        'section' => 'isabel_testimonials_section',
        'type' => 'textarea',
    ));

    // ===== SECTION CTA FINAL =====
    $wp_customize->add_section('isabel_cta_section', array(
        'title' => '📞 Call-to-Action final',
        'priority' => 34,
    ));
    
    $wp_customize->add_setting('isabel_cta_title', array(
        'default' => 'Prêt(e) à Commencer Votre Transformation ?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_cta_title', array(
        'label' => 'Titre du CTA final',
        'section' => 'isabel_cta_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_cta_text', array(
        'default' => 'Contactez-moi dès maintenant pour discuter de vos objectifs et découvrir comment je peux vous accompagner.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('isabel_cta_text', array(
        'label' => 'Texte du CTA final',
        'section' => 'isabel_cta_section',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('isabel_cta_button', array(
        'default' => 'Prendre rendez-vous',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_cta_button', array(
        'label' => 'Texte du bouton CTA',
        'section' => 'isabel_cta_section',
        'type' => 'text',
    ));
    
    // ===== SECTION FORMULAIRE =====
    $wp_customize->add_section('isabel_form_section', array(
        'title' => '📝 Formulaire de contact',
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('isabel_form_title', array(
        'default' => 'Réservez Votre Rendez-vous',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_form_title', array(
        'label' => 'Titre du formulaire',
        'section' => 'isabel_form_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_form_subtitle', array(
        'default' => 'Première consultation personnalisée',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_form_subtitle', array(
        'label' => 'Sous-titre du formulaire',
        'section' => 'isabel_form_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('isabel_form_note', array(
        'default' => '💼 Première consultation pour faire connaissance et définir vos besoins ensemble.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('isabel_form_note', array(
        'label' => 'Note du formulaire',
        'section' => 'isabel_form_section',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('isabel_form_button', array(
        'default' => 'Confirmer ma demande de rendez-vous',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_form_button', array(
        'label' => 'Texte du bouton du formulaire',
        'section' => 'isabel_form_section',
        'type' => 'text',
    ));
    
    // ===== SECTION FOOTER =====
    $wp_customize->add_section('isabel_footer_section', array(
        'title' => '📄 Footer',
        'priority' => 36,
    ));
    
    $wp_customize->add_setting('isabel_footer_note', array(
        'default' => '💼 Accompagnement professionnel<br>Contactez-moi pour commencer votre transformation',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('isabel_footer_note', array(
        'label' => 'Note du footer',
        'section' => 'isabel_footer_section',
        'type' => 'textarea',
    ));
    
    // Contact
    $wp_customize->add_setting('isabel_email', array(
        'default' => 'contact@forma-coach.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('isabel_email', array(
        'label' => 'Email de contact',
        'section' => 'isabel_footer_section',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('isabel_phone', array(
        'default' => '+33123456789',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_phone', array(
        'label' => 'Numéro de téléphone',
        'section' => 'isabel_footer_section',
        'type' => 'tel',
    ));

    // ===== COULEURS =====
    $wp_customize->add_section('isabel_colors_section', array(
        'title' => '🎨 Couleurs',
        'priority' => 37,
    ));
    
    $wp_customize->add_setting('isabel_primary_color', array(
        'default' => '#e4a7f5',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'isabel_primary_color', array(
        'label' => 'Couleur principale',
        'section' => 'isabel_colors_section',
        'settings' => 'isabel_primary_color',
    )));

    // ===== INCLURE LES PAGES DE SERVICES =====
    isabel_add_coaching_customizer($wp_customize);
    isabel_add_vae_customizer($wp_customize);
    isabel_add_hypno_customizer($wp_customize);
    isabel_add_consultation_customizer($wp_customize);
}

// ===== COACHING PERSONNEL - VERSION COMPLÈTE =====
function isabel_add_coaching_customizer($wp_customize) {
    $wp_customize->add_section('isabel_coaching_section', array(
        'title' => '🎯 Page Coaching Personnel',
        'priority' => 40,
    ));
    
    $coaching_settings = array(
        'isabel_coaching_title' => array('default' => 'Coaching Personnel', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_coaching_subtitle' => array('default' => 'Révélez votre potentiel et transformez votre vie personnelle et professionnelle', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_coaching_section1_title' => array('default' => 'Qu\'est-ce que le coaching personnel ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_coaching_intro' => array('default' => 'Le coaching personnel est un accompagnement sur mesure qui vous aide à clarifier vos objectifs, développer votre potentiel et créer la vie que vous désirez vraiment.', 'type' => 'textarea', 'label' => 'Introduction'),
        'isabel_coaching_description' => array('default' => 'Que vous souhaitiez améliorer votre confiance en vous, changer de carrière, améliorer vos relations ou simplement mieux vous connaître, le coaching personnel vous offre l\'espace et les ressources nécessaires.', 'type' => 'textarea', 'label' => 'Description détaillée'),
        'isabel_coaching_benefits_title' => array('default' => 'Mon processus d\'accompagnement', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_coaching_process_title' => array('default' => 'Mon processus d\'accompagnement', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_coaching_section2_title' => array('default' => 'Pour qui ?', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_coaching_who' => array('default' => 'Le coaching personnel s\'adresse à toute personne qui souhaite évoluer, qu\'elle soit en questionnement professionnel, en transition de vie, ou simplement désireuse d\'améliorer sa qualité de vie.', 'type' => 'textarea', 'label' => 'Pour qui ?'),
        'isabel_coaching_section3_title' => array('default' => 'Mes domaines d\'expertise', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_coaching_expertise' => array('default' => 'Fort de mon expérience et de ma certification professionnelle, je vous accompagne sur diverses thématiques : développement de la confiance en soi, gestion du stress et des émotions...', 'type' => 'textarea', 'label' => 'Mon expertise'),
        'isabel_coaching_cta_title' => array('default' => 'Prêt(e) à commencer votre transformation ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_coaching_cta_text' => array('default' => 'Contactez-moi pour discuter de vos objectifs et découvrir comment le coaching personnel peut vous aider.', 'type' => 'textarea', 'label' => 'Texte du CTA'),
        'isabel_coaching_cta_button' => array('default' => 'Prendre rendez-vous', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $coaching_settings, 'isabel_coaching_section');
    
    // Bénéfices et étapes
    $coaching_benefits = array(
        1 => 'Définissez clairement vos priorités et tracez un chemin précis vers vos aspirations personnelles et professionnelles.',
        2 => 'Développez une estime de soi solide et apprenez à croire en vos capacités pour relever tous les défis.',
        3 => 'Naviguez sereinement dans les transitions de vie et transformez les obstacles en opportunités de croissance.',
        4 => 'Trouvez l\'harmonie parfaite entre vos ambitions professionnelles et votre épanouissement personnel.'
    );
    
    $coaching_steps = array(
        1 => 'Nous explorons ensemble votre situation actuelle, vos défis et vos aspirations pour définir un plan d\'action personnalisé.',
        2 => 'Nous clarifions vos objectifs SMART et établissons une feuille de route claire avec des étapes concrètes.',
        3 => 'Sessions régulières pour travailler sur vos blocages, développer de nouvelles compétences et avancer vers vos objectifs.',
        4 => 'Évaluation continue de vos progrès et adaptation de la stratégie pour optimiser votre réussite.'
    );
    
    isabel_add_benefits_and_steps($wp_customize, 'coaching', $coaching_benefits, $coaching_steps, 'isabel_coaching_section');
}

// ===== VAE - VERSION COMPLÈTE =====
function isabel_add_vae_customizer($wp_customize) {
    $wp_customize->add_section('isabel_vae_section', array(
        'title' => '🎓 Page Accompagnement VAE',
        'priority' => 41,
    ));
    
    $vae_settings = array(
        'isabel_vae_title' => array('default' => 'Accompagnement VAE', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_vae_subtitle' => array('default' => 'Valorisez votre expérience et obtenez une reconnaissance officielle de vos compétences', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_vae_section1_title' => array('default' => 'Qu\'est-ce que la VAE ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_vae_intro' => array('default' => 'La Validation des Acquis de l\'Expérience (VAE) est un dispositif qui permet de faire reconnaître officiellement vos compétences acquises par l\'expérience professionnelle.', 'type' => 'textarea', 'label' => 'Introduction'),
        'isabel_vae_description' => array('default' => 'Avec au moins 3 ans d\'expérience dans le domaine visé, vous pouvez prétendre à une VAE. C\'est une opportunité unique de valoriser votre parcours.', 'type' => 'textarea', 'label' => 'Description'),
        'isabel_vae_benefits_title' => array('default' => 'Les étapes de votre VAE', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_vae_process_title' => array('default' => 'Les étapes de votre VAE', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_vae_section2_title' => array('default' => 'Qui peut bénéficier de la VAE ?', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_vae_who' => array('default' => 'Toute personne justifiant d\'au moins 3 ans d\'expérience professionnelle, bénévole ou de formation en rapport avec le diplôme visé.', 'type' => 'textarea', 'label' => 'Qui peut bénéficier ?'),
        'isabel_vae_section3_title' => array('default' => 'Mon expertise VAE', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_vae_expertise' => array('default' => 'Forte de mon expérience en accompagnement VAE, je vous guide dans toutes les étapes de votre démarche.', 'type' => 'textarea', 'label' => 'Mon expertise'),
        'isabel_vae_section4_title' => array('default' => 'Diplômes et certifications concernés', 'type' => 'text', 'label' => 'Titre section 4'),
        'isabel_vae_diplomas' => array('default' => 'La VAE permet d\'obtenir des diplômes de tous niveaux : CAP, Bac professionnel, BTS, DUT, Licence, Master, titres professionnels, certificats de qualification professionnelle (CQP).', 'type' => 'textarea', 'label' => 'Diplômes concernés'),
        'isabel_vae_cta_title' => array('default' => 'Prêt(e) à valoriser votre expérience ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_vae_cta_text' => array('default' => 'Contactez-moi pour une première évaluation de votre projet VAE et découvrons ensemble les possibilités qui s\'offrent à vous.', 'type' => 'textarea', 'label' => 'Texte du CTA'),
        'isabel_vae_cta_button' => array('default' => 'Évaluer mon projet VAE', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $vae_settings, 'isabel_vae_section');
    
    $vae_benefits = array(
        1 => 'Obtenez un diplôme ou une certification reconnue par l\'État, équivalente à une formation traditionnelle.',
        2 => 'Évitez de reprendre des études longues grâce à la valorisation de votre expérience existante.',
        3 => 'Accédez à de nouvelles opportunités de carrière et augmentez votre employabilité.',
        4 => 'Investissement réduit comparé à une formation complète, avec un retour sur investissement rapide.'
    );
    
    $vae_steps = array(
        1 => 'Analyse de votre parcours et identification du diplôme le plus adapté à votre expérience professionnelle.',
        2 => 'Aide à la rédaction du livret 1 (recevabilité) et accompagnement dans les démarches administratives.',
        3 => 'Accompagnement personnalisé pour la rédaction du dossier de validation détaillant vos compétences.',
        4 => 'Simulation d\'entretien et conseils pour présenter votre dossier avec confiance devant le jury.'
    );
    
    isabel_add_benefits_and_steps($wp_customize, 'vae', $vae_benefits, $vae_steps, 'isabel_vae_section');
}

// ===== HYPNOCOACHING - VERSION COMPLÈTE =====
function isabel_add_hypno_customizer($wp_customize) {
    $wp_customize->add_section('isabel_hypno_section', array(
        'title' => '🧘 Page Hypnocoaching',
        'priority' => 42,
    ));
    
    $hypno_settings = array(
        'isabel_hypno_title' => array('default' => 'Hypnocoaching', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_hypno_subtitle' => array('default' => 'Libérez-vous de vos blocages en profondeur grâce à l\'alliance du coaching et de l\'hypnose', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_hypno_section1_title' => array('default' => 'Qu\'est-ce que l\'hypnocoaching ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_hypno_intro' => array('default' => 'L\'hypnocoaching est une approche innovante qui combine les bienfaits du coaching traditionnel avec la puissance de l\'hypnose thérapeutique.', 'type' => 'textarea', 'label' => 'Introduction'),
        'isabel_hypno_description' => array('default' => 'En état d\'hypnose, votre esprit devient plus réceptif aux changements positifs. Cette approche douce et respectueuse vous permet de transformer en profondeur vos croyances limitantes.', 'type' => 'textarea', 'label' => 'Description'),
        'isabel_hypno_benefits_title' => array('default' => 'Déroulement d\'une séance d\'hypnocoaching', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_hypno_process_title' => array('default' => 'Déroulement d\'une séance d\'hypnocoaching', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_hypno_section2_title' => array('default' => 'Domaines d\'application', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_hypno_applications' => array('default' => 'L\'hypnocoaching est particulièrement efficace pour : gérer le stress et l\'anxiété, surmonter les phobies et les peurs, améliorer la confiance en soi, arrêter de fumer ou perdre du poids.', 'type' => 'textarea', 'label' => 'Domaines d\'application'),
        'isabel_hypno_section3_title' => array('default' => 'Mythes et réalités sur l\'hypnose', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_hypno_myths' => array('default' => 'Contrairement aux idées reçues, l\'hypnose thérapeutique n\'a rien à voir avec l\'hypnose de spectacle. Vous restez conscient(e) et maître(sse) de vos choix à tout moment.', 'type' => 'textarea', 'label' => 'Mythes et réalités'),
        'isabel_hypno_section4_title' => array('default' => 'Ma formation et mon approche', 'type' => 'text', 'label' => 'Titre section 4'),
        'isabel_hypno_formation' => array('default' => 'Certifiée en hypnose thérapeutique, je pratique une approche éthique et bienveillante. Chaque séance est adaptée à votre personnalité et à vos objectifs.', 'type' => 'textarea', 'label' => 'Ma formation'),
        'isabel_hypno_section5_title' => array('default' => 'Contre-indications', 'type' => 'text', 'label' => 'Titre section 5'),
        'isabel_hypno_contraindications' => array('default' => 'L\'hypnose est contre-indiquée en cas de troubles psychiatriques sévères, de psychose, de troubles dissociatifs ou de dépendances lourdes.', 'type' => 'textarea', 'label' => 'Contre-indications'),
        'isabel_hypno_cta_title' => array('default' => 'Prêt(e) à libérer votre potentiel ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_hypno_cta_text' => array('default' => 'Découvrez la puissance de l\'hypnocoaching lors d\'une consultation. Ensemble, nous explorerons comment cette approche peut vous aider.', 'type' => 'textarea', 'label' => 'Texte du CTA'),
        'isabel_hypno_cta_button' => array('default' => 'Découvrir l\'hypnocoaching', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $hypno_settings, 'isabel_hypno_section');
    
    $hypno_benefits = array(
        1 => 'Travaillez directement avec votre inconscient pour identifier et transformer les blocages à leur source.',
        2 => 'Obtenez des changements durables en moins de séances grâce à l\'efficacité de l\'hypnose thérapeutique.',
        3 => 'Modifiez vos schémas de pensée limitants et installez de nouveaux automatismes positifs.',
        4 => 'Méthode naturelle et respectueuse qui vous permet de rester maître de vos choix à tout moment.'
    );
    
    $hypno_steps = array(
        1 => 'Discussion pour comprendre vos objectifs, vos blocages et adapter la séance à vos besoins spécifiques.',
        2 => 'Accompagnement vers un état de relaxation profonde où votre inconscient devient plus réceptif.',
        3 => 'Utilisation de techniques spécifiques pour lever les blocages et installer de nouveaux comportements positifs.',
        4 => 'Retour à l\'état de veille normale et échange sur l\'expérience vécue pour optimiser l\'intégration.'
    );
    
    isabel_add_benefits_and_steps($wp_customize, 'hypno', $hypno_benefits, $hypno_steps, 'isabel_hypno_section');
}

// ===== CONSULTATION DÉCOUVERTE - VERSION COMPLÈTE =====
function isabel_add_consultation_customizer($wp_customize) {
    $wp_customize->add_section('isabel_consultation_section', array(
        'title' => '💡 Page Consultation Découverte',
        'priority' => 43,
    ));
    
    $consultation_settings = array(
        'isabel_consultation_title' => array('default' => 'Consultation Découverte', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_consultation_subtitle' => array('default' => 'Première rencontre gratuite pour définir ensemble votre parcours', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_consultation_section1_title' => array('default' => 'Qu\'est-ce que la consultation découverte ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_consultation_intro' => array('default' => 'La consultation découverte est un moment privilégié pour faire connaissance et comprendre vos besoins spécifiques.', 'type' => 'textarea', 'label' => 'Introduction'),
        'isabel_consultation_description' => array('default' => 'Durant cette première rencontre gratuite de 30 minutes, nous prenons le temps d\'échanger sur votre situation, vos objectifs et vos attentes.', 'type' => 'textarea', 'label' => 'Description détaillée'),
        'isabel_consultation_benefits_title' => array('default' => 'Déroulement de la consultation', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_consultation_process_title' => array('default' => 'Déroulement de la consultation', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_consultation_section2_title' => array('default' => 'Modalités pratiques', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_consultation_duration' => array('default' => 'Cette consultation dure environ 30 minutes et se déroule par téléphone ou en visioconférence, selon votre préférence.', 'type' => 'textarea', 'label' => 'Durée et modalités'),
        'isabel_consultation_section3_title' => array('default' => 'Ce que vous en retirerez', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_consultation_benefits_text' => array('default' => 'Cette rencontre vous permet de poser toutes vos questions et de découvrir comment mes services peuvent vous aider à atteindre vos objectifs.', 'type' => 'textarea', 'label' => 'Bénéfices généraux'),
        'isabel_consultation_highlight_title' => array('default' => '🎁 Consultation 100% gratuite', 'type' => 'text', 'label' => 'Titre encadré mise en avant'),
        'isabel_consultation_highlight_text' => array('default' => 'Cette première rencontre est entièrement offerte et sans aucun engagement. C\'est mon cadeau pour vous permettre de découvrir mes services en toute sérénité.', 'type' => 'textarea', 'label' => 'Texte encadré mise en avant'),
        'isabel_consultation_cta_title' => array('default' => 'Prêt(e) à faire le premier pas ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_consultation_cta_text' => array('default' => 'Réservez dès maintenant votre consultation découverte gratuite et commençons ensemble votre parcours de transformation.', 'type' => 'textarea', 'label' => 'Texte du CTA'),
        'isabel_consultation_cta_button' => array('default' => 'Réserver ma consultation gratuite', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $consultation_settings, 'isabel_consultation_section');
    
    $consultation_benefits = array(
        1 => 'Échange personnalisé pour comprendre votre situation et vos objectifs de vie ou professionnels.',
        2 => 'Présentation des différentes approches de coaching adaptées à votre profil et vos besoins.',
        3 => 'Conseils immédiats et premiers outils pour commencer votre réflexion personnelle.',
        4 => 'Définition ensemble du parcours d\'accompagnement le plus adapté à votre situation.'
    );
    
    $consultation_steps = array(
        1 => 'Accueil et présentation mutuelle pour créer un climat de confiance et d\'écoute bienveillante.',
        2 => 'Écoute active de votre situation, vos défis actuels et vos aspirations pour l\'avenir.',
        3 => 'Exploration des différentes possibilités d\'accompagnement et explication de mes méthodes.',
        4 => 'Proposition d\'un plan d\'accompagnement personnalisé adapté à vos besoins et votre rythme.'
    );
    
    isabel_add_benefits_and_steps($wp_customize, 'consultation', $consultation_benefits, $consultation_steps, 'isabel_consultation_section');
}

// ===== FONCTIONS UTILITAIRES =====

/**
 * Ajouter plusieurs paramètres en une fois
 */
function isabel_add_bulk_settings($wp_customize, $settings, $section) {
    foreach ($settings as $setting_id => $config) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $config['default'],
            'sanitize_callback' => $config['type'] === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field',
        ));
        $wp_customize->add_control($setting_id, array(
            'label' => $config['label'],
            'section' => $section,
            'type' => $config['type'],
        ));
    }
}

/**
 * Ajouter les bénéfices et étapes pour un service
 */
function isabel_add_benefits_and_steps($wp_customize, $service_name, $benefits, $steps, $section) {
    
    // === BOXES SECTION (2 texte + 2 images) ===
    
    // Box 1 - Texte
    $wp_customize->add_setting("isabel_{$service_name}_box1_icon", array(
        'default' => '💬',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box1_icon", array(
        'label' => "Box 1 - Icône",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box1_title", array(
        'default' => 'Échange personnalisé',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box1_title", array(
        'label' => "Box 1 - Titre",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box1_text", array(
        'default' => $benefits[1],
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box1_text", array(
        'label' => "Box 1 - Texte",
        'section' => $section,
        'type' => 'textarea',
    ));
    
    // Box 2 - Image
    $wp_customize->add_setting("isabel_{$service_name}_box2_icon", array(
        'default' => '🎯',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box2_icon", array(
        'label' => "Box 2 - Icône",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box2_title", array(
        'default' => 'Approche adaptée',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box2_title", array(
        'label' => "Box 2 - Titre",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box2_text", array(
        'default' => $benefits[2],
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box2_text", array(
        'label' => "Box 2 - Texte",
        'section' => $section,
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box2_image", array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "isabel_{$service_name}_box2_image", array(
        'label' => "Box 2 - Image",
        'description' => 'Image pour la box 2 (recommandé: 400x300px)',
        'section' => $section,
        'settings' => "isabel_{$service_name}_box2_image",
    )));
    
    // Box 3 - Texte
    $wp_customize->add_setting("isabel_{$service_name}_box3_icon", array(
        'default' => '🧰',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box3_icon", array(
        'label' => "Box 3 - Icône",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box3_title", array(
        'default' => 'Premiers outils',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box3_title", array(
        'label' => "Box 3 - Titre",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box3_text", array(
        'default' => $benefits[3],
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box3_text", array(
        'label' => "Box 3 - Texte",
        'section' => $section,
        'type' => 'textarea',
    ));
    
    // Box 4 - Image
    $wp_customize->add_setting("isabel_{$service_name}_box4_icon", array(
        'default' => '🗺️',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box4_icon", array(
        'label' => "Box 4 - Icône",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box4_title", array(
        'default' => 'Plan personnalisé',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box4_title", array(
        'label' => "Box 4 - Titre",
        'section' => $section,
        'type' => 'text',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box4_text", array(
        'default' => $benefits[4],
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control("isabel_{$service_name}_box4_text", array(
        'label' => "Box 4 - Texte",
        'section' => $section,
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting("isabel_{$service_name}_box4_image", array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "isabel_{$service_name}_box4_image", array(
        'label' => "Box 4 - Image",
        'description' => 'Image pour la box 4 (recommandé: 400x300px)',
        'section' => $section,
        'settings' => "isabel_{$service_name}_box4_image",
    )));
    
    // === ÉTAPES (inchangées) ===
    for ($i = 1; $i <= 4; $i++) {
        // Étapes
        $wp_customize->add_setting("isabel_{$service_name}_step$i", array(
            'default' => $steps[$i],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("isabel_{$service_name}_step$i", array(
            'label' => "Étape $i du processus",
            'section' => $section,
            'type' => 'textarea',
        ));
    }
}

?>