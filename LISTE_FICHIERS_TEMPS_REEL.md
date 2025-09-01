# 📋 LISTE FICHIERS POUR TESTER LE TEMPS RÉEL

## 🎯 **FICHIERS OBLIGATOIRES POUR LE TEMPS RÉEL**

### **📁 Fichiers principaux du thème :**
- `functions.php` ✅ (contient l'enregistrement du script)
- `js/customizer-live.js` ✅ (script temps réel)
- `inc/customizer/customizer-main.php` ✅ (système modulaire)
- `inc/customizer/customizer-header.php` ✅
- `inc/customizer/customizer-homepage.php` ✅
- `inc/customizer/customizer-services.php` ✅
- `inc/customizer/customizer-testimonials.php` ✅
- `inc/customizer/customizer-contact.php` ✅
- `inc/customizer/customizer-footer.php` ✅
- `inc/customizer/customizer-colors.php` ✅
- `inc/customizer/customizer-images.php` ✅
- `inc/customizer/customizer-qualiopi.php` ✅
- `inc/customizer/customizer-vae.php` ✅
- `inc/customizer/customizer-coaching.php` ✅
- `inc/customizer/customizer-consultation.php` ✅
- `inc/customizer/customizer-hypno.php` ✅

### **📁 Fichiers de pages :**
- `index.php` ✅
- `header.php` ✅
- `footer.php` ✅
- `page-accompagnement-vae.php` ✅
- `page-formations-professionnelles.php` ✅
- `page-coaching-professionnel-personnel.php` ✅
- `page-bilan-competences.php` ✅

### **📁 Fichiers de style :**
- `style.css` ✅

## 🚫 **FICHIERS À NE PAS METTRE SUR LE SERVEUR :**

### **📁 Documentation (déjà dans changelog/) :**
- `changelog/` (tout le dossier)
- `test-temps-reel.php`
- `LISTE_FICHIERS_TEMPS_REEL.md` (ce fichier)

## 🔧 **ÉTAPES DE TEST SUR LE SERVEUR :**

### **1. Upload des fichiers :**
```bash
# Uploader tous les fichiers listés ci-dessus
# Sauf ceux dans la section "À NE PAS METTRE"
```

### **2. Test du temps réel :**
1. **Allez sur votre site**
2. **Apparence > Personnaliser**
3. **Ouvrez la console** (F12)
4. **Cherchez le message** : `✅ Isabel Customizer Live Preview chargé`
5. **Modifiez un texte** dans le customizer
6. **Vérifiez si ça change en temps réel**

### **3. Si ça ne marche pas :**
1. **Vérifiez la console** pour les erreurs
2. **Notez les sélecteurs CSS** de votre HTML
3. **Comparez avec ceux dans** `js/customizer-live.js`

## 📊 **VÉRIFICATION RAPIDE :**

### **Dans la console du customizer, testez :**
```javascript
// Test 1: Vérifier que le script est chargé
console.log('Test temps réel');

// Test 2: Vérifier jQuery
jQuery('.hero-title').length;

// Test 3: Test manuel d'un élément
jQuery('.hero-title').text('Test manuel');
```

## 🎯 **RÉSULTATS ATTENDUS :**

- ✅ **Message "Isabel Customizer Live Preview chargé"** dans la console
- ✅ **Modifications instantanées** sans rafraîchir la page
- ✅ **Pas d'erreurs** en rouge dans la console

## 🚨 **SI PROBLÈME :**

1. **Screenshot de la console** avec les erreurs
2. **Screenshot de votre HTML** (inspecteur)
3. **Liste des sélecteurs CSS** utilisés sur votre site

## 📝 **NOTES IMPORTANTES :**

- Le temps réel fonctionne **uniquement dans le customizer**
- Les modifications sont **visibles instantanément** sans sauvegarder
- Le **cache du navigateur** peut bloquer les changements
- **Testez en navigation privée** si nécessaire
