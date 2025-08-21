<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 🎯 MES SERVICES
 * Section pour présenter vos 4 services principaux
 * Cœur de votre offre professionnelle
 */

function isabel_customizer_services($wp_customize) {
    
    // ==========================================
    // SECTION : MES SERVICES
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_services_section',
        '🎯 Mes services',
        'Présentez vos 4 services principaux de manière claire et attractive',
        50 // Priorité 50 = après Qualiopi
    );
    
    // ==========================================
    // TITRE DE LA SECTION SERVICES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_services_title',
        'isabel_services_section',
        'Titre de vos services',
        'Le titre principal de votre section services.
Exemple : "Mes Accompagnements Sur Mesure", "Mes Services", "Comment je vous aide"

📢 Où ça apparaît : Grand titre au-dessus de vos 4 services.',
        'Mes Accompagnements Sur Mesure'
    );
    
    // ==========================================
    // SOUS-TITRE / DESCRIPTION DES SERVICES
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_services_subtitle',
        'isabel_services_section',
        'Description de vos services',
        'Texte d\'introduction pour présenter votre approche.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Quatre approches **complémentaires** pour révéler votre potentiel
et atteindre vos objectifs personnels et professionnels.

💬 Où ça apparaît : Sous le titre, avant la grille des services.',
        'Quatre approches complémentaires pour révéler votre potentiel et atteindre vos objectifs personnels et professionnels.'
    );
    
    // ==========================================
    // SERVICE 1 : COACHING PERSONNEL
    // ==========================================
    
    // Icône Service 1
    isabel_add_text_control(
        $wp_customize,
        'isabel_service1_icon',
        'isabel_services_section',
        'Service 1 - Icône',
        'Icône ou numéro pour votre premier service.
Exemple : "🎯", "01", "💼", "✨"

🎯 Où ça apparaît : Dans le cercle coloré du service 1.',
        '01'
    );
    
    // Titre Service 1
    isabel_add_text_control(
        $wp_customize,
        'isabel_service1_title',
        'isabel_services_section',
        'Service 1 - Titre',
        'Nom de votre premier service.
Exemple : "Coaching Personnel", "Accompagnement Individuel"

📢 Où ça apparaît : Titre du premier service.',
        'Coaching Personnel'
    );
    
    // Description Service 1
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_service1_desc',
        'isabel_services_section',
        'Service 1 - Description',
        'Description complète de votre premier service.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Révélez votre **potentiel**, clarifiez vos objectifs et transformez votre vie
avec un accompagnement personnalisé et des outils concrets.

💬 Où ça apparaît : Texte explicatif du service 1.',
        'Révélez votre potentiel, clarifiez vos objectifs et transformez votre vie avec un accompagnement personnalisé et des outils concrets.'
    );
    
    // ==========================================
    // SERVICE 2 : ACCOMPAGNEMENT VAE
    // ==========================================
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_service2_icon',
        'isabel_services_section',
        'Service 2 - Icône',
        'Icône ou numéro pour votre deuxième service.
Exemple : "🎓", "02", "📜", "🏆"',
        '02'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_service2_title',
        'isabel_services_section',
        'Service 2 - Titre',
        'Nom de votre deuxième service.
Exemple : "Accompagnement VAE", "Validation des Acquis"',
        'Accompagnement VAE'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_service2_desc',
        'isabel_services_section',
        'Service 2 - Description',
        'Description complète de votre accompagnement VAE.
Exemple : Valorisez votre **expérience** et obtenez une reconnaissance officielle
de vos compétences grâce à un accompagnement expert VAE.',
        'Valorisez votre expérience et obtenez une reconnaissance officielle de vos compétences grâce à un accompagnement expert VAE.'
    );
    
    // ==========================================
    // SERVICE 3 : HYPNOCOACHING
    // ==========================================
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_service3_icon',
        'isabel_services_section',
        'Service 3 - Icône',
        'Icône ou numéro pour votre troisième service.
Exemple : "🧘", "03", "🌟", "🧠"',
        '03'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_service3_title',
        'isabel_services_section',
        'Service 3 - Titre',
        'Nom de votre troisième service.
Exemple : "Hypnocoaching", "Hypnose & Coaching"',
        'Hypnocoaching'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_service3_desc',
        'isabel_services_section',
        'Service 3 - Description',
        'Description complète de votre hypnocoaching.
Exemple : Libérez-vous de vos **blocages** en profondeur
en combinant les bienfaits de l\'hypnose thérapeutique et du coaching.',
        'Libérez-vous de vos blocages en profondeur en combinant les bienfaits de l\'hypnose thérapeutique et du coaching de vie.'
    );
    
    // ==========================================
    // SERVICE 4 : CONSULTATION DÉCOUVERTE
    // ==========================================
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_service4_icon',
        'isabel_services_section',
        'Service 4 - Icône',
        'Icône ou numéro pour votre quatrième service.
Exemple : "💡", "04", "🎁", "☕"',
        '04'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_service4_title',
        'isabel_services_section',
        'Service 4 - Titre',
        'Nom de votre quatrième service.
Exemple : "Consultation Découverte", "Rendez-vous Gratuit"',
        'Consultation Découverte'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_service4_desc',
        'isabel_services_section',
        'Service 4 - Description',
        'Description de votre consultation découverte.
Exemple : Première rencontre **gratuite** pour faire connaissance,
comprendre vos besoins et définir ensemble le meilleur accompagnement.',
        'Première rencontre gratuite pour faire connaissance, comprendre vos besoins et définir ensemble le meilleur accompagnement pour vous.'
    );
    
    // ==========================================
    // STYLE D'AFFICHAGE DES SERVICES
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_services_layout',
        'isabel_services_section',
        'Disposition des services',
        array(
            'grid_2x2' => '2x2 (2 lignes de 2 services)',
            'grid_4x1' => '4x1 (1 ligne de 4 services)',
            'grid_1x4' => '1x4 (4 lignes de 1 service)',
        ),
        'Comment disposer vos 4 services sur la page.
2x2 = Recommandé pour la plupart des écrans.
Sur mobile, toujours en colonne unique.',
        'grid_2x2'
    );
    
    // ==========================================
    // COULEUR DES SERVICES
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_services_color',
        'isabel_services_section',
        'Couleur des icônes services',
        '#e4a7f5'
    );
    
    // ==========================================
    // SERVICES CLIQUABLES
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_services_clickable',
        'isabel_services_section',
        'Rendre les services cliquables',
        'Cochez pour que chaque service mène vers sa page détaillée.
Les pages de services sont créées automatiquement.',
        true
    );
    
    // ==========================================
    // ANIMATION AU SURVOL
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_services_hover_effect',
        'isabel_services_section',
        'Effet au survol',
        'Cochez pour ajouter un effet d\'animation quand on survole les services.
Recommandé pour un site moderne.',
        true
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION MES SERVICES :
 * 
 * C'est le cœur de votre site ! Cette section présente clairement
 * ce que vous proposez à vos clients potentiels.
 * 
 * 📍 VOS 4 SERVICES ACTUELS :
 * 
 * 1. 🎯 COACHING PERSONNEL
 *    → Accompagnement individuel personnalisé
 * 
 * 2. 🎓 ACCOMPAGNEMENT VAE  
 *    → Validation des acquis de l'expérience
 * 
 * 3. 🧘 HYPNOCOACHING
 *    → Alliance hypnose + coaching
 * 
 * 4. 💡 CONSULTATION DÉCOUVERTE
 *    → Premier rendez-vous gratuit
 * 
 * 🎯 STRUCTURE DE CHAQUE SERVICE :
 * 
 * • ICÔNE : Identifie visuellement (🎯, 01, etc.)
 * • TITRE : Nom clair du service  
 * • DESCRIPTION : Bénéfices et promesse
 * 
 * 💡 CONSEILS POUR VOS DESCRIPTIONS :
 * 
 * ✅ ORIENTÉES BÉNÉFICES : "Révélez votre potentiel" plutôt que "Je fais du coaching"
 * ✅ MOTS IMPACTANTS : "Transformez", "Libérez-vous", "Révélez"
 * ✅ MISE EN FORME : Utilisez **mots clés** en gras
 * ✅ LONGUEUR : 2-3 lignes par service maximum
 * 
 * 📱 AFFICHAGE RESPONSIVE :
 * - Desktop : 2x2 ou 4x1 selon votre choix
 * - Mobile : Toujours 1 colonne pour la lisibilité
 * 
 * 🔗 PAGES DE SERVICES :
 * Si vous activez "Services cliquables", chaque service
 * mène vers sa page détaillée (créées automatiquement).
 * 
 * 🎨 PERSONNALISATION :
 * - Couleurs des icônes 
 * - Effets au survol
 * - Disposition flexible
 * 
 * 🔄 RÉSULTAT :
 * Vos visiteurs comprennent immédiatement :
 * - Ce que vous proposez
 * - Comment vous pouvez les aider  
 * - Quel service leur convient
 * - Comment vous contacter
 */