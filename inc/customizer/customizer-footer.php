<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 📄 PIED DE PAGE
 * Section finale avec informations de contact et présentation
 * Dernière impression laissée à vos visiteurs
 */

function isabel_customizer_footer($wp_customize) {
    
    // ==========================================
    // SECTION : PIED DE PAGE
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_footer_section',
        '📄 Pied de page',
        'Informations de contact et présentation finale de votre site',
        80 // Priorité 80 = après le CTA/formulaire
    );
    
    // ==========================================
    // EMAIL DE CONTACT
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_email',
        'isabel_footer_section',
        'Votre email de contact',
        'Adresse email affichée dans le pied de page.
Elle sera cliquable pour ouvrir le client mail.

📧 Où ça apparaît : Dans la section contact du footer, avec une icône email.',
        'contact@forma-coach.com',
        'email'
    );
    
    // ==========================================
    // NUMÉRO DE TÉLÉPHONE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_phone',
        'isabel_footer_section',
        'Votre numéro de téléphone',
        'Numéro de téléphone affiché dans le pied de page.
Format recommandé : +33 1 23 45 67 89 ou 01 23 45 67 89

📞 Où ça apparaît : Dans la section contact du footer, avec une icône téléphone.',
        '+33123456789',
        'tel'
    );
    
    // ==========================================
    // TEXTE DE PRÉSENTATION FOOTER
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_footer_about',
        'isabel_footer_section',
        'Votre présentation dans le footer',
        'Texte de présentation professionnelle dans le pied de page.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Accompagnement **professionnel** pour votre développement personnel
et professionnel avec une approche bienveillante et personnalisée.

💬 Où ça apparaît : Dans la colonne "À propos" du footer.',
        'Accompagnement professionnel pour votre développement personnel et professionnel.'
    );
    
    // ==========================================
    // TEXTE MISE EN AVANT FOOTER
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_footer_highlight',
        'isabel_footer_section',
        'Message mis en avant',
        'Message encourageant mis en valeur dans le footer.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : **Ensemble, réalisons vos objectifs**
Contactez-moi pour commencer votre transformation

🎯 Où ça apparaît : Encadré coloré en bas de la section "À propos".',
        '**Ensemble, réalisons vos objectifs**\nContactez-moi pour commencer votre transformation'
    );
    
    // ==========================================
    // ADRESSE PROFESSIONNELLE (optionnel)
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_address',
        'isabel_footer_section',
        'Adresse professionnelle (optionnel)',
        'Votre adresse professionnelle si vous recevez en cabinet.
Vous pouvez utiliser les retours à la ligne.

Exemple : 123 Rue de la Paix
75001 Paris

📍 Où ça apparaît : Sous vos coordonnées, avec une icône lieu.',
        ''
    );
    
    // ==========================================
    // HORAIRES DE CONSULTATION (optionnel)
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_hours',
        'isabel_footer_section',
        'Horaires de consultation (optionnel)',
        'Vos horaires de disponibilité pour rassurer vos prospects.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Du **lundi au vendredi** : 9h-18h
**Samedi** : Sur rendez-vous

🕒 Où ça apparaît : Dans la section contact, avec une icône horloge.',
        ''
    );
    
    // ==========================================
    // LIENS RÉSEAUX SOCIAUX
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_linkedin_url',
        'isabel_footer_section',
        'Lien LinkedIn (optionnel)',
        'URL de votre profil LinkedIn professionnel.
Exemple : https://linkedin.com/in/votre-profil

🔗 Où ça apparaît : Icône LinkedIn cliquable dans le footer.',
        '',
        'url'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_facebook_url',
        'isabel_footer_section',
        'Lien Facebook (optionnel)',
        'URL de votre page Facebook professionnelle.
Exemple : https://facebook.com/votre-page

🔗 Où ça apparaît : Icône Facebook cliquable dans le footer.',
        '',
        'url'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_instagram_url',
        'isabel_footer_section',
        'Lien Instagram (optionnel)',
        'URL de votre compte Instagram professionnel.
Exemple : https://instagram.com/votre-compte

🔗 Où ça apparaît : Icône Instagram cliquable dans le footer.',
        '',
        'url'
    );
    
    // ==========================================
    // MENTIONS LÉGALES ET LIENS
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_mentions_url',
        'isabel_footer_section',
        'Lien mentions légales (optionnel)',
        'URL vers votre page de mentions légales.
Exemple : /mentions-legales

⚖️ Où ça apparaît : Lien cliquable dans le bas du footer.',
        '',
        'url'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_confidentialite_url',
        'isabel_footer_section',
        'Lien confidentialité (optionnel)',
        'URL vers votre page de politique de confidentialité.
Exemple : /confidentialite

🔒 Où ça apparaît : Lien cliquable dans le bas du footer.',
        '',
        'url'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_cgv_url',
        'isabel_footer_section',
        'Lien CGV (optionnel)',
        'URL vers vos conditions générales de vente.
Exemple : /cgv

📋 Où ça apparaît : Lien cliquable dans le bas du footer.',
        '',
        'url'
    );
    
    // ==========================================
    // NUMÉRO SIRET (optionnel)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_siret',
        'isabel_footer_section',
        'Numéro SIRET (optionnel)',
        'Votre numéro SIRET pour les mentions légales.
Exemple : 123 456 789 00012

🏢 Où ça apparaît : En petit dans le copyright du footer.',
        ''
    );
    
    // ==========================================
    // STYLE DU FOOTER
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_footer_style',
        'isabel_footer_section',
        'Style du pied de page',
        array(
            'modern' => 'Moderne (colonnes flexibles)',
            'classic' => 'Classique (3 colonnes)',
            'minimal' => 'Minimal (centré)',
            'contact_focused' => 'Focus contact (contact mis en avant)',
        ),
        'Style d\'affichage de votre pied de page.
Moderne = Recommandé pour un site professionnel.',
        'modern'
    );
    
    // ==========================================
    // COULEUR DU FOOTER
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_footer_bg_color',
        'isabel_footer_section',
        'Couleur de fond du footer',
        '#ffffff'
    );
    
    isabel_add_color_control(
        $wp_customize,
        'isabel_footer_text_color',
        'isabel_footer_section',
        'Couleur du texte du footer',
        '#6b5b73'
    );
    
    // ==========================================
    // BADGE PROFESSIONNEL FOOTER
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_footer_badge',
        'isabel_footer_section',
        'Badge professionnel (optionnel)',
        'Petit badge professionnel en bas du footer.
Exemple : "Coach Professionnelle Certifiée", "Organisme de formation agréé"

✨ Où ça apparaît : Badge décoratif en bas du footer.',
        'Coach Professionnelle Certifiée'
    );
    
    // ==========================================
    // AFFICHAGE DU BADGE
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_footer_badge_enable',
        'isabel_footer_section',
        'Afficher le badge professionnel',
        'Cochez pour afficher le badge en bas du footer.
Renforce votre crédibilité professionnelle.',
        true
    );
    
    // ==========================================
    // COPYRIGHT PERSONNALISÉ
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_copyright_text',
        'isabel_footer_section',
        'Texte de copyright personnalisé (optionnel)',
        'Remplace le copyright automatique par votre texte.
Laissez vide pour le copyright automatique avec votre nom.

© Où ça apparaît : Ligne de copyright en bas du footer.',
        ''
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION PIED DE PAGE :
 * 
 * Le footer est la dernière impression que vous laissez à vos visiteurs.
 * Il doit être informatif, professionnel et inciter à la prise de contact.
 * 
 * 📍 STRUCTURE DU FOOTER :
 * 
 * 1. 👤 COLONNE CONTACT
 *    → Votre nom et spécialité
 *    → Email et téléphone cliquables
 *    → Adresse (si cabinet physique)
 *    → Horaires de consultation
 * 
 * 2. 🎯 COLONNE SERVICES
 *    → Liste de vos 4 services
 *    → Liens vers les pages détaillées
 *    → Bouton d'action rapide
 * 
 * 3. 📋 COLONNE À PROPOS
 *    → Votre présentation courte
 *    → Vos certifications/garanties
 *    → Message encourageant en valeur
 * 
 * 4. 🔗 BAS DE FOOTER
 *    → Copyright et mentions légales
 *    → Liens obligatoires (RGPD)
 *    → Badge professionnel
 * 
 * 💡 CONSEILS POUR UN FOOTER EFFICACE :
 * 
 * ✅ CONTACT VISIBLE : Email et téléphone bien mis en avant
 * ✅ LIENS UTILES : Accès rapide aux services principaux
 * ✅ RÉASSURANCE : Certifications et professionnalisme
 * ✅ APPEL FINAL : Message encourageant la prise de contact
 * ✅ LÉGALITÉ : Mentions obligatoires présentes
 * 
 * 🔧 ÉLÉMENTS TECHNIQUES :
 * 
 * • Email et téléphone automatiquement cliquables
 * • Liens réseaux sociaux avec icônes
 * • Copyright automatique avec année courante
 * • Responsive sur tous les appareils
 * • SEO optimisé pour les coordonnées
 * 
 * 📱 AFFICHAGE RESPONSIVE :
 * - Desktop : 3-4 colonnes côte à côte
 * - Tablette : 2 colonnes + footer bas
 * - Mobile : 1 colonne, tout empilé
 * 
 * ⚖️ CONFORMITÉ LÉGALE :
 * 
 * • Mentions légales (obligatoire)
 * • Politique de confidentialité (RGPD)
 * • CGV si vente en ligne
 * • SIRET si société
 * 
 * 🎯 OBJECTIFS DU FOOTER :
 * 
 * 1. Faciliter la prise de contact
 * 2. Renforcer la crédibilité
 * 3. Respecter les obligations légales
 * 4. Garder les visiteurs sur le site
 * 5. Optimiser le référencement local
 * 
 * 💼 FOOTER PROFESSIONNEL VS PERSONNEL :
 * 
 * PROFESSIONNEL (recommandé) :
 * • Toutes les informations complètes
 * • Liens vers mentions légales
 * • Badge de certification
 * • Horaires et adresse si applicable
 * 
 * PERSONNEL (plus simple) :
 * • Email et téléphone uniquement
 * • Présentation courte
 * • Pas d'adresse physique
 * • Style minimal
 * 
 * 🔄 MAINTENANCE :
 * - Vérifiez régulièrement que l'email fonctionne
 * - Mettez à jour vos horaires si nécessaire
 * - Ajoutez vos nouveaux réseaux sociaux
 * - Actualisez votre présentation au besoin
 */