# Zoo Arcadia
Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960. Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs santés. 

Il y a également une section sécurisé reservé aux administrateurs pour se connecter ou ils pourront créer et faire des mises a jour ou supprimer les animaux, les habitats et aussi avoir uncontrole sur les avis clients. 

C'est une application développé avec Php 8.2

version en ligne : https://arcadia1986-b80281f570ec.herokuapp.com

Prérequis
Afin de pouvoir exécuter l'application sur votre poste en local, vous devez d'aborder installer les dépendances suivantes :

*Git & GitHub
*Php 8.1+
*Serveur XAMPP ou autre
*Un gestionnaire de base de base de données MySQL, PhpMyAdmin pour ma part

Installation

1. Git clone https://github.com/Gpuppy/arcadia1.git
2. Configurer XAMPP :
- Placez le dossier du projet dans le répertoire htdocs de XAMPP.
- Lancez Apache et MySQL via le panneau de contrôle XAMPP.
3.Configurer la base de données :
- Créez le fichier SQL dans phpMyAdmin pour créer les tables nécessaires :
- Accédez à http://localhost/phpmyadmin.
- Importez le fichier database.sql (si disponible dans le projet).
4. Créer et configurer le fichier .env dans l'environnement locale :
   DATABASE_URL=sql ‘mysql://root@127.0.0.1:3306/arcadia1’
5. Lancer l'application en local avec un : 'php -S localhost:8000'

Nom : Gaël Adam
Email : gael.adam@hotmail.com.com
