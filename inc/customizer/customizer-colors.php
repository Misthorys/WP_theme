<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 🎨 COULEURS ET STYLE GLOBAL
 * Personnalisation des couleurs et du style général
 * Section finale pour l'harmonie visuelle globale
 */

function isabel_customizer_colors($wp_customize) {
    
    // ==========================================
    // SECTION : COULEURS ET STYLE
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_colors_section',
        '🎨 Couleurs et style global',
        'Personnalisez les couleurs et l\'apparence générale de votre site',
        200 // Priorité 200 = tout à la fin
    );
    
    // ==========================================
    // COULEUR PRINCIPALE
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_primary_color',
        'isabel_colors_section',
        'Couleur principale de votre site',
        '#e4a7f5'
    );
    
    // Description de la couleur principale
    $wp_customize->add_setting('isabel_primary_color_info', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'isabel_primary_color_info', array(
        'label' => 'À quoi sert la couleur principale ?',
        'description' => '🎨 Cette couleur définit l\'identité visuelle de votre site :
• Boutons principaux et liens
• Bordures et accents décoratifs  
• Icônes et éléments graphiques
• Effets de survol et animations

💡 Conseil : Choisissez une couleur qui vous représente et reste lisible.',
        'section' => 'isabel_colors_section',
        'type' => 'hidden',
    )));
    
    // ==========================================
    // COULEUR SECONDAIRE
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_secondary_color',
        'isabel_colors_section',
        'Couleur secondaire (plus foncée)',
        '#c47dd9'
    );
    
    // ==========================================
    // COULEUR D'ACCENTUATION
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_accent_color',
        'isabel_colors_section',
        'Couleur d\'accentuation (plus claire)',
        '#f8d7ff'
    );
    
    // ==========================================
    // COULEUR DU TEXTE PRINCIPAL
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_text_color',
        'isabel_colors_section',
        'Couleur du texte principal',
        '#2d1b3d'
    );
    
    // ==========================================
    // COULEUR DU TEXTE SECONDAIRE
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_text_light_color',
        'isabel_colors_section',
        'Couleur du texte secondaire',
        '#6b5b73'
    );
    
    // ==========================================
    // COULEUR DE FOND PRINCIPAL
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_background_color',
        'isabel_colors_section',
        'Couleur de fond principal',
        '#ffffff'
    );
    
    // ==========================================
    // COULEUR DE FOND SECONDAIRE
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_background_alt_color',
        'isabel_colors_section',
        'Couleur de fond alternatif',
        '#f3f1f7'
    );
    
    // ==========================================
    // PALETTE DE COULEURS PRÉDÉFINIES
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_color_palette',
        'isabel_colors_section',
        'Palette de couleurs prédéfinie',
        array(
            'custom' => 'Personnalisée (vos réglages)',
            'purple_dream' => 'Violet Rêveur (par défaut)',
            'soft_pink' => 'Rose Doux',
            'nature_zen' => 'Nature Zen',
            'ocean_calm' => 'Océan Calme',
            'warm_sunset' => 'Coucher de Soleil',
            'professional_blue' => 'Bleu Professionnel',
            'elegant_gold' => 'Or Élégant',
        ),
        'Choisissez une palette harmonieuse ou personnalisez vos couleurs.
La palette s\'applique automatiquement à tout le site.',
        'custom'
    );
    
    // ==========================================
    // STYLE GÉNÉRAL DU SITE
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_site_style',
        'isabel_colors_section',
        'Style général du site',
        array(
            'modern' => 'Moderne (courbes et dégradés)',
            'classic' => 'Classique (lignes nettes)',
            'soft' => 'Doux (formes arrondies)',
            'minimal' => 'Minimal (épuré)',
            'elegant' => 'Élégant (sophistiqué)',
        ),
        'Style visuel général appliqué à tous les éléments.
Moderne = Recommandé pour un site professionnel attractif.',
        'modern'
    );
    
    // ==========================================
    // TAILLE DES POLICES
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_font_size',
        'isabel_colors_section',
        'Taille des polices',
        array(
            'small' => 'Petite (plus de contenu visible)',
            'normal' => 'Normale (équilibrée)',
            'large' => 'Grande (plus lisible)',
            'extra_large' => 'Très grande (accessibilité)',
        ),
        'Taille générale du texte sur votre site.
Normale = Recommandée pour la plupart des cas.',
        'normal'
    );
    
    // ==========================================
    // ANIMATIONS ET EFFETS
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_animations_enable',
        'isabel_colors_section',
        'Activer les animations',
        'Cochez pour activer les effets visuels et animations.
Rend le site plus moderne et engageant.',
        true
    );
    
    isabel_add_select_control(
        $wp_customize,
        'isabel_animation_speed',
        'isabel_colors_section',
        'Vitesse des animations',
        array(
            'slow' => 'Lente (plus visible)',
            'normal' => 'Normale',
            'fast' => 'Rapide (plus subtile)',
        ),
        'Vitesse des effets d\'animation sur le site.
Normale = Bon équilibre entre visibilité et fluidité.',
        'normal'
    );
    
    // ==========================================
    // EFFETS DE SURVOL
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_hover_effects',
        'isabel_colors_section',
        'Effets au survol',
        'Cochez pour activer les effets quand on survole les éléments.
Améliore l\'expérience utilisateur.',
        true
    );
    
    // ==========================================
    // OMBRES ET PROFONDEUR
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_shadow_style',
        'isabel_colors_section',
        'Style des ombres',
        array(
            'none' => 'Aucune ombre (plat)',
            'soft' => 'Ombres douces',
            'medium' => 'Ombres moyennes',
            'strong' => 'Ombres marquées',
        ),
        'Profondeur visuelle donnée aux éléments.
Ombres douces = Moderne et professionnel.',
        'soft'
    );
    
    // ==========================================
    // CONTRASTE ET ACCESSIBILITÉ
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_contrast_level',
        'isabel_colors_section',
        'Niveau de contraste',
        array(
            'normal' => 'Normal',
            'high' => 'Élevé (meilleure lisibilité)',
            'very_high' => 'Très élevé (accessibilité)',
        ),
        'Contraste entre les couleurs pour la lisibilité.
Élevé = Recommandé pour l\'accessibilité.',
        'normal'
    );
    
    // ==========================================
    // MODE SOMBRE (optionnel)
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_dark_mode_enable',
        'isabel_colors_section',
        'Permettre le mode sombre',
        'Cochez pour ajouter un bouton de basculement vers le mode sombre.
Suit les préférences du navigateur de l\'utilisateur.',
        false
    );
    
    // ==========================================
    // CSS PERSONNALISÉ
    // ==========================================
    $wp_customize->add_setting('isabel_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'wp_strip_all_tags',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('isabel_custom_css', array(
        'label' => 'CSS personnalisé (avancé)',
        'description' => 'Ajoutez votre propre CSS pour des personnalisations avancées.
⚠️ Réservé aux utilisateurs expérimentés.
Exemple : .mon-element { color: red; }',
        'section' => 'isabel_colors_section',
        'type' => 'textarea',
    ));
    
    // ==========================================
    // PRÉVISUALISATION DES COULEURS
    // ==========================================
    $wp_customize->add_setting('isabel_color_preview', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'isabel_color_preview', array(
        'label' => '👁️ Aperçu de vos couleurs',
        'description' => 'Les couleurs choisies s\'appliquent immédiatement dans l\'aperçu.
        
🎨 VOTRE PALETTE ACTUELLE :
• Principale : Pour les boutons et liens importants
• Secondaire : Pour les accents et bordures  
• Accentuation : Pour les fonds doux et highlights
• Texte principal : Pour les titres et texte important
• Texte secondaire : Pour les descriptions et détails

💡 CONSEIL : Testez votre site sur différents écrans pour vérifier l\'harmonie des couleurs.',
        'section' => 'isabel_colors_section',
        'type' => 'hidden',
    )));
}

/**
 * Appliquer les couleurs personnalisées via CSS
 */
function isabel_output_custom_colors() {
    // Récupérer les couleurs
    $primary = isabel_get_option('isabel_primary_color', '#e4a7f5');
    $secondary = isabel_get_option('isabel_secondary_color', '#c47dd9');
    $accent = isabel_get_option('isabel_accent_color', '#f8d7ff');
    $text_color = isabel_get_option('isabel_text_color', '#2d1b3d');
    $text_light = isabel_get_option('isabel_text_light_color', '#6b5b73');
    $bg_color = isabel_get_option('isabel_background_color', '#ffffff');
    $bg_alt = isabel_get_option('isabel_background_alt_color', '#f3f1f7');
    
    // Palette prédéfinie
    $palette = isabel_get_option('isabel_color_palette', 'custom');
    
    // CSS personnalisé
    $custom_css = isabel_get_option('isabel_custom_css', '');
    
    ?>
    <style id="isabel-custom-colors">
    :root {
        --rose-500: <?php echo esc_attr($primary); ?>;
        --rose-700: <?php echo esc_attr($secondary); ?>;
        --rose-300: <?php echo esc_attr($accent); ?>;
        --text-dark: <?php echo esc_attr($text_color); ?>;
        --text-light: <?php echo esc_attr($text_light); ?>;
        --white: <?php echo esc_attr($bg_color); ?>;
        --neutral-bg: <?php echo esc_attr($bg_alt); ?>;
        
        /* Variables générées automatiquement */
        --primary-color: var(--rose-500);
        --secondary-color: var(--rose-700);
        --accent-color: var(--rose-300);
    }
    
    <?php if ($palette !== 'custom') : ?>
    /* Application de la palette prédéfinie */
    <?php echo isabel_get_palette_css($palette); ?>
    <?php endif; ?>
    
    <?php if (!empty($custom_css)) : ?>
    /* CSS personnalisé de l'utilisateur */
    <?php echo wp_strip_all_tags($custom_css); ?>
    <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'isabel_output_custom_colors');

/**
 * Obtenir le CSS pour les palettes prédéfinies
 */
function isabel_get_palette_css($palette) {
    $palettes = array(
        'purple_dream' => array(
            'primary' => '#e4a7f5',
            'secondary' => '#c47dd9',
            'accent' => '#f8d7ff',
        ),
        'soft_pink' => array(
            'primary' => '#f5a7d4',
            'secondary' => '#d97dc4',
            'accent' => '#ffd7f2',
        ),
        'nature_zen' => array(
            'primary' => '#a7f5b8',
            'secondary' => '#7dd99c',
            'accent' => '#d7ffe0',
        ),
        'ocean_calm' => array(
            'primary' => '#a7d4f5',
            'secondary' => '#7dbcd9',
            'accent' => '#d7f2ff',
        ),
        'warm_sunset' => array(
            'primary' => '#f5c7a7',
            'secondary' => '#d9a57d',
            'accent' => '#ffe8d7',
        ),
        'professional_blue' => array(
            'primary' => '#4a90e2',
            'secondary' => '#2c5aa0',
            'accent' => '#e3f2fd',
        ),
        'elegant_gold' => array(
            'primary' => '#d4af37',
            'secondary' => '#b8941f',
            'accent' => '#faf5e6',
        ),
    );
    
    if (!isset($palettes[$palette])) {
        return '';
    }
    
    $colors = $palettes[$palette];
    
    return "
    :root {
        --rose-500: {$colors['primary']} !important;
        --rose-700: {$colors['secondary']} !important;
        --rose-300: {$colors['accent']} !important;
    }";
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION COULEURS ET STYLE GLOBAL :
 * 
 * Cette section contrôle l'apparence générale et l'harmonie visuelle 
 * de tout votre site. C'est votre identité visuelle !
 * 
 * 🎨 SYSTÈME DE COULEURS :
 * 
 * 1. 🔴 COULEUR PRINCIPALE
 *    → Boutons, liens, éléments importants
 *    → Doit être lisible et représenter votre personnalité
 * 
 * 2. 🟣 COULEUR SECONDAIRE  
 *    → Version plus foncée de la principale
 *    → Pour les survols et variations
 * 
 * 3. 🌸 COULEUR D'ACCENTUATION
 *    → Version plus claire de la principale
 *    → Pour les fonds doux et highlights
 * 
 * 4. ⚫ COULEURS DE TEXTE
 *    → Principal : Titres et texte important
 *    → Secondaire : Descriptions et détails
 * 
 * 5. ⚪ COULEURS DE FOND
 *    → Principal : Fond général du site
 *    → Alternatif : Sections et cartes
 * 
 * 🎯 DEUX APPROCHES :
 * 
 * A) 🚀 RAPIDE : Palettes prédéfinies
 *    → 7 palettes harmonieuses prêtes
 *    → Application instantanée
 *    → Parfait pour commencer
 * 
 * B) 🎨 PERSONNALISÉE : Vos couleurs
 *    → Contrôle total sur chaque couleur
 *    → Identité visuelle unique
 *    → Plus de travail mais plus personnel
 * 
 * 💡 PALETTES DISPONIBLES :
 * 
 * • VIOLET RÊVEUR : Douce et rassurante (défaut)
 * • ROSE DOUX : Féminine et bienveillante
 * • NATURE ZEN : Apaisante et naturelle
 * • OCÉAN CALME : Professionnelle et sereine
 * • COUCHER DE SOLEIL : Chaleureuse et accueillante
 * • BLEU PROFESSIONNEL : Sérieuse et fiable
 * • OR ÉLÉGANT : Luxueuse et sophistiquée
 * 
 * 🔧 STYLE ET APPARENCE :
 * 
 * • STYLE GÉNÉRAL : Moderne, classique, doux, minimal, élégant
 * • ANIMATIONS : Rendent le site vivant et engageant
 * • OMBRES : Donnent de la profondeur et du professionnalisme
 * • CONTRASTE : Important pour la lisibilité et l'accessibilité
 * 
 * 📱 RESPONSIVE ET ACCESSIBILITÉ :
 * 
 * • Couleurs adaptées à tous les écrans
 * • Contraste respectant les normes d'accessibilité
 * • Mode sombre optionnel
 * • Tailles de police ajustables
 * 
 * 🎯 CONSEILS POUR CHOISIR :
 * 
 * ✅ HARMONIE : Couleurs qui se complètent
 * ✅ LISIBILITÉ : Bon contraste texte/fond
 * ✅ PROFESSIONNALISME : Évitez les couleurs trop vives
 * ✅ PERSONNALITÉ : Reflètent votre approche
 * ✅ COHÉRENCE : Même famille de couleurs partout
 * 
 * 🔄 PROCESSUS RECOMMANDÉ :
 * 
 * 1. Testez d'abord les palettes prédéfinies
 * 2. Choisissez celle qui vous correspond le mieux
 * 3. Ajustez individuellement si besoin
 * 4. Vérifiez sur mobile et desktop
 * 5. Demandez des avis à votre entourage
 * 
 * ⚠️ ERREURS À ÉVITER :
 * 
 * ❌ Trop de couleurs différentes
 * ❌ Contraste insuffisant (texte illisible)
 * ❌ Couleurs trop vives ou agressives
 * ❌ Incohérence entre les sections
 * ❌ Oublier de tester sur mobile
 * 
 * 🎨 CSS PERSONNALISÉ :
 * Section avancée pour les utilisateurs expérimentés.
 * Permet des modifications très spécifiques.
 * À utiliser avec précaution.
 * 
 * 🔄 RÉSULTAT ATTENDU :
 * Un site visuellement harmonieux, professionnel et à votre image,
 * qui inspire confiance et donne envie de vous contacter.
 */