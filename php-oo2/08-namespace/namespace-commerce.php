<?php

// namespace Commerce1{
//     class Boutique{

//     }
// }

// Premiere maniere de déclarer un namespace, la plus habituelle
namespace Commerce1;
// class Commande qui appartient au namespace Commerce1
class Commande{
    public $nbCommandes = 3;


}

// Déclaration d'un second namespace, je ne suis dans celui de Commerce1
// Normalement, on ne déclare pas 2 namespace dans un même fichier (comme on ne déclare pas deux classes dans un même fichier)
// Mais, pour les besoins de ce test, pour aller plus vite, je ne vais pas respecter cette convention
namespace Commerce2;

// classe produit qui appartient au namespace Commerce2
class Produit{
    public $nbProduits = 22; 
}

// Déclaration d'un troisieme namespace
namespace Commerce3;

class Panier{
    public $nbProduitsPanier = 4;
}

// Deux classes peuvent avoir le meme noms, a condition d'etre dans deux namespace différents
class Produit{
    public $nbProduits = 5;
}