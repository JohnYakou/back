<?php

class Membre{

    // Ces deux propriétés sont private. Ce sont les champs du formulaire que vont remplir les utilisateurs, je dois les protéger pour que les informations qui vont transiter ne soient pas differentes de ce que j'attends
    private $prenom;
    private $nom;

    // Cette méthode va servir à controller ce qui va transiter dans les champs du formulaire
    // Un setter sert de controleur en PHPOO
    // Le nom que je lui donne n'a pas d'importance. Ce n'est pas une fonction prédéfinie. Mais par convention, un setter commencera oar le mot set, suivi du nom du champs qu'il controle
    // Un setter recoit obligatoirement dans sa parenthese un argument (la donnée qu'il doit controller)
    public function setPrenom($newPrenom){
        // Condition qui va verifier si la donnée recue (mon argument) est bien de type string
        if(is_string($newPrenom)){
            // Si la condition est vérifié, alors grace à $this->la propriété $prenom de l'objet va recevoir la valeur véhicule dans $newPrenom
            // $this représente toujours l'objet en cours (celui qui vient d'être crée, l'instance de ma classe)
            // Il pointe donc avec -> pour atteindre la propriété de mon objet (celui en cours)
            $this->prenom = $newPrenom;
        }else{
            // dans le cas ou la condition n'est pas respecté, alors j'achiffe un message d'erreuur à l'utilisateur pour lui dire qu'il doit ecrire autre chose
            // Ce message est volontairement 'moche'. J'aurai pu faire comme en procédural, un message beaucoup plus agréable à l'affichage.
            // Je ne fais que montrer une autre maniere de generer un message d'erreur
            trigger_error('Cela ne correspond pas à ce qui est attendu pour ce champ', E_USER_ERROR);
        }
    }

    // Methode pour recupérer la valeur affecté à la propriété
    public function getPrenom(){
        return $this->prenom;
    }

    public function setNom($newNom){
        if(is_string($newNom)){
            $this->nom = $newNom;
        }else{
            echo "Ce n'est pas conforme a ce qui est attendu";
        }
    }

    public function getNom(){
        return $this->nom;
    }
}

// J'instante ma classe membre en créant un objet $membre
// $this va être son représentant dans la classe (ligne 19)
$membre = new Membre;
// Pour donner une valeur à la propriété $prenom de l'objet, je dois utiliser la fonction setPrenom(). Je lui donne entre parenthese, l'argument qu'elle attend obligatoirement. Sinon, erreur, le code ne s'execute pas. Cet argument servira de valeur, si la est respecté (condition ligne 15)
$membre->setPrenom('John');
// var_dump confirme que la valeur a bien été affectéé $prenom de l'objet
echo "<pre>"; var_dump($membre); echo '</pre>';

$membre->setNom('Yakou');
echo "<pre>"; var_dump($membre); echo '</pre>';
// echo 'Mon nom est ' . $membre->getNom() . '<br>';


// nouvelle instance de ma classe, avec un nouvel objet créé
$membre2 = new Membre;
// var_dump qui indique que la valeur précédement envoyée n'impacte que l'objet $membre, et non pas $membre2
echo "<pre>"; var_dump($membre2); echo '</pre>';

echo 'Mon prénom est ' . $membre->getPrenom() . '<br>';
echo 'Mon nom est ' . $membre->getNom() . '<br>';


// La syntaxe sert d'axemple pour montrer quel get ne sert pas que à afficher, mais aussi a recuperer une valeur pour l'utiliser dans une requete SQL
// public function insertUser(){
//     $ajouterUser = $pdo->prepare("INSERT INTO membre (prenom, nom) VALUES (". $this->getPrenom(). ", ". $this->getNom() . ") ");
// }