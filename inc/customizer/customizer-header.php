<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 🏠 EN-TÊTE DU SITE
 * Gestion du logo, nom et sous-titre dans l'en-tête
 * Apparaît tout en haut de votre site
 */

function isabel_customizer_header($wp_customize) {
    
    // ==========================================
    // SECTION : EN-TÊTE DU SITE
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_header_section',
        '🏠 En-tête du site',
        'Personnalisez l\'apparence de votre en-tête (logo, nom, sous-titre)',
        10 // Priorité 10 = tout en haut
    );
    
    // ==========================================
    // LOGO DU HEADER
    // ==========================================
    isabel_add_image_control(
        $wp_customize,
        'isabel_header_logo',
        'isabel_header_section',
        'Logo de l\'en-tête',
        'Image affichée à côté de votre nom dans l\'en-tête. 
Taille recommandée : 100x100 pixels.
Formats acceptés : JPG, PNG, SVG.'
    );
    
    // ==========================================
    // NOM DANS L'EN-TÊTE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_header_name',
        'isabel_header_section',
        'Votre nom dans l\'en-tête',
        'Le nom affiché à côté du logo dans l\'en-tête.
Exemple : Isabel GONCALVES',
        'Isabel GONCALVES'
    );
    
    // ==========================================
    // SOUS-TITRE DANS L'EN-TÊTE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_header_subtitle',
        'isabel_header_section',
        'Votre sous-titre dans l\'en-tête',
        'Texte affiché sous votre nom dans l\'en-tête.
Exemple : Formatrice & Coach Certifiée',
        'Formatrice & Coach Certifiée'
    );
    
    // ==========================================
    // BOUTON CTA HEADER (Desktop uniquement)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_header_cta_text',
        'isabel_header_section',
        'Texte du bouton en-tête (desktop)',
        'Bouton affiché dans l\'en-tête sur les grands écrans.
Exemple : Prendre rendez-vous',
        'Prendre rendez-vous'
    );
    
    // ==========================================
    // AFFICHAGE DU BOUTON CTA
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_header_cta_enable',
        'isabel_header_section',
        'Afficher le bouton dans l\'en-tête',
        'Cochez pour afficher un bouton d\'action dans l\'en-tête sur desktop.',
        true
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION EN-TÊTE DU SITE :
 * 
 * Cette section contrôle tout ce qui apparaît dans la barre du haut de votre site.
 * 
 * 📍 OÙ ÇA APPARAÎT :
 * - Tout en haut de votre site
 * - Visible sur toutes les pages
 * - Reste fixe quand on fait défiler
 * 
 * 🎛️ VOS RÉGLAGES :
 * 1. Logo : Votre image de marque (optionnel)
 * 2. Nom : Votre nom professionnel
 * 3. Sous-titre : Votre spécialité/fonction
 * 4. Bouton CTA : Bouton d'action (desktop uniquement)
 * 
 * 💡 CONSEILS :
 * - Le logo n'est pas obligatoire
 * - Gardez le nom court et professionnel
 * - Le sous-titre doit être clair et informatif
 * - Le bouton CTA sera automatiquement masqué sur mobile
 * 
 * 🔄 EXEMPLE D'UTILISATION :
 * - Logo : Votre photo ou logo
 * - Nom : "Isabel GONCALVES"
 * - Sous-titre : "Coach Certifiée & Hypnocoach"
 * - Bouton : "Prendre rendez-vous"
 */