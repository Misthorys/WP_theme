<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Customizer WYSIWYG pour le thème Isabel - COMME WORD/OFFICE
 * Remplace les textarea par des éditeurs visuels complets
 */

function isabel_customize_register($wp_customize) {
    
    // ===== CLASSE PERSONNALISÉE POUR ÉDITEUR WYSIWYG =====
    if (class_exists('WP_Customize_Control')) {
        class Isabel_WYSIWYG_Control extends WP_Customize_Control {
            public $type = 'wysiwyg';
            
            public function render_content() {
                ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                    <?php if (!empty($this->description)) : ?>
                        <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                </label>
                <div class="isabel-wysiwyg-container">
                    <?php
                    $settings = array(
                        'textarea_name' => $this->id,
                        'media_buttons' => true,
                        'textarea_rows' => 8,
                        'tabindex' => null,
                        'editor_css' => '<style>body{font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;}</style>',
                        'editor_class' => 'isabel-wysiwyg-editor',
                        'teeny' => false,
                        'dfw' => false,
                        'tinymce' => array(
                            'toolbar1' => 'bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,backcolor,|,removeformat,|,undo,redo',
                            'toolbar2' => 'formatselect,fontselect,fontsizeselect,|,cut,copy,paste,|,searchreplace,|,charmap,|,fullscreen',
                            'fontsize_formats' => '8px 10px 12px 14px 16px 18px 20px 22px 24px 28px 32px 36px 42px 48px',
                            'height' => 300,
                            'resize' => true,
                            'menubar' => false,
                            'branding' => false,
                            'content_style' => 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 14px; line-height: 1.6; }',
                            'plugins' => 'advlist autolink lists link charmap searchreplace visualblocks code fullscreen paste textcolor colorpicker hr'
                        ),
                        'quicktags' => array(
                            'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,more,close'
                        )
                    );
                    
                    wp_editor($this->value(), $this->id, $settings);
                    ?>
                </div>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Synchroniser avec le customizer
                    if (typeof tinymce !== 'undefined') {
                        tinymce.on('AddEditor', function(e) {
                            if (e.editor.id === '<?php echo $this->id; ?>') {
                                e.editor.on('change keyup', function() {
                                    var content = e.editor.getContent();
                                    wp.customize('<?php echo $this->id; ?>').set(content);
                                });
                            }
                        });
                    }
                });
                </script>
                <?php
            }
        }
    }
    
    // ===== SECTION FORMATAGE DE TEXTE - SIMPLIFIÉE =====
    $wp_customize->add_section('isabel_text_formatting_section', array(
        'title' => '✍️ Formatage de texte avancé',
        'description' => 'Utilisez les éditeurs visuels ci-dessous pour formater vos textes comme dans Word !',
        'priority' => 39,
    ));

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
    
    // ===== SECTION HERO AVEC ÉDITEURS WYSIWYG =====
    $wp_customize->add_section('isabel_hero_section', array(
        'title' => '🏠 Section d\'accueil',
        'priority' => 30,
    ));
    
    // Nom principal (dans le hero - différent du header)
    $wp_customize->add_setting('isabel_main_name', array(
        'default' => 'Isabel GONCALVES',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_main_name', array(
        'label' => 'Nom principal (dans la section d\'accueil)',
        'description' => 'Grand titre dans la section hero (peut être différent du header)',
        'section' => 'isabel_hero_section',
        'type' => 'text',
    ));
    
    // Badge du hero
    $wp_customize->add_setting('isabel_hero_badge', array(
        'default' => 'Coach certifiée',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_hero_badge', array(
        'label' => 'Badge du hero (avec étoile)',
        'description' => 'Petit badge affiché en haut de la section hero',
        'section' => 'isabel_hero_section',
        'type' => 'text',
    ));
    
    // Sous-titre (dans le hero - différent du header)
    $wp_customize->add_setting('isabel_subtitle', array(
        'default' => 'Coach Certifiée & Hypnocoach',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_subtitle', array(
        'label' => 'Sous-titre (dans la section d\'accueil)',
        'description' => 'Sous-titre affiché sous le nom principal dans le hero',
        'section' => 'isabel_hero_section',
        'type' => 'text',
    ));
    
    // TEXTE D'INTRODUCTION AVEC ÉDITEUR WYSIWYG
    $wp_customize->add_setting('isabel_intro_text_wysiwyg', array(
        'default' => 'Bienvenue dans votre espace de transformation personnelle ! Je vous accompagne avec <strong>bienveillance</strong> vers l\'épanouissement de votre potentiel grâce au coaching, à la VAE et à l\'hypnocoaching.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, 'isabel_intro_text_wysiwyg', array(
        'label' => '📝 Texte d\'introduction (éditeur visuel)',
        'description' => 'Formatez votre texte comme dans Word ! Utilisez les boutons pour mettre en gras, italique, changer la couleur, etc.',
        'section' => 'isabel_hero_section',
        'settings' => 'isabel_intro_text_wysiwyg',
    )));
    
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
    
    // ===== SECTION SERVICES AVEC ÉDITEURS WYSIWYG =====
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
    
    // SOUS-TITRE SERVICES AVEC ÉDITEUR WYSIWYG
    $wp_customize->add_setting('isabel_services_subtitle_wysiwyg', array(
        'default' => 'Quatre approches <strong>complémentaires</strong> pour révéler votre potentiel et atteindre vos objectifs personnels et professionnels.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, 'isabel_services_subtitle_wysiwyg', array(
        'label' => '📝 Sous-titre des services (éditeur visuel)',
        'description' => 'Formatez votre sous-titre des services avec l\'éditeur visuel',
        'section' => 'isabel_services_section',
        'settings' => 'isabel_services_subtitle_wysiwyg',
    )));
    
    // Services 1, 2, 3, 4 - AVEC ÉDITEURS WYSIWYG
    $services = array(
        1 => array('icon' => '🎯', 'title' => 'Coaching Personnel', 'desc' => 'Révélez votre <strong>potentiel</strong>, clarifiez vos objectifs et transformez votre vie avec un accompagnement personnalisé et des outils concrets.'),
        2 => array('icon' => '🎓', 'title' => 'Accompagnement VAE', 'desc' => 'Valorisez votre <strong>expérience professionnelle</strong> et obtenez une reconnaissance officielle de vos compétences grâce à un accompagnement expert VAE.'),
        3 => array('icon' => '🧘', 'title' => 'Hypnocoaching', 'desc' => 'Libérez-vous de vos blocages en profondeur en combinant les bienfaits de l\'<em>hypnose thérapeutique</em> et du <strong>coaching de vie</strong>.'),
        4 => array('icon' => '💡', 'title' => 'Consultation Découverte', 'desc' => 'Première rencontre <strong>gratuite</strong> pour faire connaissance, comprendre vos besoins et définir ensemble le meilleur accompagnement pour vous.')
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
        
        // DESCRIPTION AVEC ÉDITEUR WYSIWYG
        $wp_customize->add_setting("isabel_service{$num}_desc_wysiwyg", array(
            'default' => $service['desc'],
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, "isabel_service{$num}_desc_wysiwyg", array(
            'label' => "📝 Service $num - Description (éditeur visuel)",
            'description' => 'Formatez la description du service avec l\'éditeur visuel',
            'section' => 'isabel_services_section',
            'settings' => "isabel_service{$num}_desc_wysiwyg",
        )));
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
    
    // SOUS-TITRE TÉMOIGNAGES AVEC ÉDITEUR WYSIWYG
    $wp_customize->add_setting('isabel_testimonials_subtitle_wysiwyg', array(
        'default' => 'Découvrez les témoignages de personnes qui ont <strong>transformé leur vie</strong> grâce à un accompagnement personnalisé.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, 'isabel_testimonials_subtitle_wysiwyg', array(
        'label' => '📝 Sous-titre témoignages (éditeur visuel)',
        'description' => 'Formatez votre sous-titre des témoignages',
        'section' => 'isabel_testimonials_section',
        'settings' => 'isabel_testimonials_subtitle_wysiwyg',
    )));

    // ===== SECTION CTA FINAL AVEC ÉDITEUR WYSIWYG =====
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
    
    // TEXTE CTA AVEC ÉDITEUR WYSIWYG
    $wp_customize->add_setting('isabel_cta_text_wysiwyg', array(
        'default' => 'Contactez-moi <strong>dès maintenant</strong> pour discuter de vos objectifs et découvrir comment je peux vous accompagner.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, 'isabel_cta_text_wysiwyg', array(
        'label' => '📝 Texte du CTA (éditeur visuel)',
        'description' => 'Formatez votre texte de call-to-action',
        'section' => 'isabel_cta_section',
        'settings' => 'isabel_cta_text_wysiwyg',
    )));
    
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
    
    // NOTE FORMULAIRE AVEC ÉDITEUR WYSIWYG
    $wp_customize->add_setting('isabel_form_note_wysiwyg', array(
        'default' => '💼 Première consultation pour <strong>faire connaissance</strong> et définir vos besoins ensemble.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, 'isabel_form_note_wysiwyg', array(
        'label' => '📝 Note du formulaire (éditeur visuel)',
        'description' => 'Formatez la note explicative du formulaire',
        'section' => 'isabel_form_section',
        'settings' => 'isabel_form_note_wysiwyg',
    )));
    
    $wp_customize->add_setting('isabel_form_button', array(
        'default' => 'Confirmer ma demande de rendez-vous',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('isabel_form_button', array(
        'label' => 'Texte du bouton du formulaire',
        'section' => 'isabel_form_section',
        'type' => 'text',
    ));
    
    // ===== SECTION FOOTER AVEC ÉDITEUR WYSIWYG =====
    $wp_customize->add_section('isabel_footer_section', array(
        'title' => '📄 Footer',
        'priority' => 36,
    ));
    
    // NOTE FOOTER AVEC ÉDITEUR WYSIWYG
    $wp_customize->add_setting('isabel_footer_note_wysiwyg', array(
        'default' => '💼 <strong>Accompagnement professionnel</strong><br>Contactez-moi pour commencer votre transformation',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, 'isabel_footer_note_wysiwyg', array(
        'label' => '📝 Note du footer (éditeur visuel)',
        'description' => 'Formatez la note qui apparaît dans le footer',
        'section' => 'isabel_footer_section',
        'settings' => 'isabel_footer_note_wysiwyg',
    )));
    
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

    // ===== SECTION CERTIFICATION QUALIOPI =====
    $wp_customize->add_section('isabel_qualiopi_section', array(
        'title' => '🏆 Certification Qualiopi',
        'description' => 'Gérez l\'affichage de votre certification Qualiopi sur toutes les pages',
        'priority' => 38,
    ));

    // Activer/Désactiver la section Qualiopi
    $wp_customize->add_setting('isabel_qualiopi_enable', array(
        'default' => true,
        'sanitize_callback' => 'isabel_sanitize_checkbox',
    ));

    $wp_customize->add_control('isabel_qualiopi_enable', array(
        'label' => 'Afficher la certification Qualiopi',
        'description' => 'Cochez pour afficher la section certification sur toutes les pages',
        'section' => 'isabel_qualiopi_section',
        'type' => 'checkbox',
    ));

    // Logo Qualiopi
    $wp_customize->add_setting('isabel_qualiopi_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'isabel_qualiopi_logo', array(
        'label' => 'Logo Qualiopi',
        'description' => 'Uploadez votre logo de certification Qualiopi (format PNG ou JPG recommandé)',
        'section' => 'isabel_qualiopi_section',
        'settings' => 'isabel_qualiopi_logo',
    )));

    // Titre principal
    $wp_customize->add_setting('isabel_qualiopi_title', array(
        'default' => 'Organisme de formation certifié Qualiopi',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('isabel_qualiopi_title', array(
        'label' => 'Titre principal',
        'description' => 'Le titre affiché avec la certification',
        'section' => 'isabel_qualiopi_section',
        'type' => 'text',
    ));

    // DESCRIPTION QUALIOPI AVEC ÉDITEUR WYSIWYG
    $wp_customize->add_setting('isabel_qualiopi_description_wysiwyg', array(
        'default' => 'La certification qualité a été délivrée au titre de la catégorie d\'actions suivante : <strong>actions de formation</strong>',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, 'isabel_qualiopi_description_wysiwyg', array(
        'label' => '📝 Description Qualiopi (éditeur visuel)',
        'description' => 'Formatez le texte descriptif de la certification (mention légale)',
        'section' => 'isabel_qualiopi_section',
        'settings' => 'isabel_qualiopi_description_wysiwyg',
    )));

    // Numéro de certification (optionnel)
    $wp_customize->add_setting('isabel_qualiopi_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('isabel_qualiopi_number', array(
        'label' => 'Numéro de certification (optionnel)',
        'description' => 'Si vous souhaitez afficher le numéro de votre certification',
        'section' => 'isabel_qualiopi_section',
        'type' => 'text',
    ));

    // Date d'obtention (optionnel)
    $wp_customize->add_setting('isabel_qualiopi_date', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('isabel_qualiopi_date', array(
        'label' => 'Date d\'obtention (optionnel)',
        'description' => 'Ex: Certifié depuis 2023',
        'section' => 'isabel_qualiopi_section',
        'type' => 'text',
    ));

    // Style d'affichage
    $wp_customize->add_setting('isabel_qualiopi_style', array(
        'default' => 'standard',
        'sanitize_callback' => 'isabel_sanitize_select',
    ));

    $wp_customize->add_control('isabel_qualiopi_style', array(
        'label' => 'Style d\'affichage',
        'description' => 'Choisissez le style de présentation',
        'section' => 'isabel_qualiopi_section',
        'type' => 'select',
        'choices' => array(
            'standard' => 'Standard (Logo + Texte)',
            'compact' => 'Compact (Plus petit)',
            'premium' => 'Premium (Avec bordure colorée)',
        ),
    ));

    // ===== INCLURE LES PAGES DE SERVICES AVEC ÉDITEURS WYSIWYG =====
    isabel_add_coaching_customizer_wysiwyg($wp_customize);
    isabel_add_vae_customizer_wysiwyg($wp_customize);
    isabel_add_hypno_customizer_wysiwyg($wp_customize);
    isabel_add_consultation_customizer_wysiwyg($wp_customize);
}

// ===== FONCTIONS HELPER POUR RÉCUPÉRER LES CONTENUS WYSIWYG =====

/**
 * Fonction helper pour récupérer le contenu WYSIWYG avec fallback
 */
function isabel_get_wysiwyg_content($wysiwyg_option, $fallback_option, $default = '') {
    $wysiwyg_content = isabel_get_option($wysiwyg_option, '');
    if (!empty($wysiwyg_content)) {
        return $wysiwyg_content;
    }
    
    // Fallback vers l'ancienne option
    $fallback_content = isabel_get_option($fallback_option, $default);
    return wpautop(esc_html($fallback_content)); // Convertir en HTML safe
}

// ===== COACHING PERSONNEL AVEC ÉDITEURS WYSIWYG =====
function isabel_add_coaching_customizer_wysiwyg($wp_customize) {
    $wp_customize->add_section('isabel_coaching_section', array(
        'title' => '🎯 Page Coaching Personnel',
        'priority' => 40,
    ));
    
    // Titres simples
    $coaching_simple_settings = array(
        'isabel_coaching_title' => array('default' => 'Coaching Personnel', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_coaching_subtitle' => array('default' => 'Révélez votre potentiel et transformez votre vie personnelle et professionnelle', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_coaching_section1_title' => array('default' => 'Qu\'est-ce que le coaching personnel ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_coaching_benefits_title' => array('default' => 'Mon processus d\'accompagnement', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_coaching_process_title' => array('default' => 'Mon processus d\'accompagnement', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_coaching_section2_title' => array('default' => 'Pour qui ?', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_coaching_section3_title' => array('default' => 'Mes domaines d\'expertise', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_coaching_cta_title' => array('default' => 'Prêt(e) à commencer votre transformation ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_coaching_cta_button' => array('default' => 'Prendre rendez-vous', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $coaching_simple_settings, 'isabel_coaching_section');
    
    // CONTENUS AVEC ÉDITEURS WYSIWYG
    $coaching_wysiwyg_settings = array(
        'isabel_coaching_intro_wysiwyg' => array(
            'default' => 'Le coaching personnel est un <strong>accompagnement sur mesure</strong> qui vous aide à clarifier vos objectifs, développer votre potentiel et créer la vie que vous désirez vraiment.',
            'label' => '📝 Introduction (éditeur visuel)',
            'description' => 'Présentez le coaching personnel avec l\'éditeur visuel'
        ),
        'isabel_coaching_description_wysiwyg' => array(
            'default' => 'Que vous souhaitiez améliorer votre <em>confiance en vous</em>, changer de carrière, améliorer vos relations ou simplement mieux vous connaître, le coaching personnel vous offre l\'<strong>espace et les ressources nécessaires</strong>.',
            'label' => '📝 Description détaillée (éditeur visuel)',
            'description' => 'Description complète du coaching personnel'
        ),
        'isabel_coaching_who_wysiwyg' => array(
            'default' => 'Le coaching personnel s\'adresse à <strong>toute personne qui souhaite évoluer</strong>, qu\'elle soit en questionnement professionnel, en transition de vie, ou simplement désireuse d\'améliorer sa qualité de vie.',
            'label' => '📝 Pour qui ? (éditeur visuel)',
            'description' => 'Décrivez le public cible'
        ),
        'isabel_coaching_expertise_wysiwyg' => array(
            'default' => 'Fort de mon expérience et de ma <strong>certification professionnelle</strong>, je vous accompagne sur diverses thématiques : développement de la confiance en soi, gestion du stress et des émotions...',
            'label' => '📝 Mon expertise (éditeur visuel)',
            'description' => 'Présentez votre expertise'
        ),
        'isabel_coaching_cta_text_wysiwyg' => array(
            'default' => 'Contactez-moi pour discuter de vos objectifs et découvrir comment le <strong>coaching personnel</strong> peut vous aider.',
            'label' => '📝 Texte du CTA (éditeur visuel)',
            'description' => 'Texte d\'appel à l\'action'
        ),
    );
    
    foreach ($coaching_wysiwyg_settings as $setting_id => $config) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $config['default'],
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, $setting_id, array(
            'label' => $config['label'],
            'description' => $config['description'],
            'section' => 'isabel_coaching_section',
            'settings' => $setting_id,
        )));
    }
    
    // Bénéfices et étapes (texte simple pour ces parties)
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

// ===== VAE AVEC ÉDITEURS WYSIWYG =====
function isabel_add_vae_customizer_wysiwyg($wp_customize) {
    $wp_customize->add_section('isabel_vae_section', array(
        'title' => '🎓 Page Accompagnement VAE',
        'priority' => 41,
    ));
    
    // Titres simples
    $vae_simple_settings = array(
        'isabel_vae_title' => array('default' => 'Accompagnement VAE', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_vae_subtitle' => array('default' => 'Valorisez votre expérience et obtenez une reconnaissance officielle de vos compétences', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_vae_section1_title' => array('default' => 'Qu\'est-ce que la VAE ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_vae_benefits_title' => array('default' => 'Les étapes de votre VAE', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_vae_process_title' => array('default' => 'Les étapes de votre VAE', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_vae_section2_title' => array('default' => 'Qui peut bénéficier de la VAE ?', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_vae_section3_title' => array('default' => 'Mon expertise VAE', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_vae_section4_title' => array('default' => 'Diplômes et certifications concernés', 'type' => 'text', 'label' => 'Titre section 4'),
        'isabel_vae_cta_title' => array('default' => 'Prêt(e) à valoriser votre expérience ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_vae_cta_button' => array('default' => 'Évaluer mon projet VAE', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $vae_simple_settings, 'isabel_vae_section');
    
    // CONTENUS AVEC ÉDITEURS WYSIWYG
    $vae_wysiwyg_settings = array(
        'isabel_vae_intro_wysiwyg' => array(
            'default' => 'La <strong>Validation des Acquis de l\'Expérience (VAE)</strong> est un dispositif qui permet de faire reconnaître officiellement vos compétences acquises par l\'expérience professionnelle.',
            'label' => '📝 Introduction (éditeur visuel)',
            'description' => 'Présentez la VAE avec l\'éditeur visuel'
        ),
        'isabel_vae_description_wysiwyg' => array(
            'default' => 'Avec au moins <strong>3 ans d\'expérience</strong> dans le domaine visé, vous pouvez prétendre à une VAE. C\'est une <em>opportunité unique</em> de valoriser votre parcours.',
            'label' => '📝 Description (éditeur visuel)',
            'description' => 'Description détaillée de la VAE'
        ),
        'isabel_vae_who_wysiwyg' => array(
            'default' => '<strong>Toute personne</strong> justifiant d\'au moins 3 ans d\'expérience professionnelle, bénévole ou de formation en rapport avec le diplôme visé.',
            'label' => '📝 Qui peut bénéficier ? (éditeur visuel)',
            'description' => 'Public éligible à la VAE'
        ),
        'isabel_vae_expertise_wysiwyg' => array(
            'default' => 'Forte de mon <strong>expérience en accompagnement VAE</strong>, je vous guide dans toutes les étapes de votre démarche.',
            'label' => '📝 Mon expertise (éditeur visuel)',
            'description' => 'Votre expertise en VAE'
        ),
        'isabel_vae_diplomas_wysiwyg' => array(
            'default' => 'La VAE permet d\'obtenir des diplômes de <strong>tous niveaux</strong> : CAP, Bac professionnel, BTS, DUT, Licence, Master, titres professionnels, certificats de qualification professionnelle (CQP).',
            'label' => '📝 Diplômes concernés (éditeur visuel)',
            'description' => 'Liste des diplômes disponibles en VAE'
        ),
        'isabel_vae_cta_text_wysiwyg' => array(
            'default' => 'Contactez-moi pour une <strong>première évaluation</strong> de votre projet VAE et découvrons ensemble les possibilités qui s\'offrent à vous.',
            'label' => '📝 Texte du CTA (éditeur visuel)',
            'description' => 'Appel à l\'action pour la VAE'
        ),
    );
    
    foreach ($vae_wysiwyg_settings as $setting_id => $config) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $config['default'],
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, $setting_id, array(
            'label' => $config['label'],
            'description' => $config['description'],
            'section' => 'isabel_vae_section',
            'settings' => $setting_id,
        )));
    }
    
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

// ===== HYPNOCOACHING AVEC ÉDITEURS WYSIWYG =====
function isabel_add_hypno_customizer_wysiwyg($wp_customize) {
    $wp_customize->add_section('isabel_hypno_section', array(
        'title' => '🧘 Page Hypnocoaching',
        'priority' => 42,
    ));
    
    // Titres simples
    $hypno_simple_settings = array(
        'isabel_hypno_title' => array('default' => 'Hypnocoaching', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_hypno_subtitle' => array('default' => 'Libérez-vous de vos blocages en profondeur grâce à l\'alliance du coaching et de l\'hypnose', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_hypno_section1_title' => array('default' => 'Qu\'est-ce que l\'hypnocoaching ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_hypno_benefits_title' => array('default' => 'Déroulement d\'une séance d\'hypnocoaching', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_hypno_process_title' => array('default' => 'Déroulement d\'une séance d\'hypnocoaching', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_hypno_section2_title' => array('default' => 'Domaines d\'application', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_hypno_section3_title' => array('default' => 'Mythes et réalités sur l\'hypnose', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_hypno_section4_title' => array('default' => 'Ma formation et mon approche', 'type' => 'text', 'label' => 'Titre section 4'),
        'isabel_hypno_section5_title' => array('default' => 'Contre-indications', 'type' => 'text', 'label' => 'Titre section 5'),
        'isabel_hypno_cta_title' => array('default' => 'Prêt(e) à libérer votre potentiel ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_hypno_cta_button' => array('default' => 'Découvrir l\'hypnocoaching', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $hypno_simple_settings, 'isabel_hypno_section');
    
    // CONTENUS AVEC ÉDITEURS WYSIWYG
    $hypno_wysiwyg_settings = array(
        'isabel_hypno_intro_wysiwyg' => array(
            'default' => 'L\'<strong>hypnocoaching</strong> est une approche innovante qui combine les bienfaits du coaching traditionnel avec la <em>puissance de l\'hypnose thérapeutique</em>.',
            'label' => '📝 Introduction (éditeur visuel)',
            'description' => 'Présentez l\'hypnocoaching'
        ),
        'isabel_hypno_description_wysiwyg' => array(
            'default' => 'En état d\'hypnose, votre esprit devient <strong>plus réceptif aux changements positifs</strong>. Cette approche douce et respectueuse vous permet de transformer en profondeur vos croyances limitantes.',
            'label' => '📝 Description (éditeur visuel)',
            'description' => 'Expliquez le processus hypnotique'
        ),
        'isabel_hypno_applications_wysiwyg' => array(
            'default' => 'L\'hypnocoaching est particulièrement efficace pour : gérer le <strong>stress et l\'anxiété</strong>, surmonter les <em>phobies et les peurs</em>, améliorer la confiance en soi, arrêter de fumer ou perdre du poids.',
            'label' => '📝 Domaines d\'application (éditeur visuel)',
            'description' => 'Listez les applications de l\'hypnocoaching'
        ),
        'isabel_hypno_myths_wysiwyg' => array(
            'default' => 'Contrairement aux idées reçues, l\'<strong>hypnose thérapeutique</strong> n\'a rien à voir avec l\'hypnose de spectacle. Vous restez <em>conscient(e) et maître(sse)</em> de vos choix à tout moment.',
            'label' => '📝 Mythes et réalités (éditeur visuel)',
            'description' => 'Démystifiez l\'hypnose'
        ),
        'isabel_hypno_formation_wysiwyg' => array(
            'default' => '<strong>Certifiée en hypnose thérapeutique</strong>, je pratique une approche éthique et bienveillante. Chaque séance est adaptée à votre personnalité et à vos objectifs.',
            'label' => '📝 Ma formation (éditeur visuel)',
            'description' => 'Présentez votre formation'
        ),
        'isabel_hypno_contraindications_wysiwyg' => array(
            'default' => 'L\'hypnose est <strong>contre-indiquée</strong> en cas de troubles psychiatriques sévères, de psychose, de troubles dissociatifs ou de dépendances lourdes.',
            'label' => '📝 Contre-indications (éditeur visuel)',
            'description' => 'Mentionnez les contre-indications'
        ),
        'isabel_hypno_cta_text_wysiwyg' => array(
            'default' => 'Découvrez la <strong>puissance de l\'hypnocoaching</strong> lors d\'une consultation. Ensemble, nous explorerons comment cette approche peut vous aider.',
            'label' => '📝 Texte du CTA (éditeur visuel)',
            'description' => 'Appel à l\'action'
        ),
    );
    
    foreach ($hypno_wysiwyg_settings as $setting_id => $config) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $config['default'],
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, $setting_id, array(
            'label' => $config['label'],
            'description' => $config['description'],
            'section' => 'isabel_hypno_section',
            'settings' => $setting_id,
        )));
    }
    
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

// ===== CONSULTATION DÉCOUVERTE AVEC ÉDITEURS WYSIWYG =====
function isabel_add_consultation_customizer_wysiwyg($wp_customize) {
    $wp_customize->add_section('isabel_consultation_section', array(
        'title' => '💡 Page Consultation Découverte',
        'priority' => 43,
    ));
    
    // Titres simples
    $consultation_simple_settings = array(
        'isabel_consultation_title' => array('default' => 'Consultation Découverte', 'type' => 'text', 'label' => 'Titre de la page'),
        'isabel_consultation_subtitle' => array('default' => 'Première rencontre gratuite pour définir ensemble votre parcours', 'type' => 'text', 'label' => 'Sous-titre'),
        'isabel_consultation_section1_title' => array('default' => 'Qu\'est-ce que la consultation découverte ?', 'type' => 'text', 'label' => 'Titre section 1'),
        'isabel_consultation_benefits_title' => array('default' => 'Déroulement de la consultation', 'type' => 'text', 'label' => 'Titre grille bénéfices'),
        'isabel_consultation_process_title' => array('default' => 'Déroulement de la consultation', 'type' => 'text', 'label' => 'Titre processus étapes'),
        'isabel_consultation_section2_title' => array('default' => 'Modalités pratiques', 'type' => 'text', 'label' => 'Titre section 2'),
        'isabel_consultation_section3_title' => array('default' => 'Ce que vous en retirerez', 'type' => 'text', 'label' => 'Titre section 3'),
        'isabel_consultation_highlight_title' => array('default' => '🎁 Consultation 100% gratuite', 'type' => 'text', 'label' => 'Titre encadré mise en avant'),
        'isabel_consultation_cta_title' => array('default' => 'Prêt(e) à faire le premier pas ?', 'type' => 'text', 'label' => 'Titre du CTA'),
        'isabel_consultation_cta_button' => array('default' => 'Réserver ma consultation gratuite', 'type' => 'text', 'label' => 'Bouton du CTA'),
    );
    
    isabel_add_bulk_settings($wp_customize, $consultation_simple_settings, 'isabel_consultation_section');
    
    // CONTENUS AVEC ÉDITEURS WYSIWYG
    $consultation_wysiwyg_settings = array(
        'isabel_consultation_intro_wysiwyg' => array(
            'default' => 'La <strong>consultation découverte</strong> est un moment privilégié pour faire connaissance et comprendre vos besoins spécifiques.',
            'label' => '📝 Introduction (éditeur visuel)',
            'description' => 'Présentez la consultation découverte'
        ),
        'isabel_consultation_description_wysiwyg' => array(
            'default' => 'Durant cette première rencontre <strong>gratuite de 30 minutes</strong>, nous prenons le temps d\'échanger sur votre situation, vos objectifs et vos attentes.',
            'label' => '📝 Description (éditeur visuel)',
            'description' => 'Détaillez le déroulement'
        ),
        'isabel_consultation_duration_wysiwyg' => array(
            'default' => 'Cette consultation dure environ <strong>30 minutes</strong> et se déroule par téléphone ou en <em>visioconférence</em>, selon votre préférence.',
            'label' => '📝 Modalités pratiques (éditeur visuel)',
            'description' => 'Durée et modalités'
        ),
        'isabel_consultation_benefits_text_wysiwyg' => array(
            'default' => 'Cette rencontre vous permet de <strong>poser toutes vos questions</strong> et de découvrir comment mes services peuvent vous aider à atteindre vos objectifs.',
            'label' => '📝 Bénéfices (éditeur visuel)',
            'description' => 'Ce que le client en retire'
        ),
        'isabel_consultation_highlight_text_wysiwyg' => array(
            'default' => 'Cette première rencontre est <strong>entièrement offerte</strong> et sans aucun engagement. C\'est mon cadeau pour vous permettre de découvrir mes services en <em>toute sérénité</em>.',
            'label' => '📝 Texte encadré gratuit (éditeur visuel)',
            'description' => 'Mise en avant de la gratuité'
        ),
        'isabel_consultation_cta_text_wysiwyg' => array(
            'default' => 'Réservez <strong>dès maintenant</strong> votre consultation découverte gratuite et commençons ensemble votre parcours de transformation.',
            'label' => '📝 Texte du CTA (éditeur visuel)',
            'description' => 'Appel à l\'action final'
        ),
    );
    
    foreach ($consultation_wysiwyg_settings as $setting_id => $config) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $config['default'],
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new Isabel_WYSIWYG_Control($wp_customize, $setting_id, array(
            'label' => $config['label'],
            'description' => $config['description'],
            'section' => 'isabel_consultation_section',
            'settings' => $setting_id,
        )));
    }
    
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

/**
 * Fonction de validation pour checkbox
 */
function isabel_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Fonction de validation pour select
 */
function isabel_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

// ===== SCRIPTS POUR LE CUSTOMIZER =====

/**
 * Enqueue des scripts pour le customizer
 */
function isabel_customizer_scripts() {
    wp_enqueue_script('isabel-customizer', get_template_directory_uri() . '/js/customizer.js', array('jquery', 'customize-controls'), '1.0.0', true);
    wp_enqueue_style('isabel-customizer', get_template_directory_uri() . '/css/customizer.css', array(), '1.0.0');
}
add_action('customize_controls_enqueue_scripts', 'isabel_customizer_scripts');

/**
 * CSS pour améliorer l'interface du customizer
 */
function isabel_customizer_styles() {
    ?>
    <style>
    /* Styles pour les éditeurs WYSIWYG dans le customizer */
    .isabel-wysiwyg-container {
        margin-top: 10px;
    }
    
    .isabel-wysiwyg-container .wp-editor-wrap {
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    .isabel-wysiwyg-container .wp-editor-container {
        background: white;
    }
    
    /* Améliorer la visibilité des sections */
    .customize-control-wysiwyg {
        margin-bottom: 25px;
        padding: 15px;
        background: #f9f9f9;
        border-radius: 6px;
        border-left: 4px solid #e4a7f5;
    }
    
    .customize-control-wysiwyg .customize-control-title {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }
    
    .customize-control-wysiwyg .customize-control-description {
        color: #666;
        font-style: italic;
        margin-bottom: 10px;
        display: block;
    }
    
    /* Icônes pour les sections */
    .control-section-isabel_hero_section > h3:before,
    .control-section-isabel_services_section > h3:before,
    .control-section-isabel_testimonials_section > h3:before,
    .control-section-isabel_cta_section > h3:before,
    .control-section-isabel_form_section > h3:before,
    .control-section-isabel_footer_section > h3:before {
        content: "📝 ";
        margin-right: 5px;
    }
    
    /* Messages d'aide */
    .customize-section-description {
        background: #e7f3ff;
        padding: 12px;
        border-radius: 4px;
        border-left: 4px solid #0073aa;
        margin-bottom: 15px;
        font-size: 13px;
        line-height: 1.5;
    }
    
    /* Améliorer la lisibilité */
    .customize-control {
        margin-bottom: 15px;
    }
    
    .customize-control-title {
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    /* Sections fermées par défaut sauf hero */
    .control-section:not(.control-section-isabel_hero_section) {
        border-left: 3px solid transparent;
    }
    
    .control-section.open {
        border-left-color: #e4a7f5;
    }
    </style>
    <?php
}
add_action('customize_controls_print_styles', 'isabel_customizer_styles');

?>