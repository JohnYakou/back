<?php

abstract class Vehicule{
    final public function demarer(){
        return "je démarre";
    }

    abstract public function carburant();

    public function nombreTestsObligatoires(){
        return 100;
    }
}

class Renault extends Vehicule{
    public function carburant(){
        return "diesel";
    }

    public function nombreTestsObligatoires(){
        return 30 + parent::nombreTestsObligatoires();
    }
}

class Peugeot extends Vehicule{
    public function carburant(){
        return "essence";
    }

    public function nombreTestsObligatoires(){
        return 70 + parent::nombreTestsObligatoires();
    }
}

// RENAULT
$renault = new Renault;

echo "<pre>"; var_dump($renault); echo "</pre>";
echo "<pre>"; print_r(get_class_methods($renault)); echo "</pre>";

echo $renault = "Je suis une Renault, " . $renault->demarer() . " au " . $renault->carburant() . " et je dois effectuer " . $renault->nombreTestsObligatoires() . " tests obligatoires avant d'être proposée à la vente <br>";

// PEUGEOT
$peugeot = new Peugeot;

echo "<pre>"; var_dump($peugeot); echo "</pre>";
echo "<pre>"; print_r(get_class_methods($peugeot)); echo "</pre>";

echo $peugeot = "Je suis une Peugeot, " . $peugeot->demarer() . " à l'" . $peugeot->carburant() . " et je dois effectuer " . $peugeot->nombreTestsObligatoires() . " tests obligatoires avant d'être proposée à la vente <br>";