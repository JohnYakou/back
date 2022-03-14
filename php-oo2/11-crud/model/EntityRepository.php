<?php

namespace model;

// Entity représente une table sql (table en BDD)
// Repository représente les classes qui vont contenir les différentes requetes dont on aura besoin le site
class EntityRepository{
    // Propriété privée quie va stocker toutes les infos liés à la connexion avec la BDD
    private $pdo;

    // Propriété public qui permettra de stocker le nom de la table dont on aura besoin pour faire nos requetes
    public $table;

    // Méthode qui permettre de récupérer les informations stockées dans la private $pdo au dessus
    public function getPdo(){
        // Elle va d'avord vérifier si on n'est pas connecté (!$this->pdo ... $this ne pointe pas vers la propriété $pdo)
        if(!$this->pdo){
            // Dans ce cas là, on va devoir se connecter à la BDD
            // Je vais tester la connexion à ma BDD dans un try / catch
            // Cela me permettre de cibler plus vite pourquoi je n'ai pas réussi à me connecter à la BDD
            // On enleve le '../' devant app car index est meme niveau que app
            try{
                $xml = simplexml_load_file('app/config.xml');

                // echo "<pre>"; print_r($xml); echo "</pre>";

                // Je dois récupèrer la valeur de table config.xml pour l'affecter à ma public propriété table (en pointant vers elle avec $this)
                $this->table = $xml->table;

                try{
                    $this->pdo = new \PDO("mysql:host=$xml->host; dbname=$xml->dbname", "$xml->user", "$xml->password", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

                    // echo "Connexion établie";
                }

                catch(\PDOException $erreur){
                    echo "Erreur base de donnée inconnue / " . $erreur->getMessage() . "<br> Le problème vient peut-être du fichier config.xml. Vérifier les données contenues <br> Problème à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . "<br>";
                }
            }

            // Si la connexion ne réussit pas, je recupere un message dans le bloc catch
            // Je recupere une erreur de type Exception et je pourrai récupérer diverses informations (telles que le nom du fichier, le numéro de la ligne ou le bug s'est produit ...)
            // Je met un anti slash devant Exception, sinon, il ne la reconnait pas. Elle ne se trouve pas dans son namespace, donc il ne la reconnait pas
            // Avec le \, je retourne dans l'espace global, ou elle sera reconnue
            catch(\Exception $erreur){
                echo "Impossible de récupérer le contenu du fichier xml. Erreur ! " . $erreur->getMessage() . "<br> Il y a une erreur à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . "<br>";
            }
        }
        // En dehors du if, car c'est le else
        // Si on deja connecté (le else), alors on va retourner les informations contenus dans $pdo
        return $this->pdo;
    }

    public function selectAllEntityRepo(){
        $data = $this->getPdo()->query("SELECT * FROM $this->table");

        // La même chose en procédural
        // $data = $pdo->query('SELECT * FROM employe');

        // Après avoir fait le queryr je fais obligatoirement le fetch (pour recupérer le résultat du query)
        $afficheTousEmployes = $data->fetchAll(\PDO::FETCH_ASSOC);
        // Je retourne le resultat
        return $afficheTousEmployes;
    }

    // Fonction pour récupérer les entetes des colonnes
    public function getFields(){
        $data = $this->getPdo()->query("DESC " . $this->table);

        $afficheEntetes = $data->fetchAll(\PDO::FETCH_ASSOC);

        return $afficheEntetes;
    }
}

$et = new EntityRepository;
$et->getPdo();