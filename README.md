# vcarine-VINAGRE_CARINE_1_repository_git_072022

Fonctionnalités
Front office accessible à tous les utilisateurs
Back office accessible uniquement aux administrateurs
Réception
Le site internet comprend les pages suivantes :

Page d'accueil : courte présentation de moi-même en tant que développeur web (nom, photo, description, CV PDF, réseaux sociaux sur lesquels vous pouvez me joindre) ainsi qu'un formulaire de contact.
Blogposts : affichez tous les articles triés par les plus récents. Chaque carte postale de blog doit inclure un titre, mis à jour à la date, un paragraphe principal et un lien vers l'article.
CRUD blogpost : articles de blog individuels / pages d'articles avec titre, titre, contenu, auteur, mis à jour à la date, commentaires et publication d'un formulaire de commentaire
Formulaire d'inscription / de connexion Une barre de navigation et un pied de page doivent être présents sur toutes les pages. Le pied de page contient un lien vers le back office Admin.
Back-office (interface d'administration)
Seuls des comptes spécifiques avec un rôle d'administrateur peuvent accéder au back office
Spécifications
PHP 8

Le site Web doit être réactif et sécurisé.
Évaluations de la qualité du code effectuées via Codacy.

Diagrammes UML requis
diagrammes de cas d'utilisation
diagramme de classe
diagrammes de séquence
Configurez votre environnement
Si vous souhaitez installer ce projet sur votre ordinateur,
vous devrez d'abord cloner le référentiel de ce projet à l'aide de Git.

A la racine de votre projet, vous devez créer un fichier .env (même niveau que .env.example)
dans lequel vous devez configurer les valeurs appropriées pour que votre blog fonctionne :

self::$pdo = new PDO("mysql:host=localhost;dbname=blog_php;charset=utf8", "blog_php", "Cz4U2GpWe48b");

Installer sur le serveur Web local
Si vous ne parvenez pas à utiliser Docker, vous pouvez installer ce projet sur votre WAMP, Laragon, MAMP ou un autre serveur Web local. Pour ce faire, vous devrez d'abord vous assurer que les conditions suivantes sont remplies.

Conditions
Vous devez avoir composer sur votre ordinateur
Votre serveur a besoin de PHP version 8.0
MySQL ou MariaDB
Apache ou Nginx
Les extensions PHP suivantes doivent être installées et activées :

pdo_mysql
mysqli
Installer les dépendances
Avant d'exécuter le projet, vous devez exécuter les commandes suivantes afin d'installer les dépendances appropriées.

composer install

Importer des fichiers de base de données
Pour générer une base de données vide, vous devez importer le fichier blog_empty.sql dans votre SGBD.
Vous devrez peut-être modifier le nom de la base de données par défaut (blog) dans le fichier SQL pour qu'il corresponde au nom de la base de données allouée fourni par votre hébergeur.

