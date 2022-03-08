<?php

class Maison{

    // Une propriété non static, appartient à l'objet
    public $couleur = "blanc";
    // Une propriété static appartient à la class et impact tous les objets
    public static $espaceTerrain = "500m²";

    // Une propriété static mais privée
    private static $nbPieces = 7;

    // Syntaxe pour déclarer une constante en procédural
    // define('URL', 'sa valeur');

    // Syntaxe pour déclarer une constante en PHP OO
    // Utilisation du mot const, suivi du nom en maj (convention), puis je lui donne sa valeur
    // Une constante appartient automatiquement à sa classe
    const HAUTEUR = "10m";

    // Je fais un getter pour récupérer sa valeur (de la private static $nbPieces), mais pas besoin d'un setter, car une valeur est déjà affectée
    // Le getter sera aussi static
    public static function getNbPieces(){
        // J'utilise self::, car c'est une propriété qui appartient à la classe, et non à l'objet
        return self::$nbPieces;
    }

}

// J'instancie la classe, l'objet aura par défaut la couleur blanc
$maison = new Maison;
echo "<pre>"; echo var_dump($maison);  echo "</pre>";
// La propriété static n'apparait pas avec le var_dump, car elle appartien à la classe et non à l'objet


// Second objet, je veux que sa couleur soit bleu
$maison2 = new Maison;
$maison2->couleur = "bleu";
echo "<pre>"; echo var_dump($maison2);  echo "</pre>";

// Toisième objet, je ne précise rien, sa couleur sera blanc
$maison3 = new Maison;
echo "<pre>"; echo var_dump($maison3);  echo "</pre>";

// Pour afficher la valeur de la propriété static, je dois passer par la classe
echo "L'espace terrain par défaut est de " . Maison::$espaceTerrain . "<br>";

// Si je veux lui modifier sa valeur. Idem, je dois passer par la classe
Maison::$espaceTerrain = "1000m²";
// Cette nouvelle valeur ecrase la précedente, elle va impacter tous les nouveaux objets, mais pas les précedents
echo "L'espace terrain par défaut est désormais de " . Maison::$espaceTerrain . "<br>";

echo "Le nombre de pièces par défaut est de " . Maison::getNbPieces() . "<br>";

echo "<br>";

// Va générer une erreur car je pointe une propriété qui apparitent à l'objet avec une classe
// echo $maison3->espaceTerrain . "<br>";

// echo Maison::$couleur . "<br>";

// Ces deux-là ne vont pas générer d'erreur (mettre en com. les deux autres, sinon elles bloquent le code)
echo $maison3->getNbPieces() . "<br>";
// Elle devraient générer une erreur car je ponite avec un objet sur des méthodes et propriétés static, qui appartient à la classe
// C'est une trop grande permissivité de PHP. Il aurait du les signaler en tant qu'erreurs comme les deux autres
echo $maison3::$espaceTerrain . "<br>";

// Remaque : lorsque je pointe avec un objet vers une propriété $maison3->$couleur, je ne dois pas mettre le signe $
// Si je pointe avec ma classe vers sa propriété Maison::$espaceTerrain, je dois mettre le signe $

// Syntaxe pour récup la valeur de la constante, qui appartient obligatoirement à sa classe (pas besoin de préciser 'static')
echo "La hauteur sous-plafond par défaut est de " . Maison::HAUTEUR . "<br>";