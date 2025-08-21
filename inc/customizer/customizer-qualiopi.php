<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 🏆 CERTIFICATION QUALIOPI
 * Section pour afficher votre certification professionnelle
 * Renforce votre crédibilité après la section hero
 */

function isabel_customizer_qualiopi($wp_customize) {
    
    // ==========================================
    // SECTION : CERTIFICATION QUALIOPI
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_qualiopi_section',
        '🏆 Certification Qualiopi',
        'Mettez en avant votre certification professionnelle pour renforcer votre crédibilité',
        40 // Priorité 40 = après la section hero
    );
    
    // ==========================================
    // ACTIVATION DE LA SECTION
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_qualiopi_enable',
        'isabel_qualiopi_section',
        'Afficher la certification Qualiopi',
        'Cochez pour afficher votre certification sur toutes les pages.
Décochez pour masquer complètement cette section.

📍 Où ça apparaît : Juste après votre section d\'accueil, sur toutes les pages.',
        true
    );
    
    // ==========================================
    // LOGO QUALIOPI
    // ==========================================
    isabel_add_image_control(
        $wp_customize,
        'isabel_qualiopi_logo',
        'isabel_qualiopi_section',
        'Logo de certification Qualiopi',
        'Uploadez votre logo officiel Qualiopi.
Format recommandé : PNG avec fond transparent.
Taille recommandée : 200x100 pixels.

🏆 Où ça apparaît : À gauche du texte de certification.'
    );
    
    // ==========================================
    // TITRE PRINCIPAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_qualiopi_title',
        'isabel_qualiopi_section',
        'Titre de votre certification',
        'Le titre principal de votre certification.
Exemple : "Organisme de formation certifié Qualiopi", "Formation certifiée qualité"

📢 Où ça apparaît : Titre principal à côté du logo.',
        'Organisme de formation certifié Qualiopi'
    );
    
    // ==========================================
    // DESCRIPTION / MENTION LÉGALE
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_qualiopi_description',
        'isabel_qualiopi_section',
        'Description de la certification',
        'Texte descriptif ou mention légale de votre certification.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : La certification qualité a été délivrée au titre de la catégorie d\'actions suivante : **actions de formation**

📝 Où ça apparaît : Texte explicatif sous le titre.',
        'La certification qualité a été délivrée au titre de la catégorie d\'actions suivante : actions de formation'
    );
    
    // ==========================================
    // NUMÉRO DE CERTIFICATION (optionnel)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_qualiopi_number',
        'isabel_qualiopi_section',
        'Numéro de certification (optionnel)',
        'Si vous souhaitez afficher le numéro officiel de votre certification.
Exemple : "N° 12345678", "Ref: QUAL-2023-001"

🔢 Où ça apparaît : Sous la description, en petit.',
        ''
    );
    
    // ==========================================
    // DATE D'OBTENTION (optionnel)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_qualiopi_date',
        'isabel_qualiopi_section',
        'Date ou mention temporelle (optionnel)',
        'Information sur la date d\'obtention ou de validité.
Exemple : "Certifié depuis 2023", "Valable jusqu\'en 2026", "Renouvelé en 2024"

📅 Où ça apparaît : Sous le numéro, en petit.',
        ''
    );
    
    // ==========================================
    // STYLE D'AFFICHAGE
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_qualiopi_style',
        'isabel_qualiopi_section',
        'Style d\'affichage',
        array(
            'standard' => 'Standard (Logo + Texte)',
            'compact' => 'Compact (Plus petit)',
            'premium' => 'Premium (Avec bordure colorée)',
            'minimal' => 'Minimal (Texte seulement)',
        ),
        'Choisissez le style de présentation de votre certification.
Standard = Recommandé pour la plupart des cas.
Premium = Plus visible et élégant.',
        'standard'
    );
    
    // ==========================================
    // COULEUR DE LA CERTIFICATION
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_qualiopi_color',
        'isabel_qualiopi_section',
        'Couleur de la certification',
        '#1e40af' // Bleu officiel Qualiopi
    );
    
    // ==========================================
    // POSITION SUR LA PAGE
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_qualiopi_position',
        'isabel_qualiopi_section',
        'Position sur les pages',
        array(
            'after_hero' => 'Après la section d\'accueil (recommandé)',
            'before_services' => 'Avant les services',
            'after_services' => 'Après les services',
            'before_footer' => 'Avant le pied de page',
        ),
        'Où afficher votre certification sur vos pages.
Recommandé : Après la section d\'accueil pour un impact maximum.',
        'after_hero'
    );
    
    // ==========================================
    // AFFICHAGE SUR PAGES SPÉCIFIQUES
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_qualiopi_homepage_only',
        'isabel_qualiopi_section',
        'Afficher uniquement sur la page d\'accueil',
        'Cochez pour afficher la certification seulement sur la page d\'accueil.
Décochez pour l\'afficher sur toutes les pages.',
        false
    );
    
    // ==========================================
    // LIEN VERS PLUS D'INFOS (optionnel)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_qualiopi_link',
        'isabel_qualiopi_section',
        'Lien vers plus d\'informations (optionnel)',
        'URL vers une page avec plus d\'informations sur votre certification.
Exemple : https://votre-site.com/certification

🔗 Où ça apparaît : La section certification deviendra cliquable.',
        '',
        'url'
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION CERTIFICATION QUALIOPI :
 * 
 * Cette section renforce votre crédibilité professionnelle en affichant
 * votre certification Qualiopi de manière élégante et conforme.
 * 
 * 📍 IMPORTANCE DE CETTE SECTION :
 * 
 * ✅ CRÉDIBILITÉ : Prouve votre professionnalisme
 * ✅ CONFIANCE : Rassure vos prospects 
 * ✅ DIFFÉRENCIATION : Vous distingue de la concurrence
 * ✅ LÉGALITÉ : Respecte vos obligations d'affichage
 * 
 * 🎯 ÉLÉMENTS CLÉS :
 * 
 * 1. 🏆 LOGO : Logo officiel Qualiopi
 * 2. 📢 TITRE : "Organisme de formation certifié Qualiopi"
 * 3. 📝 DESCRIPTION : Mention légale obligatoire
 * 4. 🔢 NUMÉRO : Référence de certification (optionnel)
 * 5. 📅 DATE : Période de validité (optionnel)
 * 
 * 💡 CONSEILS D'UTILISATION :
 * 
 * ✅ TOUJOURS ACTIVÉ : Laissez cette section active
 * ✅ LOGO OFFICIEL : Utilisez le vrai logo Qualiopi
 * ✅ TEXTE CORRECT : Respectez la mention légale exacte
 * ✅ STYLE PREMIUM : Pour plus d'impact visuel
 * ✅ POSITION APRÈS HERO : Maximum de visibilité
 * 
 * 🔄 STYLES DISPONIBLES :
 * 
 * • STANDARD : Classique et sobre
 * • COMPACT : Plus discret
 * • PREMIUM : Avec bordure colorée (recommandé)
 * • MINIMAL : Texte seulement
 * 
 * 📱 RESPONSIVE :
 * - Desktop : Logo à gauche, texte à droite
 * - Mobile : Logo au-dessus, texte en dessous
 * 
 * ⚖️ CONFORMITÉ LÉGALE :
 * Cette section vous aide à respecter vos obligations d'affichage
 * de la certification Qualiopi de manière professionnelle.
 */