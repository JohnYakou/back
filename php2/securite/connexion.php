<?php
$pdo = new PDO('mysql:host=localhost;dbname=securite', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
// en cas d'envoi de données dans le formulaire (if($_POST))
if($_POST){
    // avec cette requete, je vais aller comparer le pseudo envoyé dans le formulaire avec un pseudo similaire existant en BDD
    $_POST['pseudo'] = htmlentities($_POST['pseudo'], ENT_QUOTES);
    $_POST['mdp'] = htmlentities($_POST['mdp'], ENT_QUOTES);

    $rechercheMembre = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' AND mdp = '$_POST[mdp]' ");   

    $membre = $rechercheMembre->fetch(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page connexion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <h1 class="my-5 text-center">Espace Connexion</h1>

    <form class="py-5 ms-5" method="post">
        <div class="mb-3 col-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
        </div>
        
        <div class="mb-3 col-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Votre mot de passe">
        </div>

        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>

    <?php if($_POST): ?>
        <h2 class="my-5 text-primary ms-5">Votre Profil</h2>
        <?php if(!empty($membre)): ?>
            <?= print_r($rechercheMembre) ?>
            <h3 class="text-success ms-5">Félicitations, vous etes connecté</h3>
            <p class="ms-5">Vous etes: <?= $membre['pseudo'] ?></p>
            <p class="ms-5">Votre email est: <?= $membre['email'] ?></p>
        <?php else: ?>
            <h3 class="text-danger ms-5">Votre connexion a échoué</h3>
        <?php endif ?>
    <?php endif; ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>





