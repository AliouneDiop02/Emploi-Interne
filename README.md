# Emploi Interne

Site interne d'offres d'emploi développé avec Laravel, Eloquent, Blade et Tailwind CSS.

## Aperçu

- Consultation des offres d'emploi actives
- Soumission de candidatures avec téléversement de CV sécurisé
- Interface d'administration pour gérer les offres et consulter les candidatures
- Design responsive avec palette de couleurs personnalisée

## Technologies utilisées

- **PHP 8.2** / **Laravel 12**
- **SQLite** — base de données locale
- **Eloquent ORM** — modèles et relations
- **Blade** — composants réutilisables
- **Tailwind CSS v4** — design utilitaire
- **Vite** — compilation des assets

## Installation

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js 20 ou supérieur (26 utilisée)
- npm

### Étapes

**1. Cloner le dépôt**
```bash
git clone https://github.com/AliouneDiop02/emploi-interne.git
cd emploi-interne
```

**2. Installer les dépendances PHP**
```bash
composer install
```

**3. Installer les dépendances JavaScript**
```bash
npm install
```

**4. Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

**5. Configurer la base de données**

Dans le fichier `.env`, assurez-vous d'avoir :
```env
DB_CONNECTION=sqlite
```

Créer le fichier SQLite :
```bash
# Mac / Linux
touch database/database.sqlite

# Windows
type nul > database\database.sqlite
```

**6. Exécuter les migrations et le seeder**
```bash
php artisan migrate:fresh --seed
```

**7. Compiler les assets**
```bash
npm run build

**8. Lancer le serveur**
```bash
php artisan serve
```

Accédez à l'application sur **http://localhost:8000**

## Structure des URLs

**Public**
- `GET /emplois` — Liste des offres actives
- `GET /emplois/{id}` — Détail d'une offre
- `GET /emplois/{id}/postuler` — Formulaire de candidature
- `POST /emplois/{id}/postuler` — Soumettre une candidature

**Administration**
- `GET /admin/offres` — Gestion des offres
- `GET /admin/offres/create` — Créer une offre
- `POST /admin/offres` — Enregistrer une nouvelle offre
- `GET /admin/offres/{id}/edit` — Modifier une offre
- `PUT /admin/offres/{id}` — Sauvegarder les modifications
- `DELETE /admin/offres/{id}` — Supprimer une offre
- `GET /admin/offres/{id}/candidatures` — Candidatures d'une offre
- `GET /admin/candidatures/{id}/cv` — Télécharger un CV


## Données de démonstration

Le seeder crée automatiquement :
- **6 offres d'emploi** (5 actives, 1 inactive)
- **3 candidatures** de démonstration

## Développement

Pour lancer en mode développement avec rechargement automatique :

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
