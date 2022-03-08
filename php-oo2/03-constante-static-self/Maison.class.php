<?php

class Maison{

    // une propriété non static, appartient à l'objet
    public $couleur = 'blanc';
    // une propriété static appartient à la classe
    public static $espaceTerrain = "500m²";
    // une propriété static mais privée
    private static $nbPieces = 7;

    // syntaxe pour déclarer une constante en procédural
    // define('URL', 'sa valeur');

    // syntaxe pour déclarer une constante en POO
    // utilisation du mot clé const, suivi du nom en majuscules (convention), puis lui donne sa valeur;
    // Une constante appartient automatiquement à sa classe
    const HAUTEUR = '10m';

    // je fais un getter pour récupérer la valeur (de la private static $nbPieces), mais pas besoin d'un setter, car une valeur est déjà affectée
    // Le getter sera aussi static
    public static function getNbPieces(){
        // j'utilise self:: car c'est une propriété qui appartient à la classe, et non à l'objet
        return self::$nbPieces;
    }

}

// j'instancie la classe, l'objet aura par défaut la couleur blanc
$maison = new Maison;
echo '<pre>'; var_dump($maison); echo '</pre>';
// la propriété static n'apparait pas avec le var_dump, car elle appartient à la classe et non à l'objet

// second objet, je veux que sa couleur soit bleu
$maison2 = new Maison;
$maison2->couleur = 'bleu';
echo '<pre>'; var_dump($maison2); echo '</pre>';

// troisième objet, je ne précise rien, sa couleur sera blanc
$maison3 = new Maison;
echo '<pre>'; var_dump($maison3); echo '</pre>';

// pour afficher la valeur de la propriété static, je dois passer par la classe
echo "L'espace terrain par défaut est de " . Maison::$espaceTerrain . '<br>';

// si je veux lui modifier sa valeur. Idem, je dois passer par la classe
Maison::$espaceTerrain = '1000m²';
// cette nouvelle valeur ecrase la précédente, elle va impacter tous les nouveaux objets, mais pas les précédents
echo "L'espace terrain par défaut est désormais de " . Maison::$espaceTerrain . '<br>';

echo "Le nombre de pièces par défaut est de " . Maison::getNbPieces() . '<br>';

// va générer un erreur car je pointe sur une propriété qui appartient à la classe avec un objet
// echo $maison3->espaceTerrain .'<br>';

// va générer un erreur car je pointe sur une propriété qui appartient à l'objet' avec une classe
// echo Maison::$couleur .'<br>';

// ces deux prochaines ne vont pas générer de message d'erreurs (mettre en commentaires les deux précédents affichage, sinon, il sbloquent le code, vous ne pourrez pas tester)*
echo $maison3->getNbPieces() .'<br>';
// elles devraient générer une erreur car je pointe avec un objet sur des méthodes et propriétés static, qui appartiennt à la classe.
// C'est une trop grande permissivité de PHP. Il aurait du les signaler en tant qu'erreurs comme les deux autres
echo $maison3::$espaceTerrain .'<br>';

// Remarque: lorsque je pointe avec un objet vers une propriété $maison3->couleur, je ne dois pas mettre le signe $
// si je pointe avec ma classe vers sa propriété Maison::$espaceTerrain, je dois mettre le signe $

// syntaxe pour récupérer la valeur de la constante, qui appartient obligatoirement à sa classe (pas besoin de préciser static)
echo 'Hauteur sous-plafond par défaut: ' . Maison::HAUTEUR . '<br>';