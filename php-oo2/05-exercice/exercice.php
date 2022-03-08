<?php

class Voiture{

    // propriété private qui va necessiter de coder les setter et getter
    private $litresEssence;

    // le setter reçoit en argument une valeur (le nombre de litres d'essence)
    public function setLitresEssence($litres){
        // si la valeur reçue est validée (avec un if que l'on a pas codé), alors cette valeur va aller affecter la propriété de l'objet $litresEssence
        $this->litresEssence = $litres;
    }

    // le getter pour récupérer la valeur stockée dans ^litresEssence
    public function getLitresEssence(){
        // pour récupérer la valeur, je pointe avec $this vers la propriété de l'objet $litresEssence
        return $this->litresEssence;
    }

}

// la classe pompe hérite de la classe Voiture
class Pompe extends Voiture{

    // Dans cette méthode, qui appartient à la classe Pompe, je donne deux arguments
    // Le premier, c'est le nom de la classe (Voiture) dont sera issu l'objet a relier ($voiture). Le second argument, $vehicule, sera le représentant de cet objet
    public function donnerLitresEssence(Voiture $vehicule){        
        // Calcul pour savoir combien de litres d'essence seront envoyés dans le reservoir de l'objet voiture (représenté par $vehicule)
        // $this représente l'objet en cours de la classe. Je suis dans la classe Pompe, $this représente donc l'objet $pompe
        // Je fais en premier appel à setLitresEssence pour modifier la valeurdu nombre de litres dans la pompe
        // Pour modifier, je dois savoir combien il y a (je le sais avec son getter, c'est 500)
        // Je vais donc soustraire aux 500 litres actuels, ce que je dois donner au reservoir de la voiture
        // Ce que je donne au reservoir de la pompe, c'est 50 litres (pour faire le plein) - ce qu'il y a deja dans le reservoir (pour qu'il ne deborde pas). Je sais ce qu'il y a dans la voiture grace à son getter. C'est 5 litres
        // Ceci me donnera le calcul suivant : 500 litres (50 litres - 5 litres) | 45 qui me laisse dans le reservoir de la pompe -> 455 litres
        $this->setLitresEssence($this->getLitresEssence() - (50 - $vehicule->getLitresEssence()));
        // Calcul pour faire le plein du reservoir de la voiture
        // Je fais appel à $vehicule qui représente mon objet $voiture
        // Je passe par son setter pour modifier la valeur contenu dans le reservoir de la voiture
        // Pour savoir combien de litres je dois, je peux envoyer dans le reservoir, je dois savoir au préalable combien il y a dans le reservoir
        // Je le sais avec son getter (5)
        // A présent, je sais que je peux envoyer 50 litres, moins ce qu'il y a deja dans le reservoir
        // 50 - 5 = 45 litres
        $vehicule->setLitresEssence($vehicule->getLitresEssence() + (50 - $vehicule->getLitresEssence()));         // 5 litres       + (50 - 5 litres)
        // var_dump pour afficher ce que contient $vehicule
        echo '<pre>'; var_dump($vehicule); echo '</pre>';
        // Double affichage coventionnel de ce que contient les reservoirs de la voiture
        echo "J'ai désormais " . $vehicule->getLitresEssence() . " dans le reservoir de ma voiture <br>";
        echo "Il me reste " . $this->getLitresEssence() . " litres dans ma pompe <br>";

    }

}

// je crée un objet $voiture, de ma classe Voiture. c'est une instance de ma classe Voiture
$voiture = new Voiture;
// j'execute ma méthode setLitresEssence en lui donnant en argument le nombre de litres d'essence
$voiture->setLitresEssence(5);
// j'affiche cette même valeur en executant ma méthode
echo 'Ma voiture a dans son reservoir ' . $voiture->getLitresEssence() . " litres d'essence <br>";

$pompe = new Pompe;
$pompe->setLitresEssence(500);
echo 'Ma pompe a dans son reservoir ' . $pompe->getLitresEssence() . " litres d'essence <br>";

$pompe->donnerLitresEssence($voiture);

