# 📁 TP PHP – Plateforme de Gestion Collaborative de Projets & Tâches

Ce projet est une application **back-end en PHP** structurée selon l’architecture **MVC**, avec un fort accent sur la **programmation orientée objet (POO)**, la sécurité via **PDO**, et la gestion des **utilisateurs, projets et tâches**. Le projet inclut également une **API RESTful** en bonus.

---

## ✅ Fonctionnalités réalisées

- ✅ Architecture MVC complète
- ✅ Connexion sécurisée à MySQL via PDO
- ✅ CRUD pour projets
- ✅ CRUD pour tâches liées à des projets
- ✅ Gestion des utilisateurs avec rôles (`admin`, `chef`, `collab`)
- ✅ Authentification sécurisée (`password_hash`)
- ✅ Dashboard utilisateur après login
- ✅ Contrôle d’accès selon les rôles (`Auth::checkAccess`)
- ✅ Vues d’erreur (`403`, `404`)
- ✅ API RESTful pour projets et tâches (`GET`, `POST`, `PUT`, `DELETE`)
- ❌ Swagger non implémenté (bonus non requis)

---

## 🧱 Structure du projet

```
gestion_projets/
├── app/
│   ├── Controllers/
│   │   ├── ProjectController.php
│   │   ├── TaskController.php
│   │   ├── UserController.php
│   │   └── Api/
│   │       ├── ProjectApiController.php
│   │       └── TaskApiController.php
│   ├── Models/
│   │   ├── Project.php
│   │   ├── Task.php
│   │   └── User.php
│   ├── Views/
│   │   ├── projects/
│   │   ├── tasks/
│   │   ├── users/
│   │   └── errors/
│   ├── Core/
│   │   ├── Model.php
│   │   ├── Controller.php
│   │   ├── Router.php
│   │   └── Auth.php
│   └── Interfaces/
│       └── CrudInterface.php
├── config/
│   └── config.php
├── public/
│   └── index.php
└── database/
    ├── projects.sql
    ├── tasks.sql
    └── users.sql
```

---

## 🚀 Installation & lancement

1. Cloner ou copier le projet dans votre serveur local (`htdocs` ou dossier de travail)
2. Créer la base de données `gestion_projets`
3. Importer les fichiers SQL depuis `/database/`
4. Configurer les identifiants dans `config/config.php`
5. Lancer le projet :

```bash
php -S localhost:8000 -t public
```

6. Ouvrir dans le navigateur : [http://localhost:8000](http://localhost:8000)

---

## 🔄 API REST – Endpoints disponibles

### Projets (`controller=ProjectApi`)
- `GET /?controller=ProjectApi`
- `GET /?controller=ProjectApi&id=1`
- `POST /?controller=ProjectApi`
- `PUT /?controller=ProjectApi&id=1`
- `DELETE /?controller=ProjectApi&id=1`

### Tâches (`controller=TaskApi`)
- `GET /?controller=TaskApi`
- `POST /?controller=TaskApi`
- `PUT /?controller=TaskApi&id=1`
- `DELETE /?controller=TaskApi&id=1`

Les requêtes `POST`, `PUT` et `DELETE` doivent être envoyées avec `Content-Type: application/json`

---

## 📚 Technologies utilisées

- PHP 8+
- MySQL / MariaDB
- HTML/CSS (vues simples)
- Composer (optionnel)
- cURL / Postman pour tester l’API

---

## 👤 Auteur

TP réalisé dans le cadre de l'apprentissage PHP MVC – Mise en situation professionnelle 2025  
**Auteur : [Ton Nom ici]**

---

## 📄 Licence

Projet librement utilisable dans un cadre pédagogique.