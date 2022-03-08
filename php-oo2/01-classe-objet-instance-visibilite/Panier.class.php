<?php

/* je commence par déclarer ma classe. Par convention, elle a le même nom que mon fichier (hormis.class). Par convention aussi, un fichier = à une seule classe.
On ne declare pas plusieurs classes dans un même fichier */
class Panier{

    // j'initialise une proiété de visibilité public
    // en POO, propriété est équivalent à variable en procédural
    public $nbProduits;

    // je declare un premiere méthode, visibilité public, qui retourne une chaine de caractères
    public function ajouterPanier(){
        return "Le produit a bien été ajouté <br>";
    }
 
    // je declare un seconde méthode, visibilité protected, qui retourne une chaine de caractères
    protected function retirerDuPanier(){
        return "Le produit  bien été retiré <br>";
    }

    public function test(){
        // ma methode protected fonctionne bien dans sa classe
        return $this->retirerDuPanier();
    }

    // je declare un troisième méthode, visibilité private, qui retourne une chaine de caractères
    private function afficherProduits(){
        return "Voici la page qui affiche les produits <br>";
    }

    // ces trois différences de visibilité vont nous permettre de protéger (ou pas) le code
    // je devrais donc, cela les cas de figure, utiliser une syntaxe spécifique pour utiliser mes propriétés ou méthodes selon leur visibilité

}

// je ne peux appeler ainsi, directement, une propriété ou une méthode de ma classe.
// erreur undefined nbProduit 
// echo $nbProduits;

// pour exploiter le contenu de ma classe, je dois l'instancier.
// je dois créer un objet de ma classe (se souvenir de $pdo = new PDO)
$panier = new Panier;

// le var_dump de mon objet m'indique que c'est donc bien un objet de ma class Panier. Que lui a été attribué l'identifiant #1. Qu'il contient une propriété. Et que cette propriété ne reçoit pour l'instant aucune valeur (NULL)
echo '<pre>'; var_dump($panier); echo '</pre>';
// mon print_r m'indique que mon objet contient une méthode (qui à l'indice 0). Il ne peut me montfrer les deux autres méthodes car elles ont une visibilité protected et private
echo '<pre>'; print_r(get_class_methods($panier)); echo '</pre>';

// pour affecter une valeur à la propriété de l'objet, je pointe avec -> vers cette propriété et je lui affecte une valeur avec =
// j'ai affecté la valeur de la propriété de l'objet, et pas celle de la classe. La classe ne doit pas etre modifiée.
$panier->nbProduits = 5;
// désormais, sa valeur ne sera plus NULL, mais 5
echo '<pre>'; var_dump($panier); echo '</pre>';

echo 'Vous avez actuellement dans votre panier ' . $panier->nbProduits . ' articles<br>';

// je peux récupérer le contenu de cette méthode, en dehors de la classe car elle à une visibilité public. 
// visibilité public permet d' y accéder dans la classe. Dans une classe qui hérite et en dehors de la classe
echo $panier->ajouterPanier() . '<br>';

// je ne peux accéder en dehors de la classe (Panier) aux deux prochaines méthodes.
// la visibilité protected permet d'y accéder à l'intérieur de la classe et dans une classe qui hérite
// echo $panier->retirerDuPanier() . '<br>';
// la visibilité private ne permet d'y accéder qu'à l'intérieur de la classe (pas en dehors et pas dans une classe qui hérite)
// echo $panier->afficherProduits() . '<br>';

// je crée un nouvel objet de ma classe. Son var-dump() m'indique que aucune valeur a été affectée à $nbProduits (NULL). C'est la preuve que la valeur 5 affectée tout à l'heure a impacté la propriété de l'objet $ panier, et non toute la classe Panier (sa propriété est resté initialisée, mais toujours sans aucune valeur)
$panier2 = new Panier;
echo '<pre>'; var_dump($panier2); echo '</pre>';



// extends me permet de dire que la classe Produit hérite de la classe Panier
class Produit extends Panier{
    public function test(){
        // ma methode protected fonctionne bien dans une classe qui hérite
        return $this->retirerDuPanier();
        // celle d'en dessous ne fonctionne pas, elle est private
        // return $this->afficherProduits();
    }
}