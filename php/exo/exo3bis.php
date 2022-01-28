<!-- // /* 1- Créer une base de données "contacts" avec une table "contact" :
// 	  id_contact PK AI INT(3)
// 	  nom VARCHAR(20)
// 	  prenom VARCHAR(20)
// 	  telephone VARCHAR(10)
// 	  annee_rencontre (YEAR)
// 	  email VARCHAR(255)
// 	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

// 	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
// 	3- Effectuer les vérifications nécessaires :
// 	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
// 	   L'année de rencontre doit être une année valide
// 	   Le type de contact doit être conforme à la liste des types de contacts
// 	   L'email doit être valide
// 	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

// 	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec. -->

<h1 class="text-center text-danger my-5"  style="text-align: center; background-color:royalblue; font-size:10em;" >Mon Profil</h1>

<?  $erreur=''; 

?>

<form class="col-md-6 mb-5" method="post" action="">
    <p class="mb-2" style="color: red;">* Champs obligatoires</p>

    <div class="form-group my-2">
        <label for="nom">*Nom *</label>
        <input id="nom" name="nom" type="text" class="form-control" placeholder="Votre prénom ici..." required value="">
    </div>

    <div class="form-group my-2">
        <label for="prenom">*Prénom *</label>
        <input id="prenom" name="prenom" type="text" class="form-control" placeholder="Entrer votre prenom SVP..." required value="">
    </div>



    <div class="form-group my-2">
        <label for="telephone">*Télephone *</label>
        <input id="telephone" name="telephone" type="text" class="form-control" placeholder="Téléphone" value="" required>
    </div>


    
    <div class="form-group my-2">
        <label for="email">*Email *</label>
        <input id="email" name="email" type="text" class="form-control" placeholder="Votre Email" value="" required>
    </div>

    <label for="annee_rencontre">*Annee_Rencontre*</label>

     <input type="date" id="annee_rencontre" name="annee_rencontre"
       value="2022-01-28"
       min="2022-01-28" max="2070-12-31">


    

    <div class="form-group my-2">
        <label for="type_contact">Type *</label>
        <select name="type_contact" id="type_contact" class="form-control" required>
            <option value="ami" style="color: purple;">ami</option>
            <option value="famille" style="background-color: red;" >famille</option>
            <option value="professionnel" style="background-color: royalblue;" >professionel</option>
            <option value="autre"  style="background-color: saddlebrown;" >autre</option>
            
            

        </select>
    </div>

    <button type="submit" class="btn btn-outline-danger mt-5" style="background-color:rgb(0, 255, 255);">Votre Profil</button>

</form>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=contacts','root', '',array(
    
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, 
   
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));


if(empty($erreur)){
    
        $content='';

        $ajoutContact = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES (:prenom, :nom,:telephone, :annee_rencontre, :email, :type_contact)");
        $ajoutContact->bindValue(':nom', $_POST['nom']);
        $ajoutContact->bindValue(':prenom', $_POST['prenom']);
        $ajoutContact->bindValue(':telephone', $_POST['telephone']);
        $ajoutContact->bindValue(':annee_rencontre', $_POST['annee_rencontre']);
        $ajoutContact->bindValue(':email', $_POST['email']);
        $ajoutContact->bindValue(':type_contact', $_POST['type_contact']);


        $ajoutContact->execute();
        
       


        $content .= '<div class="alert alert-success alert-dismissible fade show mt-5"
        role="alert">
                    <strong>Félicitations !</strong> Ajout du véhicule réussie !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

    }
    ?>