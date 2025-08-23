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
    wp_enqueue_style('isabel-style', get_stylesheet_uri(), array(), '2.0.3');
    
    // Enqueue du JavaScript - CORRECTION : enlever jQuery en dépendance
    wp_enqueue_script('isabel-script', get_template_directory_uri() . '/js/main.js', array(), '2.0.3', true);
    
    // CORRECTION : Localiser le script APRÈS l'avoir enregistré
    wp_localize_script('isabel-script', 'isabel_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('isabel_contact_nonce'),
        'delete_nonce' => wp_create_nonce('isabel_delete_contact_nonce'),
        'debug' => defined('WP_DEBUG') && WP_DEBUG ? true : false
    ));
}
add_action('wp_enqueue_scripts', 'isabel_theme_scripts');

// ========================================
// INCLUSIONS DES FICHIERS ORGANISÉS - VERSION MODULAIRE
// ========================================

// CHOIX 1 : Système modulaire (recommandé)
if (file_exists(get_template_directory() . '/inc/customizer/customizer-main.php')) {
    require_once get_template_directory() . '/inc/customizer/customizer-main.php';
    
    // INITIALISER le système modulaire
    isabel_init_modular_customizer();
    
    // Charger la gestion des contacts
    require_once get_template_directory() . '/inc/contact-handler.php';
    
    // Charger la gestion des témoignages
    require_once get_template_directory() . '/inc/testimonials.php';
    
    // Charger la gestion des pages de services
    require_once get_template_directory() . '/inc/service-pages.php';
    
    // Charger l'interface d'administration
    require_once get_template_directory() . '/inc/admin-interface.php';
    
} else {
    // CHOIX 2 : Fallback vers l'ancien système si le modulaire n'existe pas
    if (file_exists(get_template_directory() . '/inc/customizer1.php')) {
        require_once get_template_directory() . '/inc/customizer1.php';
        
        // Hook pour enregistrer le customizer
        add_action('customize_register', 'isabel_customize_register');
    }
    
    // Charger les autres fichiers
    if (file_exists(get_template_directory() . '/inc/contact-handler.php')) {
        require_once get_template_directory() . '/inc/contact-handler.php';
    }
    
    if (file_exists(get_template_directory() . '/inc/testimonials.php')) {
        require_once get_template_directory() . '/inc/testimonials.php';
    }
    
    if (file_exists(get_template_directory() . '/inc/service-pages.php')) {
        require_once get_template_directory() . '/inc/service-pages.php';
    }
    
    if (file_exists(get_template_directory() . '/inc/admin-interface.php')) {
        require_once get_template_directory() . '/inc/admin-interface.php';
    }
}

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
// FONCTION DE FORMATAGE DE TEXTE - NOUVELLE
// ========================================

/**
 * Formate le texte en supportant les retours à la ligne et le gras markdown
 * @param string $text Le texte à formater
 * @return string Le texte formaté avec HTML sécurisé
 */
function isabel_format_text($text) {
    // Vérifier que le texte n'est pas vide
    if (empty($text)) {
        return '';
    }
    
    // Échapper le texte pour la sécurité
    $text = esc_html($text);
    
    // Convertir **texte** en <strong>texte</strong>
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
    
    // Convertir les retours à la ligne en <br>
    $text = nl2br($text);
    
    // Utiliser wp_kses pour s'assurer que seuls <strong> et <br> sont autorisés
    $allowed_html = array(
        'strong' => array(),
        'br' => array()
    );
    
    return wp_kses($text, $allowed_html);
}

// ========================================
// SÉCURITÉ ET NETTOYAGE
// ========================================

// Nettoyage et sécurité
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// ========================================
// CUSTOMIZER TEMPS RÉEL - POSTMESSAGE
// ========================================

/**
 * Enregistrer le JavaScript pour le customizer temps réel
 */
function isabel_customizer_live_preview() {
    wp_enqueue_script(
        'isabel-customizer-live',
        get_template_directory_uri() . '/js/customizer-live.js',
        array('jquery', 'customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'isabel_customizer_live_preview');

// ========================================
// DEBUG TEMPORAIRE POUR LES PAGES DE SERVICE
// ========================================

// Debug des options de pages de service
add_action('wp_head', function() {
    // Debug pour la page VAE
    if (is_page('accompagnement-vae')) {
        echo '<!-- DEBUG VAE: ';
        echo 'isabel_vae_title = ' . get_theme_mod('isabel_vae_title', 'NON TROUVÉ');
        echo ' | isabel_vae_subtitle = ' . get_theme_mod('isabel_vae_subtitle', 'NON TROUVÉ');
        echo ' -->';
    }
    
    // Debug pour la page Coaching
    if (is_page('coaching-personnel')) {
        echo '<!-- DEBUG COACHING: ';
        echo 'isabel_coaching_title = ' . get_theme_mod('isabel_coaching_title', 'NON TROUVÉ');
        echo ' | isabel_coaching_subtitle = ' . get_theme_mod('isabel_coaching_subtitle', 'NON TROUVÉ');
        echo ' -->';
    }
    
    // Debug pour la page Consultation
    if (is_page('consultation-decouverte')) {
        echo '<!-- DEBUG CONSULTATION: ';
        echo 'isabel_consultation_title = ' . get_theme_mod('isabel_consultation_title', 'NON TROUVÉ');
        echo ' | isabel_consultation_subtitle = ' . get_theme_mod('isabel_consultation_subtitle', 'NON TROUVÉ');
        echo ' -->';
    }
    
    // Debug pour la page Hypno
    if (is_page('hypnocoaching')) {
        echo '<!-- DEBUG HYPNO: ';
        echo 'isabel_hypno_title = ' . get_theme_mod('isabel_hypno_title', 'NON TROUVÉ');
        echo ' | isabel_hypno_subtitle = ' . get_theme_mod('isabel_hypno_subtitle', 'NON TROUVÉ');
        echo ' -->';
    }
});

function isabel_remove_version() {
    return '';
}
add_filter('the_generator', 'isabel_remove_version');

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
// SECTION QUALIOPI - VERSION CORRIGÉE
// ========================================

/**
 * Affiche la section certification Qualiopi - VERSION CORRIGÉE
 * @param string $context - 'home' pour la page d'accueil, 'page' pour les autres pages
 */
function isabel_display_qualiopi_section($context = 'page') {
    
    // Vérifier si la section est activée
    if (!isabel_get_option('isabel_qualiopi_enable', true)) {
        return;
    }
    
    // Récupérer les options depuis le customizer
    $logo = isabel_get_option('isabel_qualiopi_logo', '');
    $title = isabel_get_option('isabel_qualiopi_title', 'Organisme de formation certifié Qualiopi');
    $description = isabel_get_option('isabel_qualiopi_description', 'La certification qualité a été délivrée au titre de la catégorie d\'actions suivante : actions de formation');
    $number = isabel_get_option('isabel_qualiopi_number', '');
    $date = isabel_get_option('isabel_qualiopi_date', '');
    $style = isabel_get_option('isabel_qualiopi_style', 'standard');
    
    // Définir les classes CSS selon le contexte et le style
    $section_class = $context === 'home' ? 'qualiopi-home-section' : '';
    $container_class = $context === 'home' ? 'qualiopi-home-certification' : 'qualiopi-certification';
    $content_class = $context === 'home' ? 'qualiopi-home-content' : 'qualiopi-content';
    $logo_class = $context === 'home' ? 'qualiopi-home-logo' : 'qualiopi-logo';
    $text_class = $context === 'home' ? 'qualiopi-home-text' : 'qualiopi-text';
    
    // Ajouter des classes pour les styles
    $style_classes = '';
    switch ($style) {
        case 'compact':
            $style_classes = ' qualiopi-compact';
            break;
        case 'premium':
            $style_classes = ' qualiopi-premium';
            break;
        default:
            $style_classes = ' qualiopi-standard';
    }
    
    // Conteneur selon le contexte
    if ($context === 'home') {
        echo '<section class="' . esc_attr($section_class . $style_classes) . '">';
        echo '<div class="section-container">';
    }
    
    // CORRECTION: Utiliser echo au lieu de mélanger PHP et HTML
    echo '<div class="' . esc_attr($container_class . $style_classes) . '">';
    echo '<div class="' . esc_attr($content_class) . '">';
    
    if (!empty($logo)) {
        echo '<div class="' . esc_attr($logo_class) . '">';
        echo '<img src="' . esc_url($logo) . '" alt="Certification Qualiopi" />';
        echo '</div>';
    }
    
    echo '<div class="' . esc_attr($text_class) . '">';
    echo '<h3>' . esc_html($title) . '</h3>';
    echo '<p>' . esc_html($description) . '</p>';
    
    if (!empty($number)) {
        echo '<p class="qualiopi-number">';
        echo '<strong>N° de certification :</strong> ' . esc_html($number);
        echo '</p>';
    }
    
    if (!empty($date)) {
        echo '<p class="qualiopi-date">';
        echo esc_html($date);
        echo '</p>';
    }
    
    echo '</div>'; // Fermer text_class
    echo '</div>'; // Fermer content_class
    echo '</div>'; // Fermer container_class
    
    // Fermer le conteneur pour la page d'accueil
    if ($context === 'home') {
        echo '</div>';
        echo '</section>';
    }
}

/**
 * CSS pour les différents styles Qualiopi - VERSION COMPLÈTE
 */
function isabel_qualiopi_styles() {
    ?>
    <style>
    /* Styles de base Qualiopi */
    .qualiopi-certification,
    .qualiopi-home-certification {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        border: 2px solid #cbd5e1;
        border-radius: 16px;
        padding: 2rem;
        margin: 2rem 0 3rem 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .qualiopi-content,
    .qualiopi-home-content {
        display: flex;
        align-items: center;
        gap: 2rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .qualiopi-logo,
    .qualiopi-home-logo {
        flex-shrink: 0;
    }
    
    .qualiopi-logo img,
    .qualiopi-home-logo img {
        height: 80px;
        width: auto;
        object-fit: contain;
    }
    
    .qualiopi-text h3,
    .qualiopi-home-text h3 {
        color: #1e40af;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        margin-top: 0;
    }
    
    .qualiopi-text p,
    .qualiopi-home-text p {
        color: #475569;
        font-size: 0.95rem;
        line-height: 1.5;
        margin: 0.5rem 0;
        font-style: italic;
    }
    
    .qualiopi-number {
        font-style: normal !important;
        font-size: 0.9rem !important;
        color: #1e40af !important;
    }
    
    .qualiopi-date {
        font-style: normal !important;
        font-size: 0.85rem !important;
        color: #64748b !important;
        font-weight: 500 !important;
    }
    
    /* Style Premium */
    .qualiopi-premium {
        background: linear-gradient(135deg, #ffffff, #f8fafc) !important;
        border: 2px solid #3b82f6 !important;
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15) !important;
        position: relative;
        overflow: hidden;
    }
    
    .qualiopi-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1e40af, #3b82f6, #60a5fa);
    }
    
    /* Style Compact */
    .qualiopi-compact {
        padding: 1.5rem !important;
        margin: 1.5rem 0 2rem 0 !important;
    }
    
    .qualiopi-compact .qualiopi-logo img,
    .qualiopi-compact .qualiopi-home-logo img {
        height: 60px !important;
    }
    
    .qualiopi-compact h3 {
        font-size: 1.1rem !important;
    }
    
    .qualiopi-compact p {
        font-size: 0.9rem !important;
    }
    
    /* Page d'accueil spécifique */
    .qualiopi-home-section {
        padding: 3rem 0;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .qualiopi-home-certification {
        max-width: 700px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }
    
    .qualiopi-home-logo img {
        height: 90px;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }
    
    .qualiopi-home-text h3 {
        font-size: 1.4rem;
        line-height: 1.3;
    }
    
    .qualiopi-home-text p {
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.6;
    }
    
    .qualiopi-home-certification::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1e40af, #3b82f6, #60a5fa);
    }
    
    .qualiopi-home-content {
        gap: 2.5rem;
        position: relative;
        z-index: 1;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .qualiopi-content,
        .qualiopi-home-content {
            flex-direction: column;
            text-align: center;
            gap: 1.5rem;
        }
        
        .qualiopi-logo img,
        .qualiopi-home-logo img {
            height: 60px;
        }
        
        .qualiopi-home-logo img {
            height: 70px;
        }
        
        .qualiopi-text h3,
        .qualiopi-home-text h3 {
            font-size: 1.1rem;
        }
        
        .qualiopi-home-text h3 {
            font-size: 1.2rem;
        }
        
        .qualiopi-home-text p {
            font-size: 0.95rem;
        }
        
        .qualiopi-compact .qualiopi-logo img {
            height: 50px !important;
        }
        
        .qualiopi-home-section {
            padding: 2rem 0;
        }
        
        .qualiopi-home-certification {
            padding: 2rem;
            border-radius: 16px;
            margin: 0 1rem;
        }
    }
    
    @media (max-width: 480px) {
        .qualiopi-certification,
        .qualiopi-home-certification {
            padding: 1.5rem;
            margin: 1rem 0 2rem 0;
        }
        
        .qualiopi-compact {
            padding: 1rem !important;
        }
        
        .qualiopi-home-certification {
            margin: 0 1rem;
        }
        
        .qualiopi-home-logo img {
            height: 60px;
        }
        
        .qualiopi-home-text h3 {
            font-size: 1.1rem;
        }
        
        .qualiopi-home-text p {
            font-size: 0.9rem;
        }
    }
    </style>
    <?php
}
add_action('wp_head', 'isabel_qualiopi_styles');

// ========================================
// VÉRIFICATIONS ET DEBUG
// ========================================

// Fallback JavaScript pour isabel_ajax
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
}, 5);

// ========================================
// NOTIFICATION DE MIGRATION VERS LE SYSTÈME MODULAIRE
// ========================================

// Notification pour informer de la migration
add_action('admin_notices', function() {
    if (current_user_can('manage_options')) {
        $screen = get_current_screen();
        if ($screen && ($screen->base === 'appearance_page_isabel-settings' || $screen->base === 'customize')) {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p><strong>🎉 Thème Isabel Goncalves Activé !</strong> ';
            echo 'Votre thème fonctionne correctement. ';
            echo 'Utilisez <a href="' . admin_url('customize.php') . '">Apparence > Personnaliser</a> pour modifier votre contenu. ';
            echo 'Consultez <a href="' . admin_url('admin.php?page=isabel-settings') . '">Configuration Isabel</a> pour plus d\'options.</p>';
            echo '</div>';
        }
    }
});

?>