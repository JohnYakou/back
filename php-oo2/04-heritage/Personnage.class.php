<?php

class Personnage{

    protected function deplacement(){
        return 'je me deplace très vite !';
    }

    public function saut(){
        return 'je saute très haut !';
    }

}

// avec le mot clé extends, Mario hérite de toutes les propriétés et méthodes de la classe Personnage
// elle peut hériter de la méthode protected, c'est un niveau de visibilité qui le permet. Public aussi, qui est encore plus visible. par contre, pas private
class Mario extends Personnage{

    public function quiSuisJe(){
        // je récupère dans cet affichage les méthodes dont hérite la classe enfant, même la protected
        return 'Je suis Mario, ' .$this->deplacement() . ' et ' . $this->saut() .'<br>';
    }
}

// nouvelle classe qui hérite de Personnage
class Bowser extends Personnage{

    public function quiSuisJe(){
        return 'Je suis Bowser, ' .$this->deplacement() . ' et ' . $this->saut()  .'<br>';
    }

    // je redéfinis la méthode saut() (existante dans la classe Personnage) en retournant une nouvelle valeur. Je veux savoir si cela est possible ou si je vais avoir une erreur PHP
    public function saut(){
        return 'je ne saute pas très haut';
    }

}

// j'instancie ma classe
$mario = new Mario;
// un print_r pour visualiser si je récupère tout le contenu de Personnage en héritage
// la méthode publique apparait, mais la protected non. c'est un comportement normal, il ne peut l'afficher, mais la classe en hérite tout de même
echo '<pre>'; print_r(get_class_methods($mario)); echo '</pre>';

// j'affiche le contenu de la méthode codée à la ligne 19
echo $mario->quiSuisJe();

// j'instancie la classe Bowser pour créer un objet
$bowser = new Bowser;
// je fais unaffichage pour vérifier qu'elle valeur je récupère pour saut(). Celle de la classe mère, ou la nouvelle
echo $bowser->quiSuisJe();
// cela a fonctionné, je récupère la nouvelle valeur. J'ai surchargé la méthode saut() et cela a fonctionné.
// C'est une technique dont je pourrai avoir besoin de temps en temps