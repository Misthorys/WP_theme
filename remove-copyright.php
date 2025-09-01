<?php
echo "<h1>🗑️ Retrait des en-têtes de copyright</h1>";
echo "<p>Ce script va retirer les en-têtes de copyright ajoutés précédemment.</p>";

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

echo "<h2>🔍 Recherche et suppression des en-têtes...</h2>";

$success_count = 0;
$error_count = 0;
$skipped_count = 0;

foreach ($files_to_process as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        
        // Vérifier si l'en-tête existe
        if (strpos($content, '@copyright 2024 Montagard Matéo') !== false) {
            
            // Supprimer l'en-tête de copyright
            // Pattern pour PHP
            $pattern_php = '/\/\*\*\s*\*\s*Montagard Matéo - WordPress Theme.*?\*\/\s*\n\s*\n/s';
            // Pattern pour JavaScript
            $pattern_js = '/\/\*\*\s*\*\s*Montagard Matéo - WordPress Theme JavaScript.*?\*\/\s*\n\s*\n/s';
            
            $new_content = $content;
            
            // Essayer de supprimer l'en-tête PHP
            $new_content = preg_replace($pattern_php, '', $new_content);
            // Essayer de supprimer l'en-tête JavaScript
            $new_content = preg_replace($pattern_js, '', $new_content);
            
            // Si le contenu a changé, sauvegarder
            if ($new_content !== $content) {
                if (file_put_contents($file, $new_content)) {
                    echo "<p style='color: green;'>✅ En-tête supprimé de : $file</p>";
                    $success_count++;
                } else {
                    echo "<p style='color: red;'>❌ Erreur lors de la suppression de : $file</p>";
                    $error_count++;
                }
            } else {
                echo "<p style='color: orange;'>⚠️  En-tête non trouvé dans : $file</p>";
                $skipped_count++;
            }
        } else {
            echo "<p style='color: blue;'>ℹ️  Aucun en-tête à supprimer dans : $file</p>";
            $skipped_count++;
        }
    } else {
        echo "<p style='color: orange;'>⚠️  Fichier non trouvé : $file</p>";
        $error_count++;
    }
}

echo "<h2>🎉 Processus terminé !</h2>";
echo "<p><strong>📊 Résumé :</strong></p>";
echo "<p style='color: green;'>✅ En-têtes supprimés avec succès : $success_count</p>";
echo "<p style='color: blue;'>ℹ️  Fichiers ignorés (pas d'en-tête) : $skipped_count</p>";
echo "<p style='color: red;'>❌ Erreurs : $error_count</p>";

if ($success_count > 0) {
    echo "<p style='color: green;'><strong>✅ Les en-têtes de copyright ont été supprimés avec succès !</strong></p>";
} else {
    echo "<p style='color: blue;'><strong>ℹ️  Aucun en-tête de copyright trouvé à supprimer.</strong></p>";
}
?>

