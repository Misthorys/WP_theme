<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 🖼️ MES PHOTOS
 * Gestion de toutes les images du site
 * Photos de profil et images de fond
 */

function isabel_customizer_images($wp_customize) {
    
    // ==========================================
    // SECTION : MES PHOTOS
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_images_section',
        '🖼️ Mes photos',
        'Gérez toutes vos photos : profil, mobile et arrière-plans',
        20 // Priorité 20 = après l'en-tête
    );
    
    // ==========================================
    // PHOTO DE PROFIL PRINCIPALE (Desktop)
    // ==========================================
    isabel_add_image_control(
        $wp_customize,
        'isabel_profile_image',
        'isabel_images_section',
        'Votre photo de profil principale',
        'Cette photo apparaît dans le cercle à droite sur ordinateur.
Taille recommandée : 400x400 pixels minimum.
Format : JPG ou PNG avec fond uni de préférence.

🖥️ Où ça apparaît : Cercle à droite de votre présentation sur desktop.'
    );
    
    // ==========================================
    // PHOTO DE PROFIL MOBILE
    // ==========================================
    isabel_add_image_control(
        $wp_customize,
        'isabel_mobile_profile_image',
        'isabel_images_section',
        'Votre photo pour mobile',
        'Photo spécifique pour les téléphones et tablettes.
Taille recommandée : 300x300 pixels.
Si vide, aucune photo ne s\'affichera sur mobile.

📱 Où ça apparaît : Au-dessus de votre texte de présentation sur mobile et tablette.'
    );
    
    // ==========================================
    // IMAGE DE FOND SECTION HÉRO
    // ==========================================
    isabel_add_image_control(
        $wp_customize,
        'isabel_hero_background_image',
        'isabel_images_section',
        'Image de fond de votre page d\'accueil',
        'Image de fond pour toute la section de présentation.
Taille recommandée : 1920x1080 pixels (format paysage).
Exemple : Paysage zen, fleurs de cerisier, nature apaisante.

🌸 Où ça apparaît : Arrière-plan de toute votre section d\'accueil, sur tous les écrans.'
    );
    
    // ==========================================
    // OPACITÉ DE L'IMAGE DE FOND
    // ==========================================
    $wp_customize->add_setting('isabel_hero_bg_opacity', array(
        'default' => 70,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('isabel_hero_bg_opacity', array(
        'label' => 'Visibilité de l\'image de fond',
        'description' => 'Réglez la visibilité de votre image de fond.
70% = bien visible (recommandé)
50% = moyennement visible
90% = très visible',
        'section' => 'isabel_images_section',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 20,
            'max' => 95,
            'step' => 5,
        ),
    ));
    
    // ==========================================
    // IMAGE PLACEHOLDER ALTERNATIVE
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_placeholder_style',
        'isabel_images_section',
        'Style sans photo de profil',
        array(
            'initials' => 'Initiales (IG)',
            'icon' => 'Icône silhouette',
            'gradient' => 'Dégradé coloré',
        ),
        'Si vous n\'avez pas encore de photo, choisissez le style d\'affichage.
Par défaut : Vos initiales dans un cercle coloré.',
        'initials'
    );
    
    // ==========================================
    // CONSEILS D'OPTIMISATION DES IMAGES
    // ==========================================
    $wp_customize->add_setting('isabel_image_tips', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'isabel_image_tips', array(
        'label' => '💡 Conseils pour vos photos',
        'description' => '✅ PHOTOS DE PROFIL :
• Format carré (400x400 pixels)
• Visage bien centré et souriant
• Fond uni ou flouté
• Bonne luminosité

✅ IMAGE DE FOND :
• Format paysage (1920x1080)
• Couleurs douces et apaisantes
• Évitez les images trop chargées
• Testez sur mobile et desktop

🔧 OUTILS GRATUITS :
• Canva.com pour redimensionner
• Remove.bg pour enlever le fond
• TinyPNG.com pour compresser',
        'section' => 'isabel_images_section',
        'type' => 'hidden',
    )));
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION MES PHOTOS :
 * 
 * Cette section gère toutes les images de votre site pour un rendu professionnel.
 * 
 * 📍 VOS 3 TYPES D'IMAGES :
 * 
 * 1. 🖥️ PHOTO DE PROFIL DESKTOP
 *    - Apparaît dans le cercle à droite
 *    - Visible sur ordinateur et tablette
 *    - Doit être carrée (400x400px)
 * 
 * 2. 📱 PHOTO MOBILE
 *    - Apparaît au-dessus du texte sur mobile
 *    - Plus petite (300x300px)
 *    - Optionnelle
 * 
 * 3. 🌸 IMAGE DE FOND
 *    - Arrière-plan de votre section d'accueil
 *    - Format paysage (1920x1080px)
 *    - Donne le ton de votre site
 * 
 * 🎯 PRIORITÉS D'AJOUT :
 * 1. Photo de profil desktop (OBLIGATOIRE pour un site pro)
 * 2. Image de fond (RECOMMANDÉE pour l'ambiance)
 * 3. Photo mobile (OPTIONNELLE, pour optimiser)
 * 
 * 💡 ASTUCES PRATIQUES :
 * - Commencez par la photo de profil desktop
 * - Choisissez une image de fond qui vous représente
 * - Testez différents niveaux de visibilité pour le fond
 * - Si pas de photo, les initiales s'afficheront automatiquement
 * 
 * 🔄 RÉSULTAT :
 * - Site plus professionnel et accueillant
 * - Image cohérente sur tous les appareils
 * - Ambiance visuelle qui vous ressemble
 */