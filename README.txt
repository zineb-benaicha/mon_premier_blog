Systeme d'exploitation:
***windows***
***MAC***
***Linux***


Prérequis:
***PHP(version utilisée: 7.4.1)***
***Apache(version utilisée:Apache2.2.31)***
***MySQL(version utilisée:5.7.24)***

Programme à installer:
***MAMP pour windows et MAC(version MAMP utilisée: 4.2.0)***
*** XAMPP pour Linux***
***navigateur web recent***

Configuration actuelle de la base de données:
nom de la BDD: 'mon_blog'
user: 'root'
password: 'root'

Installation:
-créer votre base de données avec le fichier BDD.sql
-configurer la connexion avec votre base de données au niveau du fichier: model->Manager.class.php
dans la méthode dbConnect
-le serveur doit pointer vers la racine du projet(si vous utiliser MAMP: MAMP->Preferences->Web Server: puis sélectionner la racine du projet).


