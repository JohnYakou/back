<?php

class Membre{

    // ces deux propriétés sont private. Ce sont les champs du formulaire que vont remplir les utilisateurs, je dois les protéger pour que les informations qui vont transiter ne soient pas différentes de ce que j'attends
    private $prenom;
    private $nom;

    // cette méthode va servir à controler ce qui va transiter dans les champs du formulaire.
    // Un setter sert de controleur en POO
    // le nom que je lui donne n'a pas d'importance. Ce n'est pas une fonction prédéfinie. Mais par convention, un setter commencera par le mot set, suivi du nom du champs qu'il controle
    // Un setter reçoit ogligatoirement dans sa parenthèse un argument (la donnée qu'il doit controler)
    public function setPrenom($newPrenom){

        // Condition qui va vérifier si la donnée reçue (mon argument/$newPrenom) est bien de type String
        if(is_string($newPrenom)){
            // si la condition est vérifiée, alors, grace à $this-> la propriété $prenom de l'objet va recevoir la valeur contenue dans $newPrenom
            // $this représente toujours l'objet en cours (celui qui vient d'etre crée, l'instance de ma classe)
            // il pointe donc avec -> pour atteindre la propriété de mon objet (celui en cours)
            $this->prenom = $newPrenom;
        // $membre
        }else{
            // dans le cas ou la condition n'est pas respectée, alors j'affiche un message d'erreur à l'utilisateur pour lui dire qu'il doit ecrire autre chose
            // ce message est volontairement "moche". J'aurai pu faire comme en procédural, un message beaucoup plus agréable à l'affichage
            // je ne fais que montrer une autre manière de générer un message d'erreur
            trigger_error('Cela ne correspond pas à ce qui est attendu pour ce champ', E_USER_ERROR);
        }


    }

    // methode pour récupérer la valeur affectée à la propriété
    // un getter est obligatoire pour récupérer une valeur si la propriété est private
    // elle ne prend jamais d'argument
    public function getPrenom(){
        // Retourne la valeur affectée à la propriété de l'objet courant grace à $this->
        return $this->prenom;
    }

    public function setNom($newNom){
        if(is_string($newNom)){
            $this->nom = $newNom;
        }else{
            echo 'Ce n\'est pas conforme à ce qui est attendu';
        }
    }

    public function getNom(){
        return $this->nom;
    }

}

// j'instancie ma classe membre en créant un objet $membre
// $this va etre son représentant dans la classe (ligne 20 de ce fichier)
$membre = new Membre;
// pour donner une valeur à la propriété $prenom de l'objet, je dois utiliser la fonction setPrenom(). Je lui donne entre parenthèses, l'argument qu'elle attend obligatoirement. sinon, erreur, le code ne s'exécute pas. Cet argument servira de valeur, si la condition est respectée (condition ligne 16)
$membre->setPrenom('Aziz');
// var_dump confirme que la valeur a bien été affectée $ $prenom de l'objet
echo '<pre>'; var_dump($membre); echo '</pre>';

$membre->setNom('Tobbal');
echo '<pre>'; var_dump($membre); echo '</pre>';
echo 'Mon nom est ' .  $membre->getNom() . '<br>';

// nouvelle instance dema classe, avec un nouvel objet crée
$membre2 = new Membre;
// var_dump qui indique que la valeur précédemment envoyée n'impacte que l'objet $membre, et non pas $membre2
echo '<pre>'; var_dump($membre2); echo '</pre>';

// syntaxe ci-dessous génère une erreur car la propriété est private
// echo $membre->prenom;
// il faut donc passer par la méthode getPrenom qui va faire le travail de récupération de la valeur pour pouvoir l'afficher
echo 'Mon prénom est ' . $membre->getPrenom() . '<br>';

// La syntaxe ci-dessous sert d'exemple pour montrer quele get ne sert pas que à afficher, mais aussi a récupérer une valeur pourl'utiliser dans une requete SQL
// public function insertUser(){
//     $ajouterUser = $pdo->prepare("INSERT INTO membre (prenom, nom) VALUES (". $this->getPrenom(). ",". $this-getNom() . ") ");
// }