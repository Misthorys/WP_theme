<?php
/**
 * DEBUG SPÉCIFIQUE POUR LES PAGES DE SERVICE
 * Vérifie pourquoi les modifications ne s'appliquent pas sur les pages de service
 */

// Simulation de l'environnement WordPress
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
    
    if (!function_exists('get_template_directory')) {
        function get_template_directory() {
            return __DIR__;
        }
    }
    
    if (!function_exists('get_theme_mod')) {
        function get_theme_mod($option_name, $default = '') {
            // Simulation - retourne toujours la valeur par défaut
            return $default;
        }
    }
    
    if (!function_exists('error_log')) {
        function error_log($message) {
            echo "LOG: $message\n";
        }
    }
}

echo "=== DEBUG PAGES DE SERVICE ===\n\n";

// Test 1: Vérifier les noms d'options utilisés dans chaque page
echo "1. NOMS D'OPTIONS UTILISÉS DANS LES PAGES :\n\n";

// Page VAE
echo "📋 PAGE VAE (page-accompagnement-vae.php) :\n";
$vae_options = array(
    'isabel_vae_title',
    'isabel_vae_subtitle',
    'isabel_vae_section1_title',
    'isabel_vae_intro',
    'isabel_vae_description',
    'isabel_vae_box1_icon',
    'isabel_vae_box1_title',
    'isabel_vae_box1_text',
    'isabel_vae_box2_image',
    'isabel_vae_box3_icon',
    'isabel_vae_box3_title',
    'isabel_vae_box3_text',
    'isabel_vae_box4_image',
    'isabel_vae_process_title',
    'isabel_vae_step1',
    'isabel_vae_step2',
    'isabel_vae_step3',
    'isabel_vae_step4',
    'isabel_vae_section2_title',
    'isabel_vae_who',
    'isabel_vae_section3_title',
    'isabel_vae_expertise',
    'isabel_vae_section4_title',
    'isabel_vae_diplomas',
    'isabel_vae_cta_title',
    'isabel_vae_cta_text',
    'isabel_vae_cta_button'
);

foreach ($vae_options as $option) {
    echo "- $option\n";
}

echo "\n";

// Page Coaching
echo "📋 PAGE FORMATIONS (page-formations-professionnelles.php) :\n";
$coaching_options = array(
    'isabel_coaching_title',
    'isabel_coaching_subtitle',
    'isabel_coaching_section1_title',
    'isabel_coaching_intro',
    'isabel_coaching_description',
    'isabel_coaching_box1_icon',
    'isabel_coaching_box1_title',
    'isabel_coaching_box1_text',
    'isabel_coaching_box2_image',
    'isabel_coaching_box3_icon',
    'isabel_coaching_box3_title',
    'isabel_coaching_box3_text',
    'isabel_coaching_box4_image',
    'isabel_coaching_process_title',
    'isabel_coaching_step1',
    'isabel_coaching_step2',
    'isabel_coaching_step3',
    'isabel_coaching_step4',
    'isabel_coaching_section2_title',
    'isabel_coaching_who',
    'isabel_coaching_section3_title',
    'isabel_coaching_expertise',
    'isabel_coaching_cta_title',
    'isabel_coaching_cta_text',
    'isabel_coaching_cta_button'
);

foreach ($coaching_options as $option) {
    echo "- $option\n";
}

echo "\n";

// Page Consultation
echo "📋 PAGE COACHING PROFESSIONNEL (page-coaching-professionnel-personnel.php) :\n";
$consultation_options = array(
    'isabel_consultation_title',
    'isabel_consultation_subtitle',
    'isabel_consultation_section1_title',
    'isabel_consultation_intro',
    'isabel_consultation_description',
    'isabel_consultation_box1_icon',
    'isabel_consultation_box1_title',
    'isabel_consultation_box1_text',
    'isabel_consultation_box2_image',
    'isabel_consultation_box3_icon',
    'isabel_consultation_box3_title',
    'isabel_consultation_box3_text',
    'isabel_consultation_box4_image',
    'isabel_consultation_process_title',
    'isabel_consultation_step1',
    'isabel_consultation_step2',
    'isabel_consultation_step3',
    'isabel_consultation_step4',
    'isabel_consultation_section2_title',
    'isabel_consultation_duration',
    'isabel_consultation_section3_title',
    'isabel_consultation_benefits_text',
    'isabel_consultation_highlight_title',
    'isabel_consultation_highlight_text',
    'isabel_consultation_cta_title',
    'isabel_consultation_cta_text',
    'isabel_consultation_cta_button'
);

foreach ($consultation_options as $option) {
    echo "- $option\n";
}

echo "\n";

// Page Hypno
echo "📋 PAGE BILAN (page-bilan-competences.php) :\n";
$hypno_options = array(
    'isabel_hypno_title',
    'isabel_hypno_subtitle',
    'isabel_hypno_section1_title',
    'isabel_hypno_intro',
    'isabel_hypno_description',
    'isabel_hypno_box1_icon',
    'isabel_hypno_box1_title',
    'isabel_hypno_box1_text',
    'isabel_hypno_box2_image',
    'isabel_hypno_box3_icon',
    'isabel_hypno_box3_title',
    'isabel_hypno_box3_text',
    'isabel_hypno_box4_image',
    'isabel_hypno_process_title',
    'isabel_hypno_step1',
    'isabel_hypno_step2',
    'isabel_hypno_step3',
    'isabel_hypno_step4',
    'isabel_hypno_section2_title',
    'isabel_hypno_applications',
    'isabel_hypno_section3_title',
    'isabel_hypno_myths',
    'isabel_hypno_section4_title',
    'isabel_hypno_formation',
    'isabel_hypno_section5_title',
    'isabel_hypno_contraindications',
    'isabel_hypno_cta_title',
    'isabel_hypno_cta_text',
    'isabel_hypno_cta_button'
);

foreach ($hypno_options as $option) {
    echo "- $option\n";
}

echo "\n";

// Test 2: Vérifier que les modules de pages existent
echo "2. VÉRIFICATION DES MODULES DE PAGES :\n\n";

$page_modules = array(
    'inc/customizer/customizer-coaching.php',
    'inc/customizer/customizer-vae.php',
    'inc/customizer/customizer-hypno.php',
    'inc/customizer/customizer-consultation.php'
);

foreach ($page_modules as $module) {
    if (file_exists($module)) {
        echo "✅ $module existe\n";
    } else {
        echo "❌ $module manquant\n";
    }
}

echo "\n";

// Test 3: Vérifier que les fonctions des modules existent
echo "3. VÉRIFICATION DES FONCTIONS DES MODULES :\n\n";

// Charger le système modulaire
require_once 'inc/customizer/customizer-main.php';
isabel_load_customizer_modules();

$page_functions = array(
    'isabel_customizer_coaching',
    'isabel_customizer_vae',
    'isabel_customizer_hypno',
    'isabel_customizer_consultation'
);

foreach ($page_functions as $function) {
    if (function_exists($function)) {
        echo "✅ $function existe\n";
    } else {
        echo "❌ $function n'existe pas\n";
    }
}

echo "\n";

// Test 4: Vérifier la fonction isabel_get_option
echo "4. VÉRIFICATION DE isabel_get_option :\n\n";

if (file_exists('functions.php')) {
    $functions_content = file_get_contents('functions.php');
    if (preg_match('/function isabel_get_option\([^)]*\)\s*\{[^}]+\}/s', $functions_content, $matches)) {
        eval($matches[0]);
        echo "✅ isabel_get_option chargée\n";
        
        // Tester avec une option de page
        $test_value = isabel_get_option('isabel_vae_title', 'Valeur par défaut VAE');
        echo "Test isabel_get_option('isabel_vae_title'): $test_value\n";
    } else {
        echo "❌ Impossible de charger isabel_get_option\n";
    }
} else {
    echo "❌ functions.php non trouvé\n";
}

echo "\n";

// Test 5: Vérifier la fonction isabel_format_text
echo "5. VÉRIFICATION DE isabel_format_text :\n\n";

if (preg_match('/function isabel_format_text\([^)]*\)\s*\{[^}]+\}/s', $functions_content, $matches)) {
    eval($matches[0]);
    echo "✅ isabel_format_text chargée\n";
    
    // Tester le formatage
    $test_text = "Test **gras** et retour\na la ligne";
    $formatted = isabel_format_text($test_text);
    echo "Test formatage: $formatted\n";
} else {
    echo "❌ Impossible de charger isabel_format_text\n";
}

echo "\n=== FIN DU DEBUG ===\n";
?>
