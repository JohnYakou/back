<?php

// Pour declarer un trait, on utilise le clé : trait
// Par convention, pour declarer un trait, son nom commence par un T maj. 
trait TPanier{
    // Tout le contenu du trait sera déclaré comme dans une classe. La syntaxe sera la même
    public $nbProduits;

    public function afficherProduits(){
        return "J'affiche tous les produits";
    }
}

trait TMembre{
    public function afficherMembre(){
        return "J'affiche tous les membres";
    }
}


class Produit{
    public $prix;
}


// Une classe peut hériter d'une autre classe, en plus d'hériter de plusieurs trait
class Site extends Produit{
    // Pour hériter des trait ci-dessus, j'utilise le mot clé => use
    use TPanier, TMembre;
}

// Instantiation de ma classe
$site = new Site;
// var_dump et print_r pour vérifier ce que contient mon objet $site
echo "<pre>"; var_dump($site); echo "</pre>";
echo "<pre>"; print_r(get_class_methods($site)); echo "</pre>";

// On ne peut pas instantié un trait
// $tMembre = new TMembre;