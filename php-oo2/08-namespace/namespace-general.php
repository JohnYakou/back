<?php

// Je lui donne son namespace
namespace General;

// require_once pour importer le contenu de l'autre fichier
require_once('namespace-commerce.php');
// use me sert à importer le contenu du ou des namespace inclus dans le fichier appelé avec le require_once
use Commerce1, Commerce2, Commerce3;

// La constante __NAMESPACE__ me permet de vérifier dans quelle namespace ou se trouve (ici, General)
// echo __NAMESPACE__;


// La syntaxe ci-dessous ne va pas fonctionner, car la classe PDO n'existe pas dans le namespace Genral
// $pdo = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_prenom', 'root', '');

// Si je veux l'utiliser pour me connecter à ma BDD, je vais devoir mettre un anti slash \ devant PDO. Cela permettra de sortir du namespace actuel pour retourner dans le namespace global, où elle sera reconnue
$pdo = new \PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_prenom', 'root', '');

// Pour instantier la classe Commande, je ne peux pas ecrire directement $commande = new Commande;
// Je dois la faire précéder de son namespace, comme ci-dessous
$commande = new Commerce1\Commande;
echo "<pre>"; var_dump($commande); echo "</pre>";


// J'instancie mes trois autres classes
$produit = new Commerce2\Produit;
echo "<pre>"; var_dump($produit); echo "</pre>";


$panier = new Commerce3\Panier;
echo "<pre>"; var_dump($panier); echo "</pre>";


$produit = new Commerce3\Produit;
echo "<pre>"; var_dump($produit); echo "</pre>";