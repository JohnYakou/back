<?php

namespace controller;

class Controller{
    // Propriété privée qui servira de lien entre ce qui sera codé dans la classe EntityRepository et la classe Controller
    // Elle servira par exemple à récupérer toutes les données qui serviront à se connecter à notre BDD
    // Une fois la classe EntityRepository instanciée, elle sera un objet de cette classe, permettant de récupérer ses propriétés comme méthodes
    private $dbEntityRepository;

    // constructeur de la classe Controllern qui va instancier la classe EntityRepository, et créer donc un objet dbEntityRepository qui nous servira à récupérer toutes les propriétés et méthodes de la classe EntityRepository
    public function __construct(){
        // echo "Instanciation de ma classe Controller";

        // Je crée un objet dbEntityRepository de ma classe EntityRepository (en passant par son namespace pour qu'elle soit disponible)
        $this->dbEntityRepository = new \model\EntityRepository;
    }

    // Cette méthode va permettre de gérer l'action de l'utilisateur
    // Cet utilisateur voudra t-il ajouter un employé ? Voir la fiche d'un employé ? Supprimer sa fiche ...
    // Le controller avec cette méthode va faire le pivot entre l'action du user (en front, sur les vues) et les requetes dont je vais avoir besoin, codée dans EntityRepository
    public function handleRequest(){

        // Condition ternaire pour vérifier si une donnée a transiter dans l'URL
        // Si c'est TRUE, je déclare une variable $choixUser qui va contenir cette valeur récupéree dans l'URL
        $choixUser = isset($_GET['choixUser']) ? $_GET['choixUser'] : NULL ;

        // Son équivalent en syntaxe classique
        // if(isset($_GET['choixUser'])){
        //     $choixUser = $_GET['choixUser'];
        // }

        try{
            // Si le user veut ajouter ou modifier la fiche d'un employé
            if($choixUser == 'add' || $choixUser == 'update'){
                // Je coderais une méthode save()
                $this->save($choixUser);
            // Si le user veut voir la ficher d'un seul employé
            }elseif($choixUser == 'select'){
                // Je coderais une méthode select
                $this->select();
            // Si le user veut supprimer la fiche d'un employé
            }elseif($choixUser == 'delete'){
                // Je coderais une méthode delete
                $this->delete();
            }else{
                $this->selectAll();
            }
        }

        catch(\Exception $erreur){
            echo "Impossible de récupérer le contenu du fichier. Erreur ! " . $erreur->getMessage() . "<br> Il y a une erreur à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . "<br>";
        }
    }

    // Méthode render qui va gérer l'affichage sur mon site
    // Elle va gérer trois parametres :
    // I. Le layout => affichage global de mon site. Toutes les pages en auront besoin
    // II. Les templates => ça sera l'affichage particulier pour chaque page. Ils trouveront leur place dans le layout global
    // III. Le contenu, qui sera formé de diverses données. Comme dans l'exemple de l'affichage d'un tableau. On récupérera des données en BDD pour les afficher dans leur template
    public function render($layout, $template, $parameters = array()){

        // extract est une fonction prédéfinie qui permet d'extraire des données d'un tableau sans passer par le nom du tableau puis crocheter à l'indice voulu
        // Exemple : $parameters['prenom'] deviendra $prenom | $parameters['nom'] deviendra $nom ...
        extract($parameters);


        // Mise en place d'une procédure pour envoyer les diverses informations sur une page.
        // Je dois donc envoyer un layout, un template et des données. Comme toutes les informations  ne s'affichent pas en meme temps (en tant que dév., pas pour l'utilisateur. Pour ce dernier, tout s'affichera en meme temps)

        // Ce processus de mise en mémoire commence avec ob_start
        // Je fais un require_once pour récupérer le template dont j'aurais besoin, pour l'insérer dans le layout gabarit
        ob_start();
        require_once("view/$template");
        // Comme ce template ne va pas s'afficher en meme temps que mon layout, je le conserve dans une variable ($content)
        $content = ob_get_clean();

        // Je recommence le processus de mise en mémoire pour le layout
        ob_start();
        // Je fais aussi appel à require_once pour le récupérer dans le dossier view. Par contre, pas besoin pour lui de le conserver dans une variable, il sera déployé en premier, immédiatement
        require_once("view/$layout");

        // Je fais un return avec la fonction prédéfinie ob_end_flush pour libérer cet affichage sur le navigateur
        // C'est la fin de ce processus de mise en mémoire de divers éléments nécessaire à l'affichage de ma page
        return ob_end_flush();
    }

    // méthode qui va permettre l'affichage du tableau regroupant tous les employés
    public function selectAll(){
        // echo "Méthode selectAll() | Affichage de tous les employés";
        // $resultat = $this->dbEntityRepository->selectAllEntityRepo();

        // echo "<pre>"; print_r($resultat); echo "</pred>";

        // J'utilise ma méthode render()
        // Je rensigne les arguments dont elle a besoin, c'est-à-dire, le nom du layout qu'elle doit utiliser, le nom du template qu'elle doit utiliser
        // En dernier, sous forme de tableau, différentes données. Je déclare un indice auquel j'affecte une valeur
        // Je peux déclarer autant que je veux. Autant que nécessaire
        $this->render('layout.php', 'affichage-employes.php', [
            'title' => 'Affichage de tous les employés',
            'data' => $this->dbEntityRepository->selectAllEntityRepo(),
            'fields' => $this->dbEntityRepository->getFields()
        ]);
    }

    // Méthode qui va permettre l'affichage de la fiche d'un seul employé
    public function select(){
        echo "Méthode select() | Affichage d'un seul employé";
    }

    // Méthode qui va permettre l'affichage du formulaire d'ajout ou de modification de la fiche d'un employé
    public function save(){
        echo "Méthode save() | Affichage d'un formulaire d'ajout ou de modification";
    }

    // Méthode qui va permettre la suppression de la fiche d'un employé (démission, retraite ...)
    public function delete(){
        echo "Méthode delete() | Suppression de la fiche employé";
    }
}