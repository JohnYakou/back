<?php

namespace controller;

class Controller{
    // Propriété privée qui servira de lien entre ce qui sera codé dans la classe EntityRepository et la classe Controller
    // Elle servira par exemple à récupérer toutes les données qui serviront à se connecter à notre BDD
    private $dbEntityRepository;

    public function __construct(){
        // echo "Instanciation de ma classe Controller";
    }
}