# Energies Renouvelables Pro (thème WordPress)

Thème orienté **interface graphique professionnelle** pour un site solaire avec WooCommerce déjà en place.

## Manuel de configuration (FR/EN)

### 1) Utilité de chaque fichier du thème

- `style.css`  
  Déclare le thème (nom, version, auteur) et contient tous les styles visuels (header, menu, hero, boutons, cartes, responsive).  
- `functions.php`  
  Cœur fonctionnel du thème : enregistrement des menus, chargement CSS/JS, options dans le Customizer, CPT `erp_product`, métadonnées produit, shortcodes configurateur/sélecteur de langue, helper URL du configurateur.  
- `header.php`  
  En-tête global : logo, titre du site, menu principal, switch de langue (shortcode), bouton “Demander un devis”.  
- `footer.php`  
  Pied de page global : copyright + menu footer.  
- `front-page.php`  
  Page d’accueil : hero, bloc “Démarrage rapide”, sections produits et intégration WooCommerce.  
- `woocommerce.php`  
  Gabarit WooCommerce global (boutique, catégories, etc.).  
- `archive-erp_product.php`  
  Liste des produits du CPT `erp_product`.  
- `single-erp_product.php`  
  Fiche détail d’un produit CPT `erp_product`.  
- `template-parts/content-product.php`  
  Carte d’un produit (réutilisée dans les boucles).  
- `page.php`  
  Gabarit des pages WordPress standard.  
- `index.php`  
  Fallback général WordPress quand aucun template plus spécifique n’existe.  
- `assets/js/main.js`  
  JS du thème (comportements front).  

### 2) Où modifier les textes

#### Textes de la page d’accueil
- Aller dans `front-page.php` pour modifier les textes hero, “Démarrage rapide”, “Vos univers produits”, etc.

#### Textes globaux (header/footer)
- Header : `header.php`
- Footer : `footer.php`

#### Textes WooCommerce / CPT
- Archive CPT : `archive-erp_product.php`
- Fiche CPT : `single-erp_product.php`
- Carte produit : `template-parts/content-product.php`

#### Textes admin / options / labels
- Dans `functions.php` (labels du Customizer, CPT, métaboxes…).

### 3) Activer la version française et anglaise (méthode recommandée)

Le thème est prêt pour le multilingue :
- les chaînes sont écrites avec `__('...','erp-theme')` / `esc_html_e(...)`;
- le header peut afficher un sélecteur via shortcode (`erp_language_switcher_shortcode`).

#### Étapes simples (avec GTranslate déjà prévu par le thème)
1. Installer/activer le plugin de langue (ex: **GTranslate**).  
2. Aller dans **Apparence > Personnaliser > Options Energies Renouvelables Pro**.  
3. Vérifier **Shortcode sélecteur de langue** :
   - valeur par défaut : `[gtranslate]`
   - si vide, le switcher est masqué.
4. Vérifier que le switcher apparaît dans le header.

> Priorité actuelle du thème : si **Polylang** (ou WPML) est actif, le thème utilise d’abord ses liens natifs de langue (URLs réelles FR/EN, ex: `/fr/...` -> `/en/...`) plutôt qu’une simple traduction automatique de page.

#### Pour un vrai contenu FR/EN distinct (pages différentes selon langue)
Utiliser un plugin de traduction de contenu (Polylang, WPML, TranslatePress, etc.), puis :
1. Créer la version FR et EN de chaque page importante (Accueil, Boutique, Contact, Configurateur…).  
2. Créer un menu FR et un menu EN.
3. Associer chaque menu à la langue dans le plugin.
4. Vérifier le sélecteur de langue dans le header.

### 4) Menus (important)

Si vous avez déjà un menu avec toutes les pages :
1. Aller dans **Apparence > Menus**.  
2. Vérifier que ce menu est assigné à l’emplacement **Menu principal**.  
3. (Optionnel) Créer un menu dédié FR et un menu dédié EN si plugin multilingue.

### 5) Configurateur de devis

1. Aller dans **Apparence > Personnaliser > Options Energies Renouvelables Pro**.  
2. Régler **Shortcode configurateur devis** (ex: `[solithium-wizard]`).  
3. Tester le bouton “Configurer mon besoin” sur l’accueil.

## Manuel de configuration (FR/EN)

### 1) Utilité de chaque fichier du thème

- `style.css`  
  Déclare le thème (nom, version, auteur) et contient tous les styles visuels (header, menu, hero, boutons, cartes, responsive).  
- `functions.php`  
  Cœur fonctionnel du thème : enregistrement des menus, chargement CSS/JS, options dans le Customizer, CPT `erp_product`, métadonnées produit, shortcodes configurateur/sélecteur de langue, helper URL du configurateur.  
- `header.php`  
  En-tête global : logo, titre du site, menu principal, switch de langue (shortcode), bouton “Demander un devis”.  
- `footer.php`  
  Pied de page global : copyright + menu footer.  
- `front-page.php`  
  Page d’accueil : hero, bloc “Démarrage rapide”, sections produits et intégration WooCommerce.  
- `woocommerce.php`  
  Gabarit WooCommerce global (boutique, catégories, etc.).  
- `archive-erp_product.php`  
  Liste des produits du CPT `erp_product`.  
- `single-erp_product.php`  
  Fiche détail d’un produit CPT `erp_product`.  
- `template-parts/content-product.php`  
  Carte d’un produit (réutilisée dans les boucles).  
- `page.php`  
  Gabarit des pages WordPress standard.  
- `index.php`  
  Fallback général WordPress quand aucun template plus spécifique n’existe.  
- `assets/js/main.js`  
  JS du thème (comportements front).  

### 2) Où modifier les textes

#### Textes de la page d’accueil
- Aller dans `front-page.php` pour modifier les textes hero, “Démarrage rapide”, “Vos univers produits”, etc.

#### Textes globaux (header/footer)
- Header : `header.php`
- Footer : `footer.php`

#### Textes WooCommerce / CPT
- Archive CPT : `archive-erp_product.php`
- Fiche CPT : `single-erp_product.php`
- Carte produit : `template-parts/content-product.php`

#### Textes admin / options / labels
- Dans `functions.php` (labels du Customizer, CPT, métaboxes…).

### 3) Activer la version française et anglaise (méthode recommandée)

Le thème est prêt pour le multilingue :
- les chaînes sont écrites avec `__('...','erp-theme')` / `esc_html_e(...)`;
- le header peut afficher un sélecteur via shortcode (`erp_language_switcher_shortcode`).

#### Étapes simples (avec GTranslate déjà prévu par le thème)
1. Installer/activer le plugin de langue (ex: **GTranslate**).  
2. Aller dans **Apparence > Personnaliser > Options Energies Renouvelables Pro**.  
3. Vérifier **Shortcode sélecteur de langue** :
   - valeur par défaut : `[gtranslate]`
   - si vide, le switcher est masqué.
4. Vérifier que le switcher apparaît dans le header.

#### Pour un vrai contenu FR/EN distinct (pages différentes selon langue)
Utiliser un plugin de traduction de contenu (Polylang, WPML, TranslatePress, etc.), puis :
1. Créer la version FR et EN de chaque page importante (Accueil, Boutique, Contact, Configurateur…).  
2. Créer un menu FR et un menu EN.
3. Associer chaque menu à la langue dans le plugin.
4. Vérifier le sélecteur de langue dans le header.

### 4) Menus (important)

Si vous avez déjà un menu avec toutes les pages :
1. Aller dans **Apparence > Menus**.  
2. Vérifier que ce menu est assigné à l’emplacement **Menu principal**.  
3. (Optionnel) Créer un menu dédié FR et un menu dédié EN si plugin multilingue.

### 5) Configurateur de devis

1. Aller dans **Apparence > Personnaliser > Options Energies Renouvelables Pro**.  
2. Régler **Shortcode configurateur devis** (ex: `[solithium-wizard]`).  
3. Tester le bouton “Configurer mon besoin” sur l’accueil.

## Où sont les fichiers ?
Dans ce dépôt, le thème est ici :
- `wordpress-theme-energies/`

Fichiers clés :
- `style.css` (identité du thème + styles)
- `functions.php` (fonctions WordPress)
- `front-page.php` (page d’accueil)
- `woocommerce.php` (rendu WooCommerce)
- `header.php` / `footer.php` (structure globale)


## Important : où se trouve ce dossier exactement ?
- Le dossier `wordpress-theme-energies/` existe **dans l'espace de travail de cette session** (un environnement de développement distant), pas automatiquement sur ton ordinateur personnel.
- Chemin actuel côté session : `/workspace/python_apps/wordpress-theme-energies`.
- Donc : tant que tu ne le télécharges pas/exportes pas, il n'est pas encore dans ton disque local.

### Comment récupérer le dossier sur ton disque local
1. Depuis ton dépôt Git (recommandé) : fais un `git pull` sur ta machine locale.
2. Ou crée un zip du thème puis télécharge-le :
   ```bash
   cd /workspace/python_apps
   zip -r wordpress-theme-energies.zip wordpress-theme-energies
   ```
3. Ensuite importe ce zip dans WordPress via **Apparence > Thèmes > Ajouter > Téléverser un thème**.

## Comment l’importer dans WordPress (3 méthodes)

### Méthode A — depuis l’admin WordPress (la plus simple)
1. Compresse le dossier `wordpress-theme-energies` en `wordpress-theme-energies.zip`.
2. Dans WordPress : **Apparence > Thèmes > Ajouter > Téléverser un thème**.
3. Sélectionne `wordpress-theme-energies.zip`.
4. Clique **Installer**, puis **Activer**.

### Méthode B — via FTP/SFTP
1. Ouvre ton hébergement via FileZilla (ou équivalent).
2. Va dans `wp-content/themes/`.
3. Envoie le dossier `wordpress-theme-energies/`.
4. Dans WordPress : **Apparence > Thèmes**, puis active le thème.

### Méthode C — via cPanel / File Manager
1. Crée `wordpress-theme-energies.zip`.
2. Dans cPanel, ouvre **File Manager**.
3. Va dans `public_html/wp-content/themes/` (ou ton dossier racine WordPress).
4. Upload le zip puis **Extract**.
5. Active le thème dans **Apparence > Thèmes**.

## Réglages recommandés après activation
1. **Menus** : Apparence > Menus (principal + footer).
2. **Logo** : Apparence > Personnaliser > Identité du site.
3. **Shortcode devis** : Apparence > Personnaliser > Options Energies Renouvelables Pro.
   - Valeur par défaut : `[solithium-wizard]`
4. **WooCommerce** : vérifier la page Boutique et les fiches produits.

## Astuce: créer le fichier ZIP rapidement
Depuis un terminal dans un environnement où le dossier existe (ta machine locale, un serveur SSH, ou cet espace de travail), exécute :
```bash
cd /workspace/python_apps
zip -r wordpress-theme-energies.zip wordpress-theme-energies
```

> Important : ces commandes **ne se lancent pas dans l’interface web github.com**.
> Elles se lancent dans un terminal (local, SSH, ou CI) ayant accès aux fichiers.

## Vérification rapide
- Le thème apparaît dans **Apparence > Thèmes**.
- La page d’accueil affiche la section produits + devis.
- Les pages WooCommerce reprennent le style du thème.

## Compatibilité extension de devis (`solithium-wizard`)
Pour limiter les conflits CSS/JS :
- Les classes du thème ont été préfixées `erp-` (`erp-card`, `erp-btn`, `erp-section`, etc.).
- Les styles sont scoppés sous la classe `body.erp-theme`.

Si ton extension charge sa propre UI (boutons/cartes), elle ne doit plus être affectée par les classes génériques du thème.

## Dépannage : configurateur absent
1. Vérifie que l’extension `solithium-wizard` est **active**.
2. Vérifie le shortcode dans **Apparence > Personnaliser > Options Energies Renouvelables Pro**.
   - Valeur recommandée : `[solithium-wizard]`.
3. Vide les caches (plugin cache, cache serveur, CDN) puis recharge la page d’accueil.
4. Si tu es admin et que le shortcode est invalide, le thème affiche un message d’alerte dans la section devis.

## Dépannage : page Boutique supprimée (WooCommerce)

Si la page **Shop/Boutique** a été supprimée, WooCommerce perd sa page catalogue.

### Réactiver rapidement la page Boutique
1. Crée une nouvelle page WordPress (Pages > Ajouter), titre conseillé : **Boutique** (ou **Shop**).
2. Publie la page (pas besoin de shortcode produit dans le contenu).
3. Va dans **WooCommerce > Réglages > Produits > Général**.
4. Dans **Page boutique**, sélectionne la nouvelle page créée.
5. Enregistre.

### Vérifications si la page reste vide
1. Vérifie que des produits sont **publiés** (pas brouillon/privé).
2. Vérifie le statut catalogue des produits (visibles dans la boutique).
3. Vérifie qu’il n’y a pas de filtre de stock/catégorie qui masque tout.
4. Va dans **WooCommerce > Statut > Outils** puis :
   - régénère les tables/lookup produits,
   - vide les transients WooCommerce.
5. Va dans **Réglages > Permaliens** et clique **Enregistrer** (flush des permaliens).
6. Vide le cache (plugin + serveur + CDN) puis recharge.

### Cas multilingue (très fréquent)
Si Polylang/WPML/GTranslate est actif, il faut vérifier la page Boutique par langue :
1. Vérifie qu’il existe une page **Shop/Boutique** pour FR et EN (traduction liée, pas juste une copie non assignée).
2. Vérifie que WooCommerce pointe vers la bonne page boutique dans la langue courante.
3. Si WPML + WooCommerce Multilingual est actif, valide l’association des pages WooCommerce dans le module multilingue WooCommerce.
4. Teste en navigation privée avec URL directe de la boutique FR puis EN.

### Test de diagnostic rapide
Pour confirmer que les produits existent bien côté front :
1. Crée une page temporaire.
2. Ajoute le shortcode WooCommerce :
   `[products limit="8" columns="4" orderby="date" order="DESC"]`
3. Si les produits s’affichent ici mais pas sur Shop, le problème vient de l’assignation page boutique / langue et non des produits eux-mêmes.

### Option sûre : régénérer les pages WooCommerce officielles
Dans **WooCommerce > Statut > Outils**, utilise l’outil pour créer les pages par défaut WooCommerce (Shop, Cart, Checkout, My account) si nécessaire.

## Dépannage : page Boutique supprimée (WooCommerce)

Si la page **Shop/Boutique** a été supprimée, WooCommerce perd sa page catalogue.

### Réactiver rapidement la page Boutique
1. Crée une nouvelle page WordPress (Pages > Ajouter), titre conseillé : **Boutique** (ou **Shop**).
2. Publie la page (pas besoin de shortcode produit dans le contenu).
3. Va dans **WooCommerce > Réglages > Produits > Général**.
4. Dans **Page boutique**, sélectionne la nouvelle page créée.
5. Enregistre.

### Vérifications si la page reste vide
1. Vérifie que des produits sont **publiés** (pas brouillon/privé).
2. Vérifie le statut catalogue des produits (visibles dans la boutique).
3. Vérifie qu’il n’y a pas de filtre de stock/catégorie qui masque tout.
4. Va dans **WooCommerce > Statut > Outils** puis :
   - régénère les tables/lookup produits,
   - vide les transients WooCommerce.
5. Va dans **Réglages > Permaliens** et clique **Enregistrer** (flush des permaliens).
6. Vide le cache (plugin + serveur + CDN) puis recharge.

### Cas multilingue (très fréquent)
Si Polylang/WPML/GTranslate est actif, il faut vérifier la page Boutique par langue :
1. Vérifie qu’il existe une page **Shop/Boutique** pour FR et EN (traduction liée, pas juste une copie non assignée).
2. Vérifie que WooCommerce pointe vers la bonne page boutique dans la langue courante.
3. Si WPML + WooCommerce Multilingual est actif, valide l’association des pages WooCommerce dans le module multilingue WooCommerce.
4. Teste en navigation privée avec URL directe de la boutique FR puis EN.

### Test de diagnostic rapide
Pour confirmer que les produits existent bien côté front :
1. Crée une page temporaire.
2. Ajoute le shortcode WooCommerce :
   `[products limit="8" columns="4" orderby="date" order="DESC"]`
3. Si les produits s’affichent ici mais pas sur Shop, le problème vient de l’assignation page boutique / langue et non des produits eux-mêmes.

### Option sûre : régénérer les pages WooCommerce officielles
Dans **WooCommerce > Statut > Outils**, utilise l’outil pour créer les pages par défaut WooCommerce (Shop, Cart, Checkout, My account) si nécessaire.

## Message Codex sur les PR mises à jour hors Codex
Message :
> "Codex ne prend pas actuellement en charge la mise à jour des PR qui ont été mises à jour en dehors de Codex..."

### Pourquoi ce message apparaît ?
Ce message apparaît quand la PR a été modifiée en dehors de la session Codex (ex: commits/push depuis GitHub UI, un autre poste local, rebase/squash manuel, ou mise à jour par un autre outil).

### Que faire ?
1. Ouvre une **nouvelle PR** depuis la branche actuelle.
2. Ou recrée une branche propre, cherry-pick tes commits, puis ouvre une nouvelle PR.
3. Évite de modifier la même PR en parallèle depuis plusieurs outils si tu veux continuer via Codex.

## Workflow anti-problèmes Git (4 commandes)
Depuis ton **repo local** (pas sur github.com UI), exécute :

```bash
git fetch origin
git switch -c pr-propre-$(date +%Y%m%d-%H%M)
git push -u origin HEAD
gh pr create --fill
```

Si tu n’as pas `gh` installé, remplace la 4e commande par :
- ouvrir github.com > ton repo > bouton **Compare & pull request**.
