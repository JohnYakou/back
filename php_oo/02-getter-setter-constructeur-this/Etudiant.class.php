<?php

class Etudiant{

    private $prenom;

    public function __construct($argument){
        echo "Durant l'instaciation, nous avons bien reçu la valeur $argument <br>";

        $this->setPrenom($argument);
    }

    public function setPrenom($argument){
        $this->prenom = $argument;
    }

    public function getPrenom(){
        return $this->prenom;
    }
}