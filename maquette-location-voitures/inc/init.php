<?php

// PDO = PHP Data Object
// PDO est une surcouche de PHP, surcouche d'abstraction, qui permet d'intéragir avec la base de donnée.
// Nous disposerons ainsi plusieurs fonctions prédéfinies propre a la class PDO
// Pour pouvoir les exploiter, je dois créer un objet $pdo de ma class PDO
// Je ne suis pas obligé de l'appeler ainsi. Vous trouverey parfois le nom de $bdd. Le plus important est qu'elle ait un nom cohérent.
// Pour me connecter à la base de données je dois renseigner le host. Comme nous sommes en local, ça sera localhost
// Le dname, c'est le nom de ma base de données (nous avons choisi voiture)
// root est le nom du dbuser (identifiant de l'utilisateur) en localhost
// Les quotes vides '' sont pour les dbpassword (mot de passe pour la BDD). En local il doit rester vide. Pas de mot de passe
$pdo = new PDO('mysql:host=localhost;dbname=voiture', 'root', '', array(
    // Dans ce array/tableau, je vais définir deux paramètres
    // Le premier concerle le mode d'erreur que je veux recevoir en affichage lorqu'il y en a. Je choisi le mode warning
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    // Ci-dessous, je décide du type d'encodage que je veux vers la base de données (utf8, comme dans le doctype)
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));

// J'initialise ici aussi ces deux variables, à vide (ne rien écrire entre les quotes, pas même un espace). Car je vais en avoir besoin dans toutes mes pages du site
$erreur = '';
$content = '';