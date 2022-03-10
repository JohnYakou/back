<?php

class Autoload{
    // Du fait qu'elle soit static, cette méthode appartient à sa classe et non à un objet créer de cette meme classe. Elle ne sera pas modifiable via l'instance de la classe, mais seulement par sa classe
    public static function inclusionAuto($classname){
        // La constante "magique" __DIR__ me recupere le chemin vers mon fichier
        // Elle recupere l'integralité du chemin vers mon projet, qu'il soit en local ... comme plus tard en ligne, ce qui sera très interessant. Je n'aurais de modification a faire lors de ce changement là
        // Le premier / est dans l'URL
        // Les \\ sépare => new controller\Controller
        // Le dernier / sert à remplacé les \ par des /
        require_once __DIR__ . '/' . str_replace('\\', '/', $classname . '.php');

        // echo __DIR__ . '/' . str_replace('\\', '/', $classname . '.php <br>');
    }
    
}

spl_autoload_register(array('Autoload', 'inclusionAuto'));

// $controller = new controller\Controller;
// echo __DIR__;