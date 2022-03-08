<?php

class Personnage{

    protected function deplacement(){
        return 'je me déplace très vite';
    }

    public function saut(){
        return 'je saute très haut';
    }
}

// Avec le mot clé extends, Mario hérite de toutes les propriétées et méthodes de la classe Personnage
// Elle peut hériter de la méthode protected, c'est un niveau de visibilité qui le permet. Public aussi, qui est encore plus visible. Par contre, pas private
class Mario extends Personnage{

    public function quiSuisJe(){
        // Je récupère dans cet affichage les méthodes dont hérite la classe enfant, même la protected
        return "Je suis Mario, " . $this->deplacement() . " et " . $this->saut() . "<br>";
    }
}

// J'instance (crée) ma class
$mario = new Mario;
// Un print_r pour visualiser si je récupère tout le contenu de Personnage en héritage
// La méthode publique apparait, mais la protected non. C'est un comportement normal, il peut l'afficher, mais la classe en hérite tout de même
echo "<pre>"; print_r(get_class_methods($mario)); echo "</pre>";

// J'affiche le contenu de la méthode codée (public function quiSuisJe())
echo $mario->quiSuisJe();