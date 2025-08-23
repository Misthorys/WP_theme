# 🔍 DIAGNOSTIC SPÉCIFIQUE - PAGES DE SERVICE

## ❌ **PROBLÈME IDENTIFIÉ**
Les modifications du customizer ne s'appliquent pas sur les **pages de service** :
- `page-accompagnement-vae.php`
- `page-coaching-personnel.php`
- `page-consultation-decouverte.php`
- `page-hypnocoaching.php`

## 🔧 **ÉTAPES DE DIAGNOSTIC**

### **1. Test de debug en direct**

J'ai ajouté un code de debug temporaire dans `functions.php`. Maintenant :

1. **Allez sur une page de service** (par exemple la page VAE)
2. **Faites clic droit > Afficher le code source**
3. **Cherchez les commentaires HTML** commençant par `<!-- DEBUG`
4. **Vérifiez les valeurs** affichées

**Exemple de ce que vous devriez voir :**
```html
<!-- DEBUG VAE: isabel_vae_title = Votre titre modifié | isabel_vae_subtitle = Votre sous-titre modifié -->
```

### **2. Interprétation des résultats**

**Si vous voyez "NON TROUVÉ" :**
- ❌ Les données ne sont pas sauvegardées
- ❌ Problème dans le customizer

**Si vous voyez les valeurs par défaut :**
- ❌ Les données ne sont pas sauvegardées
- ❌ Problème dans le customizer

**Si vous voyez vos modifications :**
- ✅ Les données sont sauvegardées
- ❌ Problème dans l'affichage des pages

### **3. Test du customizer**

1. **Allez dans Apparence > Personnaliser**
2. **Trouvez la section de la page concernée** (ex: "📋 Page VAE")
3. **Modifiez un champ** (ex: titre de la page)
4. **Cliquez sur "Publier"**
5. **Vérifiez que le bouton devient gris**
6. **Rechargez la page de service**
7. **Vérifiez le code source pour le debug**

### **4. Vérification des modules**

Les pages de service utilisent ces modules :
- `inc/customizer/customizer-coaching.php`
- `inc/customizer/customizer-vae.php`
- `inc/customizer/customizer-hypno.php`
- `inc/customizer/customizer-consultation.php`

Vérifiez qu'ils existent et sont chargés.

## 🎯 **SOLUTIONS POSSIBLES**

### **Solution 1: Problème de sauvegarde**
Si le debug montre "NON TROUVÉ" :
- Vérifiez que vous cliquez bien sur "Publier"
- Vérifiez qu'il n'y a pas d'erreur JavaScript
- Essayez de vous reconnecter

### **Solution 2: Problème de cache**
Si les données sont sauvegardées mais pas affichées :
- Videz le cache du navigateur
- Désactivez les plugins de cache
- Testez en navigation privée

### **Solution 3: Problème de modules**
Si les modules ne se chargent pas :
- Vérifiez que les fichiers existent
- Vérifiez qu'il n'y a pas d'erreur PHP
- Rechargez le thème

### **Solution 4: Problème de noms d'options**
Si les noms ne correspondent pas :
- Vérifiez la correspondance entre customizer et templates
- Vérifiez les noms dans les modules

## 📋 **CHECKLIST DE VÉRIFICATION**

- [ ] Les sections de pages apparaissent dans le customizer
- [ ] Les champs sont modifiables
- [ ] Le bouton "Publier" fonctionne
- [ ] Le debug affiche les bonnes valeurs
- [ ] Les pages se rechargent correctement
- [ ] Les modifications apparaissent sur les pages

## 🚨 **INFORMATIONS À FOURNIR**

Si le problème persiste, fournissez :
1. **Le contenu du debug** (commentaires HTML)
2. **Screenshot du customizer** avec une modification
3. **Screenshot de la page** après modification
4. **Nom de la page** qui pose problème
5. **Valeur modifiée** et valeur affichée

## 🔧 **NETTOYAGE APRÈS DIAGNOSTIC**

Une fois le problème résolu, supprimez le code de debug de `functions.php` :

```php
// SUPPRIMER CETTE SECTION
// ========================================
// DEBUG TEMPORAIRE POUR LES PAGES DE SERVICE
// ========================================
// ... tout le code de debug ...
```
