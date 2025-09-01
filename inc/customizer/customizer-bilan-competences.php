<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 📋 PAGE BILAN DE COMPÉTENCES
 * Personnalisation complète de la page bilan de compétences
 * Troisième page de service détaillée
 */

function isabel_customizer_hypno($wp_customize) {
    
    // ==========================================
    // SECTION : PAGE BILAN DE COMPÉTENCES
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_hypno_section',
        '📋 Page Bilan de compétences',
        'Personnalisez entièrement votre page de bilan de compétences',
        93 // Priorité 93 = pages détaillées
    );
    
    // ==========================================
    // EN-TÊTE DE LA PAGE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_title',
        'isabel_hypno_section',
        'Titre de la page',
        'Le titre principal affiché en haut de la page.
Exemple : "Bilan de compétences", "Évaluation des compétences"

📢 Où ça apparaît : Grand titre en haut de la page bilan de compétences.',
        'Bilan de compétences'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_subtitle',
        'isabel_hypno_section',
        'Sous-titre de la page',
        'Phrase d\'accroche sous le titre principal.
Exemple : "Libérez-vous de vos blocages en profondeur"

💫 Où ça apparaît : Sous le titre principal, en plus petit.',
        'Libérez-vous de vos blocages en profondeur grâce à l\'alliance du coaching et de l\'hypnose'
    );
    
    // ==========================================
    // SECTION INTRODUCTION
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_section1_title',
        'isabel_hypno_section',
        'Titre section introduction',
        'Titre de votre première section de contenu.
Exemple : "Qu\'est-ce que le bilan de compétences ?", "Une approche innovante"',
        'Qu\'est-ce que le bilan de compétences ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_intro',
        'isabel_hypno_section',
        'Texte d\'introduction',
        'Premier paragraphe qui explique le bilan de compétences.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Le bilan de compétences combine les bienfaits du **coaching traditionnel**
avec la puissance de l\'hypnose thérapeutique.',
        'Le bilan de compétences est une approche innovante qui combine les bienfaits du coaching traditionnel avec la puissance de l\'évaluation des compétences.'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_description',
        'isabel_hypno_section',
        'Description détaillée',
        'Deuxième paragraphe avec plus de détails sur les bénéfices.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.',
        'En état d\'hypnose, votre esprit devient plus réceptif aux changements positifs. Cette approche douce et respectueuse vous permet de transformer en profondeur vos croyances limitantes.'
    );
    
    // ==========================================
    // BOXES DE BÉNÉFICES (2 texte + 2 images)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_benefits_title',
        'isabel_hypno_section',
        'Titre des bénéfices',
        'Titre au-dessus de vos 4 boxes de bénéfices.
Exemple : "Pourquoi le bilan de compétences ?", "Les avantages de cette approche"',
        'Les bénéfices du bilan de compétences'
    );
    
    // Box 1 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box1_icon',
        'isabel_hypno_section',
        'Box 1 - Icône',
        'Icône pour la première box (emoji ou texte court).
Exemple : "🧠", "🌟", "01"',
        '🧠'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box1_title',
        'isabel_hypno_section',
        'Box 1 - Titre',
        'Titre de votre premier bénéfice.',
        'Accès à l\'inconscient'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_box1_text',
        'isabel_hypno_section',
        'Box 1 - Texte',
        'Description du premier bénéfice.
Vous pouvez utiliser **texte** en gras.',
        'Travaillez directement avec votre inconscient pour identifier et transformer les blocages à leur source.'
    );
    
    // Box 2 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box2_icon',
        'isabel_hypno_section',
        'Box 2 - Icône (optionnel)',
        'Icône pour la deuxième box (qui aura une image).',
        '⚡'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box2_title',
        'isabel_hypno_section',
        'Box 2 - Titre',
        'Titre affiché sur l\'image.',
        'Changements durables'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_box2_text',
        'isabel_hypno_section',
        'Box 2 - Texte',
        'Description du deuxième bénéfice.',
        'Obtenez des changements durables en moins de séances grâce à l\'efficacité de l\'hypnose thérapeutique.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_hypno_box2_image',
        'isabel_hypno_section',
        'Box 2 - Image',
        'Image pour illustrer ce bénéfice.
Taille recommandée : 400x300 pixels.'
    );
    
    // Box 3 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box3_icon',
        'isabel_hypno_section',
        'Box 3 - Icône',
        'Icône pour la troisième box.',
        '🌱'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box3_title',
        'isabel_hypno_section',
        'Box 3 - Titre',
        'Titre du troisième bénéfice.',
        'Transformation profonde'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_box3_text',
        'isabel_hypno_section',
        'Box 3 - Texte',
        'Description du troisième bénéfice.',
        'Modifiez vos schémas de pensée limitants et installez de nouveaux automatismes positifs.'
    );
    
    // Box 4 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box4_icon',
        'isabel_hypno_section',
        'Box 4 - Icône (optionnel)',
        'Icône pour la quatrième box.',
        '🔒'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_box4_title',
        'isabel_hypno_section',
        'Box 4 - Titre',
        'Titre affiché sur l\'image.',
        'Méthode naturelle'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_box4_text',
        'isabel_hypno_section',
        'Box 4 - Texte',
        'Description du quatrième bénéfice.',
        'Méthode naturelle et respectueuse qui vous permet de rester maître de vos choix à tout moment.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_hypno_box4_image',
        'isabel_hypno_section',
        'Box 4 - Image',
        'Image pour illustrer ce quatrième bénéfice.'
    );
    
    // ==========================================
    // PROCESSUS EN 4 ÉTAPES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_process_title',
        'isabel_hypno_section',
        'Titre du processus',
        'Titre au-dessus de vos 4 étapes.
Exemple : "Déroulement d\'une séance", "Comment ça se passe"',
        'Déroulement d\'un bilan de compétences'
    );
    
    // 4 étapes du processus bilan de compétences
    $step_defaults = array(
        1 => 'Discussion pour comprendre vos objectifs, vos blocages et adapter la séance à vos besoins spécifiques.',
        2 => 'Accompagnement vers un état de relaxation profonde où votre inconscient devient plus réceptif.',
        3 => 'Utilisation de techniques spécifiques pour lever les blocages et installer de nouveaux comportements positifs.',
        4 => 'Retour à l\'état de veille normale et échange sur l\'expérience vécue pour optimiser l\'intégration.'
    );
    
    for ($i = 1; $i <= 4; $i++) {
        isabel_add_textarea_control(
            $wp_customize,
            "isabel_hypno_step$i",
            'isabel_hypno_section',
            "Étape $i de la séance",
            "Description de l\'étape $i d\'un bilan de compétences.
Vous pouvez utiliser **texte** en gras.",
            $step_defaults[$i]
        );
    }
    
    // ==========================================
    // SECTIONS SUPPLÉMENTAIRES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_section2_title',
        'isabel_hypno_section',
        'Titre section 2',
        'Titre de votre deuxième section de contenu.
Exemple : "Domaines d\'application", "Pour quoi utiliser le bilan de compétences"',
        'Domaines d\'application'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_applications',
        'isabel_hypno_section',
        'Domaines d\'application',
        'Listez les problématiques que vous traitez avec le bilan de compétences.',
        'Le bilan de compétences est particulièrement efficace pour : évaluer vos compétences, identifier vos points forts, définir votre projet professionnel, améliorer votre confiance en soi.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_section3_title',
        'isabel_hypno_section',
        'Titre section 3',
        'Titre de votre troisième section.
Exemple : "Mythes et réalités", "Idées reçues sur l\'hypnose"',
        'Mythes et réalités sur l\'hypnose'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_myths',
        'isabel_hypno_section',
        'Démystification de l\'hypnose',
        'Expliquez ce qu\'est vraiment l\'hypnose thérapeutique.',
        'Contrairement aux idées reçues, l\'hypnose thérapeutique n\'a rien à voir avec l\'hypnose de spectacle. Vous restez conscient(e) et maître(sse) de vos choix à tout moment.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_section4_title',
        'isabel_hypno_section',
        'Titre section 4',
        'Titre de votre quatrième section.
Exemple : "Ma formation", "Mon approche"',
        'Ma formation et mon approche'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_formation',
        'isabel_hypno_section',
        'Votre formation et approche',
        'Présentez vos certifications et votre méthode.',
        'Certifiée en hypnose thérapeutique, je pratique une approche éthique et bienveillante. Chaque séance est adaptée à votre personnalité et à vos objectifs.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_section5_title',
        'isabel_hypno_section',
        'Titre section 5',
        'Titre de votre cinquième section.
Exemple : "Contre-indications", "Important à savoir"',
        'Contre-indications'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_contraindications',
        'isabel_hypno_section',
        'Contre-indications',
        'Listez les cas où l\'hypnose n\'est pas recommandée.',
        'L\'hypnose est contre-indiquée en cas de troubles psychiatriques sévères, de psychose, de troubles dissociatifs ou de dépendances lourdes.'
    );
    
    // ==========================================
    // APPEL À L'ACTION FINAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_cta_title',
        'isabel_hypno_section',
        'Titre de l\'appel à l\'action',
        'Titre encourageant pour finaliser la conversion.
Exemple : "Prêt(e) à évaluer vos compétences ?", "Découvrez le bilan de compétences"',
        'Prêt(e) à libérer votre potentiel ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hypno_cta_text',
        'isabel_hypno_section',
        'Texte de l\'appel à l\'action',
        'Message encourageant avant le bouton.
Vous pouvez utiliser **texte** en gras.',
        'Découvrez la puissance du bilan de compétences lors d\'une consultation. Ensemble, nous explorerons comment cette approche peut vous aider.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_hypno_cta_button',
        'isabel_hypno_section',
        'Texte du bouton',
        'Texte affiché sur le bouton d\'action final.
Exemple : "Découvrir le bilan de compétences", "Essayer une séance"',
        'Découvrir le bilan de compétences'
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION PAGE BILAN DE COMPÉTENCES :
 * 
 * Cette section vous permet de personnaliser entièrement votre page
 * de bilan de compétences pour démystifier cette approche et convertir.
 * 
 * 📍 STRUCTURE DE LA PAGE BILAN DE COMPÉTENCES :
 * 
 * 1. 📢 EN-TÊTE
 *    → Titre principal et sous-titre rassurant
 * 
 * 2. 📝 INTRODUCTION
 *    → Explication claire du bilan de compétences
 *    → Approche innovante et bénéfices
 * 
 * 3. 📋 BÉNÉFICES (2+2)
 *    → Accès à l'inconscient + Changements durables
 *    → Transformation profonde + Méthode naturelle
 * 
 * 4. 🔄 DÉROULEMENT D'UNE SÉANCE
 *    → Entretien préliminaire
 *    → Induction hypnotique
 *    → Travail thérapeutique
 *    → Retour et intégration
 * 
 * 5. 🎯 SECTIONS INFORMATIVES
 *    → Domaines d'application
 *    → Mythes et réalités
 *    → Votre formation
 *    → Contre-indications (transparence)
 * 
 * 6. 📞 APPEL À L'ACTION
 *    → Invitation à découvrir
 * 
 * 💡 CONSEILS SPÉCIFIQUES HYPNO :
 * 
 * ✅ DÉMYSTIFIANT : Expliquez clairement ce que c'est
 * ✅ RASSURANT : Mettez en avant le contrôle du client
 * ✅ ÉTHIQUE : Mentionnez les contre-indications
 * ✅ PROFESSIONNEL : Votre formation et certifications
 * ✅ CONCRET : Exemples d'applications pratiques
 * 
 * ⚠️ POINTS IMPORTANTS À TRAITER :
 * 
 * • Différence avec l'hypnose de spectacle
 * • Conscience maintenue pendant la séance
 * • Respect de la volonté du client
 * • Approche thérapeutique et bienveillante
 * • Transparence sur les limites
 * 
 * 🎯 MOTS-CLÉS IMPORTANTS :
 * - Hypnose thérapeutique
 * - État modifié de conscience
 * - Inconscient
 * - Blocages limitants
 * - Changements durables
 * - Accompagnement bienveillant
 * 
 * 📱 RESPONSIVE :
 * - Desktop : 2 colonnes pour les boxes
 * - Mobile : 1 colonne, tout empilé
 * 
 * 🔄 RÉSULTAT ATTENDU :
 * Une page qui démystifie le bilan de compétences,
 * rassure sur votre approche éthique et
 * donne envie d'essayer cette méthode.
 */