<?php
/**
 * TEST DE DEBUG DU CUSTOMIZER ISABEL
 * Vérifie si les données sont bien sauvegardées et récupérées
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

echo "=== TEST DE DEBUG DU CUSTOMIZER ISABEL ===\n\n";

// Test 1: Vérifier que les fonctions utilitaires existent
echo "1. Test des fonctions utilitaires :\n";

// Charger le fichier principal
require_once 'inc/customizer/customizer-main.php';

if (function_exists('isabel_add_text_control')) {
    echo "✅ isabel_add_text_control existe\n";
} else {
    echo "❌ isabel_add_text_control n'existe pas\n";
}

if (function_exists('isabel_add_textarea_control')) {
    echo "✅ isabel_add_textarea_control existe\n";
} else {
    echo "❌ isabel_add_textarea_control n'existe pas\n";
}

if (function_exists('isabel_add_image_control')) {
    echo "✅ isabel_add_image_control existe\n";
} else {
    echo "❌ isabel_add_image_control n'existe pas\n";
}

echo "\n";

// Test 2: Vérifier que les modules se chargent
echo "2. Test du chargement des modules :\n";

if (function_exists('isabel_load_customizer_modules')) {
    echo "✅ isabel_load_customizer_modules existe\n";
    
    // Tester le chargement
    isabel_load_customizer_modules();
    
    // Vérifier que les fonctions des modules existent
    $modules_to_check = array(
        'isabel_customizer_header',
        'isabel_customizer_images', 
        'isabel_customizer_homepage',
        'isabel_customizer_qualiopi',
        'isabel_customizer_services',
        'isabel_customizer_testimonials',
        'isabel_customizer_contact',
        'isabel_customizer_footer',
        'isabel_customizer_coaching',
        'isabel_customizer_vae',
        'isabel_customizer_hypno',
        'isabel_customizer_consultation',
        'isabel_customizer_colors'
    );
    
    foreach ($modules_to_check as $function) {
        if (function_exists($function)) {
            echo "✅ $function existe\n";
        } else {
            echo "❌ $function n'existe pas\n";
        }
    }
} else {
    echo "❌ isabel_load_customizer_modules n'existe pas\n";
}

echo "\n";

// Test 3: Vérifier la fonction principale
echo "3. Test de la fonction principale :\n";

if (function_exists('isabel_customize_register')) {
    echo "✅ isabel_customize_register existe\n";
} else {
    echo "❌ isabel_customize_register n'existe pas\n";
}

if (function_exists('isabel_init_modular_customizer')) {
    echo "✅ isabel_init_modular_customizer existe\n";
} else {
    echo "❌ isabel_init_modular_customizer n'existe pas\n";
}

echo "\n";

// Test 4: Vérifier les noms d'options
echo "4. Test des noms d'options :\n";

$test_options = array(
    'isabel_vae_title',
    'isabel_vae_subtitle', 
    'isabel_vae_intro',
    'isabel_vae_description',
    'isabel_vae_box1_title',
    'isabel_vae_box1_text'
);

foreach ($test_options as $option) {
    echo "Option: $option\n";
}

echo "\n";

// Test 5: Simulation d'une sauvegarde
echo "5. Test de sauvegarde simulée :\n";

// Simuler une sauvegarde de données
$test_data = array(
    'isabel_vae_title' => 'Test VAE Title',
    'isabel_vae_subtitle' => 'Test VAE Subtitle',
    'isabel_vae_intro' => 'Test VAE Intro'
);

echo "Données de test créées :\n";
foreach ($test_data as $key => $value) {
    echo "- $key: $value\n";
}

echo "\n";

// Test 6: Vérifier la fonction isabel_get_option
echo "6. Test de isabel_get_option :\n";

// Charger functions.php pour avoir accès à isabel_get_option
if (file_exists('functions.php')) {
    // Extraire juste la fonction isabel_get_option
    $functions_content = file_get_contents('functions.php');
    if (preg_match('/function isabel_get_option\([^)]*\)\s*\{[^}]+\}/s', $functions_content, $matches)) {
        eval($matches[0]);
        
        // Tester la fonction
        $test_value = isabel_get_option('isabel_vae_title', 'Valeur par défaut');
        echo "isabel_get_option('isabel_vae_title'): $test_value\n";
    } else {
        echo "❌ Impossible d'extraire isabel_get_option\n";
    }
} else {
    echo "❌ functions.php non trouvé\n";
}

echo "\n=== FIN DU TEST ===\n";
?>
