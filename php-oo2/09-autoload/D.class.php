<?php

class D{
    // Constructeur de la class A qui va s'auto-exécuter dès l'on créera un objet de notre classe A
    public function __construct(){
        // Affichage pour attester que le constructeur est executer
        echo "Instanciation de D <br>";
    }
}