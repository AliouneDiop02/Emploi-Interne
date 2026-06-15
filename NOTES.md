# Notes techniques — Emploi Interne

## Gestion du téléversement de CV

### Stockage des fichiers

Les CV sont stockés sur le disque `local` de Laravel (`storage/app/private/cvs/`).

Ce choix est intentionnel — contrairement au disque `public`, les fichiers sur le disque
`local` ne sont pas accessibles directement via une URL. Un visiteur ne peut pas deviner
l'adresse d'un CV et le télécharger sans passer par le contrôleur. Les CV contiennent
des données personnelles sensibles (nom, adresse, expériences) — ils doivent être protégés.

### Nom de fichier généré automatiquement

Lors du téléversement, Laravel génère un nom aléatoire unique pour le fichier :

```php
$chemin = $fichier->store('cvs', 'local');
// Résultat : cvs/3f8a2b1c4d5e6f7a8b9c.pdf
```

Le nom original du candidat (`CV-Marie-Tremblay.pdf`) est conservé séparément dans
la colonne `cv_nom_original` de la base de données. Il est utilisé uniquement pour
l'affichage et le téléchargement par l'admin.

Cette séparation évite deux problèmes :
- Les conflits de noms si deux candidats ont le même nom de fichier
- Les noms malveillants contenant des caractères spéciaux ou des chemins relatifs

### Informations stockées en base de données

Pour chaque CV téléversé, quatre colonnes sont enregistrées :

- `cv_chemin` — chemin interne du fichier sur le serveur
- `cv_nom_original` — nom original pour l'affichage à l'admin
- `cv_type_mime` — type MIME vérifié par PHP
- `cv_taille` — taille en octets pour référence

### Validation double couche

La validation du CV se fait en deux étapes indépendantes :

**Côté client (JavaScript)** — Vérification immédiate avant l'envoi :
- Extension du fichier (pdf, doc, docx, txt, rtf, odt)
- Taille maximale de 2 Mo
- Le bouton "Envoyer" est désactivé si le fichier est invalide

**Côté serveur (Laravel)** — Validation définitive :
- `file` — vérifie que c'est bien un fichier téléversé
- `max:2048` — taille maximale 2048 Ko (2 Mo)
- `extensions:pdf,doc,docx,txt,rtf,odt` — extensions autorisées

La validation JavaScript améliore l'expérience utilisateur mais ne remplace jamais
la validation serveur — un utilisateur malveillant peut contourner le JavaScript.

### Téléchargement sécurisé par l'admin

L'admin télécharge un CV via la route `/admin/candidatures/{id}/cv` qui passe
par le `CvController`. Ce contrôleur :

1. Vérifie que le fichier existe physiquement sur le disque
2. Envoie le fichier avec le nom original via `response()->download()`

```php
return response()->download(
    storage_path('app/private/' . $candidature->cv_chemin),
    $candidature->cv_nom_original
);
```

Aucune URL directe ne pointe vers les fichiers — la seule façon d'accéder
à un CV est via ce contrôleur.

## Composants Blade

Les composants Blade ont été créés sans classe PHP (`--view`) car ils ne
contiennent pas de logique complexe. Toute la logique conditionnelle
(couleurs des badges, variantes des boutons) est gérée directement dans
les fichiers Blade avec `@php` et `match()`.

## Palette de couleurs

La palette a été choisie sur le site **coolors.co** dans la section
"Popular 3 colors palettes" : https://coolors.co/palettes/popular/3%20colors

- `--color-bleu-pale` — fond de page
- `--color-bleu-clair` — fond navigation et cartes
- `--color-bleu-moyen` — bordures et états hover
- `--color-bleu-vif` — boutons et accents
- `--color-bleu-doux` — texte secondaire
- `--color-bleu-texte` — texte principal

Cette approche permet d'utiliser des classes sémantiques (`bg-bleu-clair`)
plutôt que des valeurs hexadécimales répétées partout dans le code.
