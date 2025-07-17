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

// Vérification au chargement
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
// VÉRIFICATION DE LA TABLE CONTACTS
// ========================================

add_action('init', function() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'isabel_contacts';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name;
    
    if (!$table_exists) {
        error_log('ISABEL: Table contacts manquante - création en cours');
        if (function_exists('isabel_create_contacts_table')) {
            isabel_create_contacts_table();
        }
    }
});

/**
 * Génère le CSS dynamique pour le formatage de texte
 */
function isabel_generate_text_formatting_css() {
    $styles = isabel_get_text_styles();
    
    // Charger les Google Fonts si nécessaire
    $font_family = isabel_get_option('isabel_font_family', 'system');
    $google_fonts = '';
    
    if ($font_family !== 'system') {
        $google_fonts_map = array(
            'inter' => 'Inter:300,400,500,600,700,800,900',
            'roboto' => 'Roboto:300,400,500,700,900',
            'open-sans' => 'Open+Sans:300,400,500,600,700,800',
            'lato' => 'Lato:300,400,700,900',
            'nunito' => 'Nunito:300,400,500,600,700,800,900',
            'poppins' => 'Poppins:300,400,500,600,700,800,900',
            'montserrat' => 'Montserrat:300,400,500,600,700,800,900'
        );
        
        if (isset($google_fonts_map[$font_family])) {
            $google_fonts = '@import url("https://fonts.googleapis.com/css2?family=' . $google_fonts_map[$font_family] . '&display=swap");';
        }
    }
    
    $responsive_scales = $styles['responsive'] ? '
        @media (max-width: 768px) {
            :root {
                --heading-size: calc(' . $styles['heading_size'] . ' * 0.8);
                --subtitle-size: calc(' . $styles['subtitle_size'] . ' * 0.9);
                --body-size: calc(' . $styles['body_size'] . ' * 0.95);
                --paragraph-spacing: calc(' . $styles['paragraph_spacing'] . ' * 0.8);
            }
        }
        @media (max-width: 480px) {
            :root {
                --heading-size: calc(' . $styles['heading_size'] . ' * 0.7);
                --subtitle-size: calc(' . $styles['subtitle_size'] . ' * 0.85);
                --body-size: calc(' . $styles['body_size'] . ' * 0.9);
                --paragraph-spacing: calc(' . $styles['paragraph_spacing'] . ' * 0.7);
            }
        }
    ' : '';
    
    $css = $google_fonts . '
    
    /* Variables CSS pour le formatage de texte */
    :root {
        --heading-size: ' . $styles['heading_size'] . ';
        --subtitle-size: ' . $styles['subtitle_size'] . ';
        --body-size: ' . $styles['body_size'] . ';
        --line-height: ' . $styles['line_height'] . ';
        --paragraph-spacing: ' . $styles['paragraph_spacing'] . ';
        --font-family: ' . $styles['font_family'] . ';
        --heading-weight: ' . $styles['heading_weight'] . ';
        --body-weight: ' . $styles['body_weight'] . ';
        --text-primary: ' . $styles['text_primary'] . ';
        --text-secondary: ' . $styles['text_secondary'] . ';
    }
    
    ' . $responsive_scales . '
    
    /* Application des styles de formatage */
    body {
        font-family: var(--font-family);
        font-size: var(--body-size);
        line-height: var(--line-height);
        font-weight: var(--body-weight);
        color: var(--text-primary);
    }
    
    /* Titres principaux */
    h1, .profile-info h1, .page-header h1, .section-title, .modal-title, .cta-title {
        font-size: var(--heading-size) !important;
        font-weight: var(--heading-weight) !important;
        line-height: calc(var(--line-height) * 0.9) !important;
        color: var(--text-primary) !important;
        font-family: var(--font-family) !important;
    }
    
    /* Sous-titres */
    h2, h3, .profile-subtitle, .section-subtitle, .modal-subtitle, .content-section h2 {
        font-size: var(--subtitle-size) !important;
        font-weight: var(--heading-weight) !important;
        line-height: var(--line-height) !important;
        color: var(--text-primary) !important;
        font-family: var(--font-family) !important;
    }
    
    /* Texte standard */
    p, .intro-text, .cta-text, .testimonial-content, .service-card p, .content-section p {
        font-size: var(--body-size) !important;
        line-height: var(--line-height) !important;
        font-weight: var(--body-weight) !important;
        color: var(--text-secondary) !important;
        font-family: var(--font-family) !important;
        margin-bottom: var(--paragraph-spacing) !important;
    }
    
    /* Texte d\'introduction avec formatage personnalisé */
    .intro-text-formatted {
        font-size: var(--body-size);
        line-height: var(--line-height);
        font-weight: var(--body-weight);
        color: var(--text-primary);
        font-family: var(--font-family);
        margin-bottom: var(--paragraph-spacing);
    }
    
    .intro-text-formatted br {
        line-height: calc(var(--line-height) * 2);
    }
    
    .intro-text-formatted strong {
        font-weight: var(--heading-weight);
        color: var(--text-primary);
    }
    
    .intro-text-formatted em {
        font-style: italic;
        color: var(--text-primary);
    }
    
    /* Services avec formatage */
    .service-card-formatted p {
        font-size: var(--body-size);
        line-height: var(--line-height);
        font-weight: var(--body-weight);
        color: var(--text-secondary);
        font-family: var(--font-family);
    }
    
    /* Badges et éléments spéciaux */
    .hero-badge {
        font-size: calc(var(--body-size) * 0.8) !important;
        font-weight: var(--heading-weight) !important;
        font-family: var(--font-family) !important;
    }
    
    /* Boutons */
    .cta-main, .btn-secondary, .form-submit, .cta-button, .btn-cta {
        font-size: var(--body-size) !important;
        font-weight: var(--heading-weight) !important;
        font-family: var(--font-family) !important;
    }
    
    /* Navigation */
    .nav-menu a {
        font-size: var(--body-size) !important;
        font-weight: calc(var(--body-weight) + 100) !important;
        font-family: var(--font-family) !important;
    }
    
    /* Formulaires */
    .form-input, .form-label {
        font-size: var(--body-size) !important;
        font-family: var(--font-family) !important;
    }
    
    .form-label {
        font-weight: calc(var(--body-weight) + 100) !important;
        color: var(--text-primary) !important;
    }
    
    /* Témoignages */
    .author-name {
        font-weight: var(--heading-weight) !important;
        color: var(--text-primary) !important;
        font-family: var(--font-family) !important;
    }
    
    .author-title {
        color: var(--text-secondary) !important;
        font-family: var(--font-family) !important;
    }
    
    /* Étapes et processus */
    .step-content h4 {
        font-weight: var(--heading-weight) !important;
        color: var(--text-primary) !important;
        font-family: var(--font-family) !important;
    }
    
    .step-content p {
        color: var(--text-secondary) !important;
        font-family: var(--font-family) !important;
    }
    
    /* Styles pour les retours à la ligne forcés */
    .force-break {
        display: block;
        margin: calc(var(--paragraph-spacing) * 0.5) 0;
    }
    
    /* Styles pour les emphases */
    .text-emphasis {
        font-weight: var(--heading-weight);
        color: var(--text-primary);
    }
    
    .text-highlight {
        background: linear-gradient(120deg, var(--rose-300) 0%, var(--rose-300) 100%);
        background-repeat: no-repeat;
        background-size: 100% 30%;
        background-position: 0 85%;
        padding: 0 0.2em;
    }
    
    /* Support pour le formatage riche dans les sections */
    .formatted-content {
        font-family: var(--font-family);
    }
    
    .formatted-content h1, .formatted-content h2, .formatted-content h3 {
        font-family: var(--font-family);
        font-weight: var(--heading-weight);
        color: var(--text-primary);
        margin-bottom: var(--paragraph-spacing);
    }
    
    .formatted-content p {
        font-family: var(--font-family);
        font-size: var(--body-size);
        line-height: var(--line-height);
        font-weight: var(--body-weight);
        color: var(--text-secondary);
        margin-bottom: var(--paragraph-spacing);
    }
    
    .formatted-content strong {
        font-weight: var(--heading-weight);
        color: var(--text-primary);
    }
    
    .formatted-content em {
        font-style: italic;
        color: var(--text-primary);
    }
    
    .formatted-content br {
        line-height: calc(var(--paragraph-spacing) * 2);
    }
    
    /* Classes utilitaires pour le formatage */
    .text-small { font-size: calc(var(--body-size) * 0.875) !important; }
    .text-large { font-size: calc(var(--body-size) * 1.125) !important; }
    .text-xl { font-size: calc(var(--body-size) * 1.25) !important; }
    
    .font-light { font-weight: 300 !important; }
    .font-normal { font-weight: var(--body-weight) !important; }
    .font-medium { font-weight: calc(var(--body-weight) + 100) !important; }
    .font-bold { font-weight: var(--heading-weight) !important; }
    
    .line-tight { line-height: 1.25 !important; }
    .line-normal { line-height: var(--line-height) !important; }
    .line-loose { line-height: 1.75 !important; }
    
    .text-primary { color: var(--text-primary) !important; }
    .text-secondary { color: var(--text-secondary) !important; }
    
    .mb-none { margin-bottom: 0 !important; }
    .mb-small { margin-bottom: calc(var(--paragraph-spacing) * 0.5) !important; }
    .mb-normal { margin-bottom: var(--paragraph-spacing) !important; }
    .mb-large { margin-bottom: calc(var(--paragraph-spacing) * 1.5) !important; }
    ';
    
    return $css;
}

/**
 * Injecter le CSS personnalisé dans le head
 */
function isabel_output_text_formatting_css() {
    echo '<style id="isabel-text-formatting">';
    echo isabel_generate_text_formatting_css();
    echo '</style>';
}
add_action('wp_head', 'isabel_output_text_formatting_css', 99);

/**
 * Fonction helper pour afficher du contenu avec formatage
 */
function isabel_display_formatted_content($content, $options = array()) {
    $default_options = array(
        'allow_html' => true,
        'class' => 'formatted-content',
        'auto_paragraphs' => true
    );
    
    $options = array_merge($default_options, $options);
    
    if ($options['allow_html']) {
        $content = wp_kses_post($content);
    } else {
        $content = esc_html($content);
    }
    
    if ($options['auto_paragraphs'] && $options['allow_html']) {
        $content = wpautop($content);
    }
    
    return '<div class="' . esc_attr($options['class']) . '">' . $content . '</div>';
}

/**
 * Shortcode pour le formatage avancé
 */
function isabel_format_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'size' => 'normal',
        'weight' => 'normal',
        'color' => 'primary',
        'align' => 'left',
        'class' => ''
    ), $atts);
    
    $classes = array('isabel-formatted-text');
    
    // Ajouter les classes basées sur les attributs
    if ($atts['size'] !== 'normal') {
        $classes[] = 'text-' . $atts['size'];
    }
    
    if ($atts['weight'] !== 'normal') {
        $classes[] = 'font-' . $atts['weight'];
    }
    
    if ($atts['color'] !== 'primary') {
        $classes[] = 'text-' . $atts['color'];
    }
    
    if ($atts['class']) {
        $classes[] = $atts['class'];
    }
    
    $style = '';
    if ($atts['align'] !== 'left') {
        $style = ' style="text-align: ' . esc_attr($atts['align']) . ';"';
    }
    
    return '<span class="' . esc_attr(implode(' ', $classes)) . '"' . $style . '>' . do_shortcode($content) . '</span>';
}
add_shortcode('isabel_format', 'isabel_format_shortcode');

/**
 * Shortcode pour les retours à la ligne
 */
function isabel_break_shortcode($atts) {
    $atts = shortcode_atts(array(
        'size' => 'normal'
    ), $atts);
    
    $class = 'force-break';
    if ($atts['size'] !== 'normal') {
        $class .= ' mb-' . $atts['size'];
    }
    
    return '<span class="' . $class . '"></span>';
}
add_shortcode('isabel_break', 'isabel_break_shortcode');
?>