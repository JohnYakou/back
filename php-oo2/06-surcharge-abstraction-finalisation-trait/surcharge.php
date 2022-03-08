<?php

class A{
    // Quelques propriétées protected
    protected $nombre1;
    protected $nombre2;
    protected $nombre3;

    // Une méthode simple qui retrouve une valeur
    public function calcul(){
        return 10;
    }
}

// Classe B qui hérite de la classe A
class B extends A{
    // Je surcharge la méthode calcul hérité de la classe A
    // J'ai besoin de l'afficher, comparé a son comportement initial
    // Le nom de cette méthode peut-être différent de celui de la classe parent
    public function calcul(){
        // Je recup la valeur 10 du parent, donc la classe A
        // Je recupère la valeur retournée par la méthode calcul (10) en utilisant la syntaxe parent::calcul()
        // Je l'affecte à une variable $nb
        // Ici, le nom de le méthode doit etre similaire a celui de la méthode de la classe A que l'on veut surchargé, modifier
        $nb = parent::calcul();

        // Condition qui va tester la valeur contenu dans ma variable $nb
        // Je ne mets pas d'accolade pour ce if/else, car dans leur bloc d'instruction, il n'y a qu'une seule instruction. Dans ce cas de figure, cette syntaxe est possible
        if($nb < 100){
            return "$nb est inférieur à 100";
        }else{
            return "$nb est supérieur à 100";
        }
    }
}

// J'initialise ma class B
$b = new B;
// get_class_methods() pour voir ce que contient mon objet $b
echo "<pre>"; print_r(get_class_methods($b)); echo "</pre>";
// J'affiche le résultat de ma fonction calcul (elle doit porter le nom de la méthode de la classe, qui peut-être different de celui de la méthode héritée de la classe parent (A)
echo $b->calcul();