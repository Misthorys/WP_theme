<?php
// Test simple pour vérifier que PHP fonctionne
echo "<h1>Test PHP - Script Copyright</h1>";
echo "<p>Si vous voyez ce message, PHP fonctionne correctement.</p>";

// En-tête de copyright à ajouter
$copyright_header = '/**
 * Montagard Matéo - WordPress Theme
 * 
 * @package Montagard_Theme
 * @author Montagard Matéo
 * @copyright 2024 Montagard Matéo. Tous droits réservés.
 * @license Proprietary - Tous droits réservés
 * @version 1.0.0
 * 
 * Ce thème WordPress est la propriété exclusive de Montagard Matéo.
 * Toute reproduction, distribution ou modification sans autorisation écrite est interdite.
 */

';

// Fichiers à traiter
$files_to_process = [
    'functions.php',
    'index.php',
    'header.php',
    'footer.php',
    'inc/service-pages.php',
    'inc/customizer-main.php',
    'inc/admin-interface.php',
    'page-formations-professionnelles.php',
    'page-bilan-competences.php',
    'page-coaching-professionnel-personnel.php',
    'js/main.js',
    'js/customizer-live.js'
];

// En-tête pour les fichiers JavaScript
$js_copyright_header = '/**
 * Montagard Matéo - WordPress Theme JavaScript
 * 
 * @package Montagard_Theme
 * @author Montagard Matéo
 * @copyright 2024 Montagard Matéo. Tous droits réservés.
 * @license Proprietary - Tous droits réservés
 * @version 1.0.0
 * 
 * Ce code JavaScript est la propriété exclusive de Montagard Matéo.
 * Toute reproduction, distribution ou modification sans autorisation écrite est interdite.
 */

';

echo "<h2>🔒 Ajout des en-têtes de copyright...</h2>";

$success_count = 0;
$error_count = 0;
$skipped_count = 0;

foreach ($files_to_process as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        
        // Vérifier si l'en-tête existe déjà
        if (strpos($content, '@copyright 2024 Montagard Matéo') === false) {
            
            // Déterminer le type d'en-tête à utiliser
            $header_to_add = (pathinfo($file, PATHINFO_EXTENSION) === 'js') ? $js_copyright_header : $copyright_header;
            
            // Ajouter l'en-tête au début du fichier
            $new_content = $header_to_add . $content;
            
            // Sauvegarder le fichier
            if (file_put_contents($file, $new_content)) {
                echo "<p style='color: green;'>✅ Copyright ajouté à : $file</p>";
                $success_count++;
            } else {
                echo "<p style='color: red;'>❌ Erreur lors de l'ajout du copyright à : $file</p>";
                $error_count++;
            }
        } else {
            echo "<p style='color: blue;'>ℹ️  Copyright déjà présent dans : $file</p>";
            $skipped_count++;
        }
    } else {
        echo "<p style='color: orange;'>⚠️  Fichier non trouvé : $file</p>";
        $error_count++;
    }
}

echo "<h2>🎉 Processus terminé !</h2>";
echo "<p><strong>📊 Résumé :</strong></p>";
echo "<p style='color: green;'>✅ Fichiers traités avec succès : $success_count</p>";
echo "<p style='color: blue;'>ℹ️  Fichiers ignorés (déjà protégés) : $skipped_count</p>";
echo "<p style='color: red;'>❌ Erreurs : $error_count</p>";
echo "<p>📄 Vérifiez le fichier COPYRIGHT.md pour plus d'informations.</p>";
?>
