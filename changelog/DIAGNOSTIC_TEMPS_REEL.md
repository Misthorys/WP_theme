# 🔍 DIAGNOSTIC TEMPS RÉEL - ISABEL THEME

## ❌ **PROBLÈME IDENTIFIÉ**
Le customizer temps réel ne fonctionne pas - les modifications ne s'appliquent pas instantanément.

## 🔧 **ÉTAPES DE DIAGNOSTIC**

### **1. Vérifier la console du navigateur**

1. **Ouvrez la console** (F12 ou clic droit > Inspecter)
2. **Allez dans Apparence > Personnaliser**
3. **Vérifiez s'il y a des erreurs** en rouge
4. **Cherchez le message** : `✅ Isabel Customizer Live Preview chargé`

**Si vous ne voyez PAS ce message :**
- ❌ Le script JavaScript ne se charge pas
- ❌ Problème d'enregistrement du script

**Si vous voyez des erreurs :**
- ❌ Problème de syntaxe JavaScript
- ❌ Sélecteurs CSS manquants

### **2. Vérifier que le script se charge**

Dans la console, tapez :
```javascript
console.log('Test temps réel');
```

Si vous voyez le message, JavaScript fonctionne.

### **3. Vérifier les sélecteurs CSS**

Le problème le plus courant est que les **sélecteurs CSS** dans le JavaScript ne correspondent pas à votre HTML.

**Sélecteurs attendus dans votre HTML :**
- `.site-logo img` (logo)
- `.site-name` (nom du site)
- `.site-subtitle` (sous-titre)
- `.hero-badge` (badge)
- `.hero-name` (nom)
- `.hero-title` (titre principal)
- `.hero-description` (présentation)
- `.hero-cta .btn-cta` (bouton)
- `.services-section h2` (titre services)
- `.service-card:nth-child(1) h3` (titre service 1)
- `.service-card:nth-child(1) p` (description service 1)
- `.testimonials-section h2` (titre témoignages)
- `.cta-section h2` (titre CTA)
- `.footer-email` (email footer)
- `.page-header h1` (titres pages)
- `.page-header .subtitle` (sous-titres pages)

### **4. Test manuel dans la console**

Dans la console du customizer, testez :
```javascript
// Test de mise à jour d'un élément
jQuery('.hero-title').text('Test temps réel');

// Si ça fonctionne, le problème vient du JavaScript
// Si ça ne fonctionne pas, le sélecteur est incorrect
```

## 🎯 **SOLUTIONS POSSIBLES**

### **Solution 1: Sélecteurs CSS incorrects**
Si les sélecteurs ne correspondent pas à votre HTML :

1. **Vérifiez votre HTML** avec l'inspecteur
2. **Notez les vrais sélecteurs** utilisés
3. **Modifiez le fichier** `js/customizer-live.js`
4. **Remplacez les sélecteurs** par les bons

### **Solution 2: Script non chargé**
Si le script ne se charge pas :

1. **Vérifiez que le fichier** `js/customizer-live.js` existe
2. **Vérifiez les permissions** du fichier
3. **Vérifiez qu'il n'y a pas d'erreur PHP** dans `functions.php`

### **Solution 3: Conflit JavaScript**
Si il y a des conflits :

1. **Désactivez les plugins** un par un
2. **Testez avec un thème par défaut**
3. **Vérifiez les extensions** du navigateur

### **Solution 4: Cache**
Si le cache bloque :

1. **Videz le cache** du navigateur
2. **Désactivez les plugins de cache**
3. **Testez en navigation privée**

## 📋 **CHECKLIST DE VÉRIFICATION**

- [ ] Le fichier `js/customizer-live.js` existe
- [ ] Pas d'erreur dans la console
- [ ] Message "Isabel Customizer Live Preview chargé" visible
- [ ] Les sélecteurs CSS correspondent à votre HTML
- [ ] JavaScript est activé dans le navigateur
- [ ] Pas de plugin de cache actif
- [ ] Pas de conflit avec d'autres scripts

## 🚨 **INFORMATIONS À FOURNIR**

Si le problème persiste, fournissez :
1. **Screenshot de la console** avec les erreurs
2. **Screenshot de votre HTML** (inspecteur)
3. **Liste des plugins** activés
4. **Nom du navigateur** et version
5. **Message d'erreur** exact s'il y en a

## 🔧 **CORRECTION RAPIDE**

Si vous voulez corriger rapidement :

1. **Ouvrez l'inspecteur** sur votre site
2. **Notez les vrais sélecteurs** utilisés
3. **Modifiez le fichier** `js/customizer-live.js`
4. **Remplacez les sélecteurs** par les vôtres

**Exemple :**
Si votre titre principal a la classe `.main-title` au lieu de `.hero-title`, changez dans le JavaScript :
```javascript
// Avant
updateElement('.hero-title', newVal, true);

// Après
updateElement('.main-title', newVal, true);
```
