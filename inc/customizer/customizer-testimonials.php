<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 💬 TÉMOIGNAGES CLIENTS
 * Section pour présenter les avis de vos clients
 * Renforce votre crédibilité après vos services
 */

function isabel_customizer_testimonials($wp_customize) {
    
    // ==========================================
    // SECTION : TÉMOIGNAGES CLIENTS
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_testimonials_section',
        '💬 Témoignages clients',
        'Mettez en avant les avis de vos clients pour renforcer votre crédibilité',
        60 // Priorité 60 = après les services
    );
    
    // ==========================================
    // TITRE DE LA SECTION TÉMOIGNAGES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonials_title',
        'isabel_testimonials_section',
        'Titre de vos témoignages',
        'Le titre principal de votre section témoignages.
Exemple : "Ce que disent mes clients", "Leurs transformations", "Avis clients"

📢 Où ça apparaît : Grand titre au-dessus des témoignages.',
        'Ce que disent mes clients'
    );
    
    // ==========================================
    // SOUS-TITRE / DESCRIPTION DES TÉMOIGNAGES
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_testimonials_subtitle',
        'isabel_testimonials_section',
        'Description des témoignages',
        'Texte d\'introduction pour présenter vos témoignages.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Découvrez les témoignages de personnes qui ont **transformé leur vie**
grâce à un accompagnement personnalisé.

💬 Où ça apparaît : Sous le titre, avant les témoignages.',
        'Découvrez les témoignages de personnes qui ont transformé leur vie grâce à un accompagnement personnalisé.'
    );
    
    // ==========================================
    // NOMBRE DE TÉMOIGNAGES À AFFICHER
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_testimonials_count',
        'isabel_testimonials_section',
        'Nombre de témoignages à afficher',
        array(
            '3' => '3 témoignages (recommandé)',
            '2' => '2 témoignages',
            '4' => '4 témoignages',
            '6' => '6 témoignages',
            'all' => 'Tous les témoignages',
        ),
        'Combien de témoignages afficher sur la page d\'accueil.
3 témoignages = Équilibre parfait entre crédibilité et lisibilité.',
        '3'
    );
    
    // ==========================================
    // DISPOSITION DES TÉMOIGNAGES
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_testimonials_layout',
        'isabel_testimonials_section',
        'Disposition des témoignages',
        array(
            'grid' => 'Grille classique',
            'carousel' => 'Carrousel défilant',
            'masonry' => 'Mosaïque (hauteurs variables)',
            'single' => 'Un seul témoignage mis en avant',
        ),
        'Comment présenter vos témoignages.
Grille = Recommandée pour 3 témoignages.
Carrousel = Pour plus de 4 témoignages.',
        'grid'
    );
    
    // ==========================================
    // STYLE DES TÉMOIGNAGES
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_testimonials_style',
        'isabel_testimonials_section',
        'Style des témoignages',
        array(
            'cards' => 'Cartes avec bordures',
            'quotes' => 'Citations élégantes',
            'bubbles' => 'Bulles de conversation',
            'minimal' => 'Style minimal',
        ),
        'Style visuel de vos témoignages.
Cartes = Professionnel et lisible (recommandé).
Citations = Plus élégant et littéraire.',
        'cards'
    );
    
    // ==========================================
    // COULEUR DES TÉMOIGNAGES
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_testimonials_color',
        'isabel_testimonials_section',
        'Couleur d\'accentuation',
        '#e4a7f5'
    );
    
    // ==========================================
    // GESTION DES TÉMOIGNAGES PAR DÉFAUT
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_testimonials_show_default',
        'isabel_testimonials_section',
        'Afficher les témoignages d\'exemple',
        'Si vous n\'avez pas encore créé de témoignages, cochez pour afficher des exemples.
Décochez quand vous aurez vos vrais témoignages.',
        true
    );
    
    // ==========================================
    // TÉMOIGNAGES D'EXEMPLE MODIFIABLES
    // ==========================================
    
    // Témoignage exemple 1
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_testimonial_example_1_text',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 1 - Texte',
        'Témoignage d\'exemple que vous pouvez modifier.
Vous pouvez utiliser **texte** en gras.
Sera remplacé par vos vrais témoignages quand vous les créerez.',
        'Grâce à Isabel, j\'ai enfin trouvé ma voie professionnelle. Son approche **bienveillante** et ses outils concrets m\'ont permis de reprendre confiance en moi et d\'atteindre mes objectifs.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_1_name',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 1 - Nom',
        'Nom du client (peut être anonymisé).
Exemple : "Marie L.", "Thomas R.", "Léa M."',
        'Marie L.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_1_title',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 1 - Fonction',
        'Fonction ou profession du client.
Exemple : "Manager", "Entrepreneur", "Consultant"',
        'Manager'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_1_initials',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 1 - Initiales',
        'Initiales pour l\'avatar (2 lettres).
Exemple : "ML", "TR", "LM"',
        'ML'
    );
    
    // Témoignage exemple 2
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_testimonial_example_2_text',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 2 - Texte',
        'Deuxième témoignage d\'exemple modifiable.',
        'L\'accompagnement VAE avec Isabel a été un véritable **succès**. Elle m\'a guidé à chaque étape avec professionnalisme et empathie. Je recommande vivement ses services.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_2_name',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 2 - Nom',
        'Nom du deuxième client.',
        'Thomas R.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_2_title',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 2 - Fonction',
        'Fonction du deuxième client.',
        'Technicien Certifié'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_2_initials',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 2 - Initiales',
        'Initiales du deuxième client.',
        'TR'
    );
    
    // Témoignage exemple 3
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_testimonial_example_3_text',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 3 - Texte',
        'Troisième témoignage d\'exemple modifiable.',
        'Les séances de bilan de compétences m\'ont aidée à surmonter mes angoisses et à retrouver un **équilibre**. Merci Isabel pour cette transformation profonde et durable.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_3_name',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 3 - Nom',
        'Nom du troisième client.',
        'Léa M.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_3_title',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 3 - Fonction',
        'Fonction du troisième client.',
        'Entrepreneur'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonial_example_3_initials',
        'isabel_testimonials_section',
        'Témoignage d\'exemple 3 - Initiales',
        'Initiales du troisième client.',
        'LM'
    );
    
    // ==========================================
    // CALL TO ACTION APRÈS LES TÉMOIGNAGES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonials_cta_text',
        'isabel_testimonials_section',
        'Texte après les témoignages (optionnel)',
        'Message encourageant après les témoignages.
Exemple : "Vous aussi, transformez votre vie !", "Rejoignez mes clients satisfaits"',
        ''
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_testimonials_cta_button',
        'isabel_testimonials_section',
        'Bouton après les témoignages (optionnel)',
        'Texte du bouton d\'action après les témoignages.
Exemple : "Prendre rendez-vous", "Me contacter"',
        ''
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION TÉMOIGNAGES CLIENTS :
 * 
 * Cette section est CRUCIALE pour votre crédibilité ! Les témoignages
 * sont la preuve sociale la plus puissante pour convaincre vos prospects.
 * 
 * 📍 POURQUOI C'EST IMPORTANT :
 * 
 * ✅ CRÉDIBILITÉ : Prouve que vous obtenez des résultats
 * ✅ CONFIANCE : Rassure vos prospects hésitants
 * ✅ IDENTIFICATION : Vos visiteurs se reconnaissent dans les témoignages
 * ✅ TRANSFORMATION : Montre le "avant/après" de vos clients
 * 
 * 🎯 DEUX FAÇONS DE GÉRER VOS TÉMOIGNAGES :
 * 
 * 1. 📝 TÉMOIGNAGES D'EXEMPLE (Temporaire)
 *    → Modifiables directement dans le customizer
 *    → Parfait pour commencer rapidement
 *    → 3 exemples déjà configurés
 * 
 * 2. 💼 VRAIS TÉMOIGNAGES (Recommandé)
 *    → Dans "Témoignages" du menu WordPress
 *    → Gestion professionnelle et évolutive
 *    → Remplace automatiquement les exemples
 * 
 * 🔄 TRANSITION RECOMMANDÉE :
 * 
 * ÉTAPE 1 : Modifiez les témoignages d'exemple
 * ÉTAPE 2 : Créez vos vrais témoignages 
 * ÉTAPE 3 : Désactivez les exemples
 * 
 * 💡 CONSEILS POUR DE BONS TÉMOIGNAGES :
 * 
 * ✅ SPÉCIFIQUES : Résultats concrets, pas généralités
 * ✅ ÉMOTIONNELS : Sentiments et transformations
 * ✅ AUTHENTIQUES : Vrais noms (même partiels)
 * ✅ VARIÉS : Différents services et profils
 * ✅ COURTS : 2-3 phrases maximum
 * 
 * 📝 STRUCTURE IDÉALE D'UN TÉMOIGNAGE :
 * 
 * "Grâce à [Prénom], j'ai [résultat concret]. 
 * Son approche [qualité] m'a permis de [transformation].
 * Je recommande [service spécifique]."
 * 
 * 🎨 STYLES DISPONIBLES :
 * 
 * • CARTES : Professionnel, lisible (recommandé)
 * • CITATIONS : Élégant, littéraire  
 * • BULLES : Moderne, conversationnel
 * • MINIMAL : Sobre, épuré
 * 
 * 📱 AFFICHAGE RESPONSIVE :
 * - Desktop : 3 colonnes ou carrousel
 * - Mobile : 1 colonne, empilé
 * 
 * 🎯 IMPACT ATTENDU :
 * - Confiance renforcée (+40% de conversions)
 * - Crédibilité professionnelle établie
 * - Objections levées automatiquement
 * - Identification des prospects facilitée
 */