<?php

$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));

$erreur = "";

if($_POST){
    // syntaxe pour un preg_match() qui permet les caracteres speciaux . _ et -
    if(!isset($_POST['pseudo']) || !preg_match("#^[a-zA-Z0-9._-]{1,20}$#", $_POST['pseudo'])){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format pseudo</div>';
    }

    if(!isset($_POST['message']) || iconv_strlen($_POST['message']) < 2 || iconv_strlen($_POST['message']) > 300){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format message</div>';
    }

    if(empty($erreur)){
        $ajoutMessage = $pdo->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES (:pseudo, :message, NOW()) ");

        $ajoutMessage->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $ajoutMessage->bindValue(':message', $_POST['message'], PDO::PARAM_STR);

        $ajoutMessage->execute();
    }
}

$requeteCommentaires = $pdo->query("SELECT * FROM commentaire");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<h1 class="my-5 text-center">Espace de dialogue</h1>

<?= $erreur ?>

<form class="py-5 ms-5" method="POST" action="">

    <div class="mb-3 col-3">
    <label for="pseudo" class="form-label">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Votre pseudo">
    </div>

    <div class="mb-3 col-3">
    <label for="message" class="form-label">Message</label>
    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Votre message"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
    
</form>

<div class="ms-5">
    <h2>Tous les messages envoyés</h2>
    <div class="blockquote col-md-6 offset-md-1 p-5 text-justify shadow mt-5 bg-white
    rounded">
        <h3 class="mb-5">Par : . Posté le :</h3>
        <p>Commentaire :</p>
        <p></p>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>