
# 📁 TP - Plateforme de Gestion Collaborative de Projets & Tâches

Ce projet est une application **back-end en PHP** développée dans le cadre d’un TP visant à concevoir un système de gestion collaborative de projets et de tâches. Il utilise les bonnes pratiques de développement web telles que **l’architecture MVC**, **la programmation orientée objet (POO)**, **PDO pour l’accès à la base de données**, et des mécanismes de **sécurité** robustes (authentification, validation, rôles).

---

## 🧱 Architecture Générale (MVC)

```
gestion_projets/
├── app/
│   ├── Core/               → Classes de base (Model, Controller, Router)
│   ├── Controllers/        → Contrôleurs métiers (Project, Task, User)
│   ├── Models/             → Modèles métiers (Project, Task, User)
│   ├── Views/              → Templates HTML (list.php, form.php...)
│   └── Interfaces/         → Interface CRUD commune
├── config/                 → Configuration de la BDD
├── public/                 → Front Controller (index.php)
└── vendor/ (optionnel)     → Composer (si utilisé)
```

---

## 🎯 Objectifs pédagogiques

- Comprendre et appliquer l'architecture MVC
- Mettre en œuvre l’héritage, le polymorphisme et les interfaces en PHP
- Utiliser PDO pour se connecter à une base de données de façon sécurisée
- Créer un système d’authentification avec rôles (RBAC)
- Organiser un projet PHP de manière modulaire et évolutive
- (Bonus) Développer une API RESTful

---

## ✅ Méthode de Résolution (classique et structurée)

### Étape 1 : Initialisation & Configuration du Projet

- [x] Création du fichier `config/config.php` avec les infos BDD
- [x] Mise en place de la classe `Model.php` (connexion PDO centralisée)
- [x] Création de `public/index.php` (Front Controller de base)
- [x] Arborescence initiale mise en place

### Étape 2 : Développement du noyau (Core)

- [x] Implémentation de la classe `Controller.php` pour charger les vues
- [ ] Création du routeur `Router.php`
- [ ] Création de l’interface `CrudInterface.php` (méthodes CRUD)

### Étape 3 : Module Projets

- [ ] Modèle `Project.php` implémentant `CrudInterface`
- [ ] Contrôleur `ProjectController.php`
- [ ] Vues associées : `list.php`, `detail.php`, `form.php`

### Étape 4 : Module Tâches

- [ ] Modèle `Task.php` + Contrôleur + Vues
- [ ] Statut (à faire, en cours, terminé), commentaires, fichiers, tags

### Étape 5 : Module Utilisateurs

- [ ] `User.php` + `UserController.php`
- [ ] Authentification (inscription, login, logout)
- [ ] Rôles (Admin, Chef de Projet, Collaborateur)

### Étape 6 : Sécurité

- [ ] Hash des mots de passe (`password_hash`)
- [ ] Protection des routes selon rôle
- [ ] Validation des formulaires
- [ ] Requêtes PDO préparées

### Étape 7 : Dashboard & Notifications

- [ ] Vue tableau de bord utilisateur
- [ ] Notifications (email et/ou internes)

### Étape 8 (Bonus) : API RESTful

- [ ] Création d’API endpoints (`GET`, `POST`, `PUT`, `DELETE`)
- [ ] Documentation Swagger ou équivalent

---

## ⚙️ Prérequis techniques

- PHP 8+
- MySQL / MariaDB
- Serveur local (XAMPP, WAMP, MAMP ou `php -S`)
- Navigateur moderne
- Composer (optionnel)

---

## 🚀 Lancer le projet

1. Cloner le repo
2. Créer la base de données `gestion_projets`
3. Configurer `config/config.php`
4. Lancer le serveur :
```bash
php -S localhost:8000 -t public/
```
5. Ouvrir dans le navigateur : [http://localhost:8000](http://localhost:8000)

---

## 🧑‍💻 Auteur

> TP réalisé dans le cadre de l’apprentissage PHP orienté objet (POO + MVC) — pour une architecture claire, sécurisée et maintenable.

---

## 🔐 Licence

Ce projet est libre d’usage dans un contexte pédagogique.
