<?php

// Cette méthode est abstraite car j'ai déclaré à l'intérieur deux méthodes abstract. Si je n'écris pas abstract class, j'aurai une erreur PHP
abstract class Joueur{
    protected $pseudo;
    protected $age;

    // Méthode pour s'inscrire qui doit faire appel à une méthode etreMajeur (si on n'est pas majeur, on ne peut pas s'inscrire pour jouer en ligne)
    public function inscription(){
        return $this->etreMajeur();
    }

    // Méthode abstraite pour savoir si on est majeur
    abstract function etreMajeur();

    // Méthode abstraite pour déterminer que va utiliser le joueur en ligne, selon son pays
    abstract function devise();
}

// Je déclare la classe JoueurFr qui hérite de Joueur
class JoueurFr extends Joueur{

    // Je suis obligé de d'implémenter les deux classes abstraites dont a hérité la classe JoueurFr
    // Tout au moins, je suis obligé de les déclarer, même si je ne leur donne pas d'instruction a executer
    public function etreMajeur(){
        return 18;
    }

    // Je fais la meme chose avec le methode devise, je l'implémente
    public function devise(){
        return '€';
    }
}

// Je ne peux pas instancier une classe abstraite (Joueur). Je ne pourrai créer d'objet que des classes qui en hérite (JoueurFr)
$joueurFr = new JoueurFr;
echo "En France, l'age légal pour s'inscrire sur un site de jeux en ligne est de " . $joueurFr->etreMajeur() . " ans <br>";
echo "Pour jouer sur un site de jeux en ligne en France, on doit utiliser des " . $joueurFr->devise() . "<br>";

class JoueurUs extends Joueur{

    public function etreMajeur(){
        return 21;
    }

    public function devise(){
        return "$";
    }
}

echo "<br>";

$joueurUs = new JoueurUs;

echo "In the United States, the legal age to register on an online gaming site is " . $joueurUs->etreMajeur() . " years old <br>";
echo "To play on an online gaming site in the United States, you must use " . $joueurUs->devise() . "<br>";