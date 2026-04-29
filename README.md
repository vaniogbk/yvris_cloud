# Yvris Business Cloud

Plateforme ERP cloud multi-modules pour entreprises africaines — PHP 8.2 · MySQL · TailwindCSS.

---

## Installation locale (XAMPP)

### 1. Prérequis
- XAMPP (Apache + MySQL + PHP 8.1+)
- `mod_rewrite` activé dans Apache

### 2. Base de données

```sql
-- Dans phpMyAdmin ou MySQL CLI :
SOURCE /chemin/vers/database/schema.sql
SOURCE /chemin/vers/database/seed.sql
```

### 3. Configuration

Copier `.env.example` → `.env` et adapter les valeurs :

```
APP_URL=http://localhost/Yvris.bj/public
DB_HOST=localhost
DB_NAME=yvris_cloud
DB_USER=root
DB_PASS=
```

### 4. Lancer

Ouvrir : `http://localhost/Yvris.bj/public/`

---

## Comptes de démonstration

| Rôle      | Email                  | Mot de passe |
|-----------|------------------------|--------------|
| Admin     | admin@yvris.bj         | password     |
| Revendeur | revendeur1@yvris.bj    | password     |
| Revendeur | revendeur2@yvris.bj    | password     |
| Revendeur | revendeur3@yvris.bj    | password     |
| Client    | client@yvris.bj        | password     |

---

## Architecture MVC

```
Yvris.bj/
├── .github/workflows/ci.yml     # CI/CD GitHub Actions
├── app/
│   ├── Controllers/              # Logique métier
│   │   ├── HomeController.php
│   │   ├── AuthController.php
│   │   ├── UserController.php
│   │   ├── AdminController.php
│   │   └── ResellerController.php
│   ├── Models/                   # Couche BDD (PDO)
│   │   ├── User.php
│   │   ├── Subscription.php
│   │   ├── Module.php
│   │   ├── Invoice.php
│   │   └── Reseller.php
│   └── Views/                    # Templates PHP
│       ├── layouts/              # main.php, admin.php
│       ├── home/index.php        # Page d'accueil + pricing
│       ├── auth/                 # login.php, register.php
│       ├── user/                 # dashboard, profile, invoices
│       ├── admin/                # dashboard, users, subscriptions, modules, invoices
│       └── reseller/             # dashboard, clients, sales
├── config/
│   ├── app.php                   # Constantes app
│   └── database.php              # Constantes BDD
├── core/
│   ├── Database.php              # Singleton PDO
│   ├── Session.php               # Sessions + CSRF
│   ├── Router.php                # Routeur HTTP
│   ├── Controller.php            # Base controller
│   └── Model.php                 # Base model
├── database/
│   ├── schema.sql                # Schéma MySQL
│   └── seed.sql                  # Données initiales
├── public/
│   ├── index.php                 # Point d'entrée unique
│   └── .htaccess                 # URL rewriting
├── vercel.json                   # Config Vercel
├── netlify.toml                  # Config Netlify
└── .github/workflows/ci.yml      # Pipeline CI/CD
```

---

## Déploiement

### GitHub Actions (CI/CD automatique)

Le pipeline `.github/workflows/ci.yml` s'exécute sur chaque push :
1. **Lint** — Vérification syntaxe PHP (tous les fichiers)
2. **Security** — Détection de secrets en dur
3. **Deploy** — Déploiement SSH vers serveur de production (si secrets configurés)

**Secrets GitHub à configurer** (Settings → Secrets → Actions) :
```
SSH_HOST        → IP ou domaine de votre serveur
SSH_USER        → Utilisateur SSH
SSH_PRIVATE_KEY → Clé privée SSH (PEM)
DEPLOY_PATH     → Chemin de déploiement (/var/www/html/yvris)
```

### Vercel

```bash
npm i -g vercel
vercel --prod
```

Configurer les variables d'environnement dans le dashboard Vercel :
`DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`, `APP_URL`

### Netlify

Connecter le dépôt GitHub dans Netlify → déploiement automatique.

---

## Sécurité

- Mots de passe : **bcrypt** (cost 12)
- Protection **CSRF** sur tous les formulaires POST
- Sessions PHP : `httponly`, `SameSite=Strict`
- Validation et **échappement** de toutes les entrées utilisateur
- Requêtes préparées **PDO** (protection SQL injection)
- Gestion des rôles : `admin` / `revendeur` / `client`

---

## Modules disponibles

| Module       | Description                                        |
|--------------|----------------------------------------------------|
| CRM          | Contacts, opportunités, pipeline commercial        |
| Facturation  | Devis, factures, avoirs, suivi paiements           |
| RH           | Congés, paie, contrats, effectifs                  |
| Comptabilité | Balance, bilan, compte de résultat                 |
| Stock        | Entrepôts, mouvements, inventaires                 |
| Production   | Ordres de fabrication, suivi qualité               |
