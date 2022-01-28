<!-- 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK (Primary Key) AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec. -->

<?php

$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));

if($_POST){
    if(!isset($_POST['nom']) || iconv_strlen($_POST['nom']) <= 2 || iconv_strlen($_POST['nom']) > 20){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format nom !</div>';
    }
    if(!isset($_POST['prenom']) || iconv_strlen($_POST['prenom']) <= 2 || iconv_strlen($_POST['prenom']) > 20){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format prénom !</div>';
    }
    if(!isset($_POST['telephone']) || !preg_match("#^[0-9]{10}$#", $_POST['telephone'])){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format téléphone !</div>';
    }
    if(!isset($_POST['annee_rencontre']) || iconv_strlen($_POST['annee_rencontre']) <= 2 || iconv_strlen($_POST['annee_rencontre']) > 30){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format année !</div>';
    }
    if(!isset($_POST['email']) || iconv_strlen($_POST['email']) <= 2 || iconv_strlen($_POST['email']) > 25){
        // if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format email !</div>';
    }
    if(!isset($_POST['type_contact']) || iconv_strlen($_POST['type_contact']) <= 2 || iconv_strlen($_POST['type_contact']) > 25){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format email !</div>';
    }

    if(empty($erreur)){
        $contact = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES (:nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)");
        $contact->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $contact->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $contact->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $contact->bindValue(':annee_rencontre', $_POST['annee_rencontre'], PDO::PARAM_STR);
        $contact->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $contact->bindValue(':type_contact', $_POST['type_contact'], PDO::PARAM_STR);
        $contact->execute();

        $content .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            <strong>Félicitations !</strong>Ajout du véhicule réussie !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
}

?>

<form method="post" action="">
<div class="mb-3">
    <label for="nom" class="form-label">Votre nom : </label>
    <input type="text" class="nom" id="nom">
  </div>

  <div class="mb-3">
    <label for="prenom" class="form-label">Votre prénom : </label>
    <input type="text" class="prenom" id="prenom">
  </div>

  <div class="mb-3">
    <label for="telephone" class="form-label">Votre numéro de téléphone : </label>
    <input type="text" class="telephone" id="telephone">
  </div>

  <div class="mb-3">
    <label for="annee_rencontre" class="form-label">Année de rencontre : </label>

    <?php
        echo "<form>";
            echo "<select>";
            echo "<option>Sélectionnez l'année : </option>";
            for($annee = date('Y'); $annee >= date('Y') - 100 ; $annee--){
                echo "<option>$annee</option>";
            }
            echo "</select>";
        echo "</form>";
    ?>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Votre adresse email : </label>
    <input type="email" class="form-control" id="email">
  </div>

  <div class="mb-3">
    <label for="type_contact" class="form-label">Type de contact : </label>

    <?php
        echo "<form>";
            echo "<select>";
            echo "<option>Sélectionnez le type de contact</option>";
                echo "<option value='ami'>Ami</option>";
                echo "<option value='famille'>Famille</option>";
                echo "<option value='professionnel'>Professionnel</option>";
                echo "<option value='autre'>Autre</option>";
            echo "</select>";
        echo "</form>";
    ?>
  </div>

  <button type="submit" class="btn btn-outline-danger mt-5">Envoyer</button>
</form>