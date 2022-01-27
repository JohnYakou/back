<?php require_once('inc/header.php');

// if($_POST) permet de dire à PHP de ne s'occuper du traitement qui va suivre seulement dans le cas où des informations autont été envoyés dans le formulaire. Sinon, il ne fait  rien.
// Et c'est plutot bien, car au premier chargement de cette page, au moment où je l'affiche, je n'ai encore justement pas rempli le formulaire. Sans cela, j'aurai eu droit à un warning, unidentified $variable ...
if($_POST){
    // Je vérifie deux choses ici. La première, c'est que le champ est bien renseigné (avec isset, s'il ne l'est pas, alors cela engendrera une erreur). Le second paramètre concerne la longueur de chaine de caractère (avec iconv_strlen()). Si elle est inférieur à 3 ou supérieur à 20, cela engendrera une erreur.
    // j'utilise iconv_strlen, mais vous rencontrerez souvent cette même syntaxe avec strlen. C'est un choix de ma part. Je le trouve plus judicieux. Mais l'autre est très utilisé aussi.
    if(!isset($_POST['title']) || iconv_strlen($_POST['title']) <= 3 || iconv_strlen($_POST['title']) > 20){
        // Le message d'erreur qui s'affiche si la donnée n'existe pas, ou si la longueur de la chaine de caractère (string) ne correspond pas
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format Titre/marque !</div>';
    }
    // Je fais la même verification, si la donnée existe, et la longueur de la chaine de caractère, sauf que j'autorise que cette longueur soit ici plus important, dans la mesure où le texte à générer la nécessite (une description)
    if(!isset($_POST['description']) || iconv_strlen($_POST['description']) <= 3 || iconv_strlen($_POST['description']) > 200){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format description !</div>';
    }
    // A nouveau vérification si l'envoi de données a été effectué ou non.
    // J'utilise cette fois un preg_match pour controller la valeur envoyée.
    // Avec cette syntaxe, j'autorise tous les chiffres de 0 à 9[0-9] et je veux obligatoirement 5 chiffres {5} (pas plus, pas moins)
    if(!isset($_POST['code_postal']) || !preg_match("#^[0-9]{5}$#", $_POST['code_postal'])){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format code postal !</div>';
    }
    // Je fais la même verification, si la donnée existe, et la longueur de la chaine de caractère. Ici, la longueur de la chaine de caractère pourra atteindre 30
    if(!isset($_POST['city']) || iconv_strlen($_POST['city']) <= 2 || iconv_strlen($_POST['city']) > 30){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format ville !</div>';
    }
        // A nouveau vérification si l'envoi de données a été effectué ou non.
    // J'utilise cette fois un preg_match pour controller la valeur envoyée.
    // Avec cette syntaxe, j'autorise tous les chiffres de 0 à 9[0-9] et j'autorise ausi 1 seul chiffre (je loue ma voiture 5€/j jusqu'à 7, je vend ma voiture 1M €). De 1, jusqu'à 7 {1,7}
    if(!isset($_POST['price']) || !preg_match("#^[0-9]{1,7}$#", $_POST['price'])){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format tarif !</div>';
    }
    // Vérification du champs sélecteur. En plus de la donnée qui existe, cette donnée ne pourra être différente de 'location' et 'vente'. Si aucune des deux ne correspond, alors message d'erreur
    if(!isset($_POST['type']) || $_POST['type' ] != 'location' && $_POST['type'] != 'vente'){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format type !</div>';
    }

    if(empty($erreur)){
        $ajoutVehicule = $pdo->prepare("INSERT INTO vehicule (title, description, code_postal, city, price, type, created_at) VALUES (:title, :description, :code_postal, :city, :price, :type, NOW())");
        $ajoutVehicule->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $ajoutVehicule->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $ajoutVehicule->bindValue(':code_postal', $_POST['code_postal'], PDO::PARAM_INT);
        $ajoutVehicule->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
        $ajoutVehicule->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
        $ajoutVehicule->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
        $ajoutVehicule->execute();

        $content .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            <strong>Félicitations !</strong>Ajout du véhicule réussie !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
}

?>

<h1 class="text-center text-danger my-5">Ajouter une annonce</h1>

<?= $erreur ?>

<form class="col-md-6 mb-5" method="post" action="">

<p class="mb-2">* Champs obligatoires</p>

    <div class="form-group my-2">
        <label for="title">Titre *</label>
        <input id="title" name="title" type="text" class="form-control" placeholder="La marque de votre véhicule..." required value="">
    </div>

    <div class="form-group my-2">
        <label for="description">Description *</label>
        <textarea id="description" name="description" id="" cols="30" rows="5" class="form-control" placeholder="Une description sincère de l'état du véhicule et de ses équipements !" required></textarea>
    </div>

    <div class="form-group my-2">
        <label for="code_postal">Code postal *</label>
        <input id="code_postal" name="code_postal" type="text" class="form-control" placeholder="code postal" value="" required>
    </div>

    <div class="form-group my-2">
        <label for="city">Ville *</label>
        <input id="city" name="city" type="text" class="form-control" placeholder="Ville" value="" required>
    </div>

    <div class="form-group my-2">
        <label for="price">Tarif *</label>
        <div class="input-group">
            <input id="price" name="price" type="price" class="form-control" placeholder="prix à la location/jour ou prix de vente" required>
            <div class="input-group-append">
                <div class="input-group-text">€</div>
            </div>
        </div>
    </div>

    <div class="form-group my-2">
        <label for="type">Type *</label>
        <select name="type" id="type" class="form-control" required>
            <option value="location" >Location</option>
            <option value="vente" >Vente</option>
        </select>
    </div>

    <button type="submit" class="btn btn-outline-danger mt-5">Créer une annonce</button>
</form>

<?php require_once('inc/footer.php');