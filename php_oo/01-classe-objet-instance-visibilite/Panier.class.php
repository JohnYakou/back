<?php

// Je commence par déclarer ma class. Par convention, elle a le même nom que mon fichier (hormis.class). Par convention aussi, un fichier = à un une seule class. One ne déclare pas plusieurs classes dans un même fichier
class Panier{

    // J'initialise une propriété de visibilité public. En PHP-OO, propriété est équivalent à variable en procédural
    public $nbProduits;

    // Je déclara ma première méthode, visibilité public, qui retourne une chaine de caractères
    public function ajouterPanier(){
        return "Le produit a bien été ajouté <br>";
    }

    // Je déclara une seconde méthode, visibilité protected, qui retourne une chaine de caractères
    protected function retirerDuPanier(){
        return "Le produit a bien été retiré du panier <br>";
    }

    public function test(){
        // Ma méthode protected fonction bien dans sa class
        return $this->retirerDuPanier();
    }

    // Je déclara une troisième méthode, visibilité private, qui retourne une chaine de caractères
    private function afficherProduits(){
        return "Voici la page qui affiche les produits <br>";
    }

    // Ces trois differences de visibilité vont nous permettre de protéger (ou pas) le code.
    // Je devrais donc, selon les cas de figure, utiliser une syntaxe spécifique pour utiliser mes propriétés ou méthodes selon leur visibilité
}

// Je ne peux pas appeler ainsi, directement, une propriété ou une méthode de ma class
// echo $nbProduits

// Pour exploiter le contenu de ma class, je dois l'instancier (= créer un objet)
// Je dois créer un objet de ma class (se souvenir de $pdo = new PDO)
$panier = new Panier;

// Le var_dump de mon objet m'indique que c'est donc bien un objet de ma class Panier. Que lui a été attribué l'identifiant #1. Qu'il contient une propriété. Et que cette propriété ne reçoit pour l'instant aucune valeur (NULL)
echo '<pre>'; var_dump($panier); echo "</pre>";
// Mon print_r m'indique mon objet contient une méthode (qui à l'indice 0). Il ne peut pas me montrer les deux autres méthodes car elles ont une visibilité protected et private
echo '<pre>'; print_r(get_class_methods($panier)); echo "</pre>";

// Pour affecter une valeur à la propriété de l'objet, je pointe avec -> vers cette propriété et je lui affecte une valeur avec =
// J'ai affecté la valeur de la propriété de l'objet, et pas celle de la classe. La classe ne doit pas être modifiée
echo $panier->nbProduits = 5;
// Désormais, sa valeur ne sera plus NULL, mais 5
echo "<pre>"; var_dump($panier); echo "</pre>";

echo 'Vous avez ' . $panier->nbProduits . ' articles dans votre panier <br>';

// Je peux récupérer le contenu de cette méthode, en dehors de la classe car elle a une visibilité public
// Visibilité public permet d'y accéder dans la class. Dans une classe qui hérite et en dehors de la classe
echo $panier->ajouterPanier() . '<br>';

// Je ne peux pas accéder en dehors de la classe (Panier) aux deux prochaines méthodes
// La visibilité protected permet d'y accéder à l'intérieur de la classe et dans une classe qui hérite
// echo $panier->retirerDuPanier() . '<br>';

// La visibilité private me permet d'y accéder qu'à l'intérieur de la classe (pas en dehors et pas dans une classe qui hérite)
// echo $panier->afficherProduits() . '<br>';

// Je crée un nouvel objet de ma classe. Son var_dump() m'indique que aucune valeur a été affectée à $nbProduits (NULL). C'est la preuve que la valeur 5 affectée tout à l'heure a impacté la propriété de l'objet $panier, et non toute la classe Panier (sa propriété est resté initialisées, mais toujours sans aucune valeur)
$panier2 = new Panier;
echo "<pre>"; var_dump($panier2); echo "</pre>";


// extends me permet de dire que la classe Produits hérite de la classe Panier
class Produit extends Panier{
    public function test(){
        // Ma méthode protected fonction bien dans sa class qui hérite
        return $this->retirerDuPanier();
        // Celle-ci ne fonctionne pas, elle est private
        // return $this->afficherProduits();
    }
}