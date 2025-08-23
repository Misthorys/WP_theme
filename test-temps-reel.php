<?php
/**
 * TEST TEMPS RÉEL - ISABEL THEME
 * Vérifie pourquoi le temps réel ne fonctionne pas
 */

// Simulation de l'environnement WordPress
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
    
    if (!function_exists('get_template_directory_uri')) {
        function get_template_directory_uri() {
            return 'http://localhost/wp-content/themes/isabel';
        }
    }
    
    if (!function_exists('wp_enqueue_script')) {
        function wp_enqueue_script($handle, $src, $deps = array(), $ver = false, $in_footer = false) {
            echo "Script enregistré: $handle -> $src\n";
        }
    }
}

echo "=== TEST TEMPS RÉEL ISABEL ===\n\n";

// Test 1: Vérifier que le fichier JavaScript existe
echo "1. Vérification du fichier JavaScript :\n";
$js_file = 'js/customizer-live.js';
if (file_exists($js_file)) {
    echo "✅ $js_file existe\n";
    $js_content = file_get_contents($js_file);
    echo "📏 Taille: " . strlen($js_content) . " caractères\n";
} else {
    echo "❌ $js_file n'existe pas\n";
}

echo "\n";

// Test 2: Vérifier l'enregistrement du script
echo "2. Test d'enregistrement du script :\n";
require_once 'functions.php';

// Simuler l'enregistrement
if (function_exists('isabel_customizer_live_preview')) {
    echo "✅ isabel_customizer_live_preview existe\n";
    // isabel_customizer_live_preview(); // Ne pas appeler car wp_enqueue_script est mocké
} else {
    echo "❌ isabel_customizer_live_preview n'existe pas\n";
}

echo "\n";

// Test 3: Vérifier les sélecteurs CSS dans le JavaScript
echo "3. Analyse des sélecteurs CSS :\n";
if (file_exists($js_file)) {
    $js_content = file_get_contents($js_file);
    
    // Extraire tous les sélecteurs CSS
    preg_match_all('/updateElement\([\'"]([^\'"]+)[\'"]/', $js_content, $matches);
    $selectors = array_unique($matches[1]);
    
    echo "Sélecteurs trouvés dans le JavaScript :\n";
    foreach ($selectors as $selector) {
        echo "- $selector\n";
    }
    
    echo "\n";
    
    // Extraire tous les sélecteurs d'images
    preg_match_all('/updateImage\([\'"]([^\'"]+)[\'"]/', $js_content, $matches);
    $image_selectors = array_unique($matches[1]);
    
    echo "Sélecteurs d'images trouvés :\n";
    foreach ($image_selectors as $selector) {
        echo "- $selector\n";
    }
}

echo "\n";

// Test 4: Vérifier les options du customizer
echo "4. Vérification des options du customizer :\n";
$customizer_options = array(
    'isabel_logo',
    'isabel_site_name',
    'isabel_site_subtitle',
    'isabel_badge',
    'isabel_name',
    'isabel_main_title',
    'isabel_presentation',
    'isabel_button_text',
    'isabel_services_title',
    'isabel_service1_title',
    'isabel_service1_description',
    'isabel_testimonials_title',
    'isabel_cta_title',
    'isabel_footer_email',
    'isabel_vae_title',
    'isabel_coaching_title',
    'isabel_consultation_title',
    'isabel_hypno_title',
    'isabel_primary_color',
    'isabel_secondary_color'
);

echo "Options du customizer à vérifier :\n";
foreach ($customizer_options as $option) {
    echo "- $option\n";
}

echo "\n";

// Test 5: Vérifier la structure HTML
echo "5. Vérification de la structure HTML :\n";
echo "Pour que le temps réel fonctionne, votre HTML doit contenir ces éléments :\n";
echo "- .site-logo img (pour le logo)\n";
echo "- .site-name (pour le nom du site)\n";
echo "- .site-subtitle (pour le sous-titre)\n";
echo "- .hero-badge (pour le badge)\n";
echo "- .hero-name (pour le nom)\n";
echo "- .hero-title (pour le titre principal)\n";
echo "- .hero-description (pour la présentation)\n";
echo "- .hero-cta .btn-cta (pour le bouton)\n";
echo "- .services-section h2 (pour le titre des services)\n";
echo "- .service-card:nth-child(1) h3 (pour le titre du service 1)\n";
echo "- .service-card:nth-child(1) p (pour la description du service 1)\n";
echo "- .testimonials-section h2 (pour le titre des témoignages)\n";
echo "- .cta-section h2 (pour le titre CTA)\n";
echo "- .footer-email (pour l'email du footer)\n";
echo "- .page-header h1 (pour les titres de pages)\n";
echo "- .page-header .subtitle (pour les sous-titres de pages)\n";

echo "\n";

// Test 6: Instructions de debug
echo "6. Instructions de debug :\n";
echo "1. Ouvrez la console du navigateur (F12)\n";
echo "2. Allez dans Apparence > Personnaliser\n";
echo "3. Vérifiez s'il y a des erreurs JavaScript\n";
echo "4. Cherchez le message '✅ Isabel Customizer Live Preview chargé'\n";
echo "5. Si pas de message, le script ne se charge pas\n";
echo "6. Vérifiez que les sélecteurs CSS correspondent à votre HTML\n";

echo "\n=== FIN DU TEST ===\n";
?>
