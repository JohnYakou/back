<?php

class Etudiant{

    // Propriété privée qui va necessiter de déclarer ses setters et getters. Pour chaque propriété privéé je devrai la faire, en plus de controller l'envoi de données dans le setter
    private $prenom;
    private $nom;

    //  Déclaration du __construct qui attend un argument
    // Ce n'est pas obligé dans le cadre d'un constructeur. On peut ne donner aucun argument comme devoir en donner plusieurs
    // Un constructeur s'auto execute dès que l'on instancie la class (crée un objet de cette classe)
    // On ne peut pas avoir deux __construct dans une même classe
    public function __construct($newPrenom, $newNom){
        // Cet affichage montre que mon constructeur s'est bien executé
        echo "Durant l'instanciation, nous avons bien reçu la valeur $newPrenom et $newNom <br>";

        // Le constructeur doit envoyer la donnée (contenue dans $argument) pour affecter la valeur dans le setter
        $this->setPrenom($newPrenom);
        $this->setNom($newNom);
    }

    // Le setter reçoit la donnée, il l'a controle (avec is_string, par exemple)
    // Le setter contient obligatoirement un argument...
    public function setPrenom($newPrenom){
        // Si le setter valide la donnée, il l'affecte à la propriété de l'objet $prenom
        $this->prenom = $newPrenom;
    }

    // ...contrairement au getter
    // Le getter recupère la donnée dans la propriété de l'objet $prenom. Elle est désormais disponible pour etre affichée ou autre
    public function getPrenom(){
        return $this->prenom;
    }

    public function setNom($newNom){
        $this->nom = $newNom;
    }

    public function getNom(){
        return $this->nom;
    }
}



// Instanciation de ma class Etudiant
$etudiant = new Etudiant('John', 'Yakou');

echo "Je suis " . $etudiant->getPrenom() . ' ' .$etudiant->getNom();

// Un constructeur est une méthode "magique", qui s'auto exécute, qui permet d'automatiser certaines taches
// On peut le considerer comme un fichier init.php