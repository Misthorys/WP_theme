<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ✨ SECTION D'ACCUEIL (HERO)
 * La première chose que vos visiteurs voient
 * Votre présentation principale et accrocheuse
 */

function isabel_customizer_homepage($wp_customize) {
    
    // ==========================================
    // SECTION : SECTION D'ACCUEIL
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_homepage_section',
        '✨ Section d\'accueil',
        'Votre présentation principale - La première chose que vos visiteurs voient',
        30 // Priorité 30 = après les images
    );
    
    // ==========================================
    // BADGE DU HERO
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_hero_badge',
        'isabel_homepage_section',
        'Votre badge professionnel',
        'Petit badge avec étoile affiché en haut de votre présentation.
Exemple : "Coach certifiée", "Formatrice agréée", "Experte VAE"

⭐ Où ça apparaît : Petit encadré coloré tout en haut de votre présentation.',
        'Coach certifiée'
    );
    
    // ==========================================
    // NOM PRINCIPAL (différent du header)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_main_name',
        'isabel_homepage_section',
        'Votre nom principal',
        'Le grand titre de votre présentation (peut être différent de l\'en-tête).
Exemple : "Isabel GONCALVES", "Isabel G.", "Coach Isabel"

📢 Où ça apparaît : Grand titre au centre de votre présentation.',
        'Isabel GONCALVES'
    );
    
    // ==========================================
    // SOUS-TITRE / SPÉCIALITÉ
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_subtitle',
        'isabel_homepage_section',
        'Votre spécialité',
        'Votre titre professionnel sous votre nom.
Exemple : "Coach Certifiée & Hypnocoach", "Formatrice en développement personnel"

💼 Où ça apparaît : Sous votre nom principal, en caractères moyens.',
        'Coach Certifiée & Hypnocoach'
    );
    
    // ==========================================
    // TEXTE DE PRÉSENTATION
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_intro_text',
        'isabel_homepage_section',
        'Votre texte de présentation',
        'Votre message d\'accueil pour vos visiteurs.
Vous pouvez utiliser **texte** pour mettre en gras et appuyer sur Entrée pour les retours à la ligne.

Exemple : Je vous accompagne avec **bienveillance** dans votre développement personnel
et professionnel grâce au coaching, à la VAE et à l\'hypnocoaching.

💬 Où ça apparaît : Paragraphe principal de votre présentation.',
        'Bienvenue dans votre espace de transformation personnelle ! Je vous accompagne avec **bienveillance** vers l\'épanouissement de votre potentiel grâce au coaching, à la VAE et à l\'hypnocoaching.'
    );
    
    // ==========================================
    // BOUTON PRINCIPAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_main_button_text',
        'isabel_homepage_section',
        'Texte de votre bouton principal',
        'Le bouton d\'action principal de votre site.
Exemple : "Prendre rendez-vous", "Me contacter", "Réserver ma consultation"

🔘 Où ça apparaît : Gros bouton coloré sous votre présentation.',
        'Prendre rendez-vous'
    );
    
    // ==========================================
    // BOUTON SECONDAIRE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_secondary_button_text',
        'isabel_homepage_section',
        'Texte du bouton secondaire',
        'Bouton secondaire optionnel à côté du bouton principal.
Exemple : "En savoir plus", "Mes services", "Découvrir"

⚪ Où ça apparaît : Bouton transparent à côté du bouton principal.',
        'En savoir plus'
    );
    
    // ==========================================
    // AFFICHAGE DU BOUTON SECONDAIRE
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_secondary_button_enable',
        'isabel_homepage_section',
        'Afficher le bouton secondaire',
        'Cochez pour afficher un deuxième bouton à côté du bouton principal.',
        true
    );
    
    // ==========================================
    // SECTION : POURQUOI ME CHOISIR
    // ==========================================
    
    // Titre de la section
    isabel_add_text_control(
        $wp_customize,
        'isabel_why_choose_title',
        'isabel_homepage_section',
        'Titre "Pourquoi me choisir"',
        'Titre de votre section des points forts.
Exemple : "✨ Pourquoi me choisir ?", "🎯 Mes atouts", "💼 Mes avantages"

📋 Où ça apparaît : Titre au-dessus de vos 4 points forts.',
        '✨ Pourquoi me choisir ?'
    );
    
    // 4 points "Pourquoi me choisir"
    $why_points_defaults = array(
        1 => '🎯 Approche personnalisée',
        2 => '📜 Certification professionnelle', 
        3 => '🧠 Méthodes innovantes',
        4 => '💼 Accompagnement sur mesure'
    );
    
    for ($i = 1; $i <= 4; $i++) {
        isabel_add_text_control(
            $wp_customize,
            "isabel_why_point_$i",
            'isabel_homepage_section',
            "Point fort n°$i",
            "Votre $i" . ($i == 1 ? "er" : "ème") . " avantage concurrentiel.
Utilisez une icône en début pour plus d'impact (🎯, 📜, 💼, ✨, etc.).

📍 Où ça apparaît : Dans la grille de vos points forts sous votre présentation.",
            $why_points_defaults[$i]
        );
    }
    
    // ==========================================
    // STYLE DE LA SECTION HERO
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_hero_layout',
        'isabel_homepage_section',
        'Style de présentation',
        array(
            'centered' => 'Centré (texte au centre)',
            'left_text' => 'Texte à gauche, photo à droite',
            'right_text' => 'Texte à droite, photo à gauche',
        ),
        'Choisissez comment disposer votre présentation sur desktop.
Sur mobile, tout sera automatiquement centré.',
        'left_text'
    );
    
    // ==========================================
    // COULEUR D'ACCENTUATION DE LA SECTION
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_hero_accent_color',
        'isabel_homepage_section',
        'Couleur d\'accentuation',
        '#e4a7f5'
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION D'ACCUEIL (HERO) :
 * 
 * C'est LA section la plus importante de votre site ! C'est la première chose
 * que vos visiteurs voient et qui détermine s'ils restent ou partent.
 * 
 * 📍 STRUCTURE DE VOTRE PRÉSENTATION :
 * 
 * 1. ⭐ BADGE : "Coach certifiée" 
 *    → Crédibilité immédiate
 * 
 * 2. 📢 NOM : "Isabel GONCALVES"
 *    → Identification claire
 * 
 * 3. 💼 SPÉCIALITÉ : "Coach Certifiée & Hypnocoach"
 *    → Ce que vous faites
 * 
 * 4. 💬 PRÉSENTATION : Votre message d'accueil
 *    → Pourquoi vous choisir
 * 
 * 5. 🔘 BOUTONS : Actions pour vos visiteurs
 *    → Comment vous contacter
 * 
 * 6. 📋 POINTS FORTS : Vos 4 avantages
 *    → Pourquoi vous êtes différente
 * 
 * 🎯 CONSEILS POUR RÉUSSIR :
 * 
 * ✅ BADGE : Court et impactant
 * ✅ NOM : Votre nom professionnel
 * ✅ SPÉCIALITÉ : Claire et précise
 * ✅ PRÉSENTATION : Chaleureuse et rassurante
 * ✅ BOUTON PRINCIPAL : Action claire ("Prendre rendez-vous")
 * ✅ POINTS FORTS : Concrets et différenciants
 * 
 * 📱 RESPONSIVE :
 * - Sur desktop : Texte à gauche, photo à droite
 * - Sur mobile : Tout centré, photo au-dessus
 * 
 * 💡 EXEMPLE COMPLET :
 * - Badge : "Coach certifiée"
 * - Nom : "Isabel GONCALVES"  
 * - Spécialité : "Coach Certifiée & Hypnocoach"
 * - Présentation : "Je vous accompagne avec **bienveillance**..."
 * - Bouton : "Prendre rendez-vous"
 * - Points : "🎯 Approche personnalisée", etc.
 */