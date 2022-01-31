<?php require_once('inc/header.php'); 

// Je vérifie que je reçois dans l'URL (avec $_GET) une valeur (avec isset), qu'elle est de type numérique (avec ctype_digit) et qu'elle ne soit pas inférieur à 1 (la valeur minimal pour un id auto-incrémenté)
if(!isset($_GET['id']) || !ctype_digit($_GET['id']) || $_GET['id'] < 1){
    // Si ce n'est pas le cas, j'empache d'acceder à la page show.php avec une mauvaise valeure en renvoyant vers la page list.php
    // On renvoi vers une autre page avec un header('location:versAutrePage.php')
    // header étant la fonction prédifinie, et location le parametre à lui donner, complété du nom du fichier vers lequel on veut rediriger
    header('location:list.php');
}

if($_POST){
    // Je verifie le contenu du champs reservation_message
    // Qu'il existe, qu'il n'a pas recu moins de 3 caracteres et plus de 200, sinon je genère un message d'erreur
    if(!isset($_POST['reservation_message']) || iconv_strlen($_POST['reservation_message']) < 3 || iconv_strlen($_POST['reservation_message']) > 200){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format message !</div>';

    }

    // Si aucune message d'erreur n'a ete genere, c'est que $erreur n'a pas recu de contenu, je peux donc enclencher la procedure d'envoi de donnees en BDD
    if(empty($erreur)){
        // J'utilise mon objet $pdo pour interagir avec la BDD
        // Je fais une requete prepare pour securiser l'envoie des donnees
        // Je vais faire une modification en BDD, d'ou l'usage de la requete UPDATE
        // Je fais correspondre les indices concernes en BDD avec son equivalent avec un marqueur nomme (le :)
        // Le WHERE va faire correspondre le vehicule qui a cet id (dans cet page) avec le vehicule qui a le meme id en BDD
        $ajoutMessage = $pdo->prepare("UPDATE vehicule SET id = :id, reservation_message = :reservation_message WHERE id = :id");
        // Je code les bindValue pour faire correspondre l'indice/le pointeur nomme ( : ) avec la valeur recue du formulaire + j'indique le type de cette valeur (PARRAM_INT pour le type integrer en parametre)
        $ajoutMessage->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $ajoutMessage->bindValue(':reservation_message', $_POST['reservation_message'], PDO::PARAM_STR);
        // Une fois les bindValue scriptes, j'execute ma requete prepare (obligatoirement)
        $ajoutMessage->execute();
    }
}

// Avec l'objet $pdo je vais pouvoir aller selectionner tout ce qui concerne le cehicule. Je le fait avec une requette de type query
// Je demande à $pdo de cibler l'id qui sera égal, similaire à l'id récupéré dans l'URL ($_GET['id'])
$afficheInformations = $pdo->query("SELECT * FROM vehicule WHERE id=$_GET[id] ");

// A present, avec fetch, je vais chercher les informations concernees par la requette SELECT juste en haut
// Je suis obligé de procéder en deux étapes. D'abord le SELECT, puis le fetch
$information = $afficheInformations->fetch(PDO::FETCH_ASSOC);
// Desormais, je dispose de toutes les valeurs stockees en BDD, il ne me restera plus qu'a crocheter au bon indice du tableau

// Je calcul le delai entre le jour ou l'utilisateur voit l'annonce et le jour ou elle a ete publiee
// La date de publication je peux l'obtenir en crochetant à l'indice ['created_at'] present en base de donnees
// Je dois utiliser strtotime() pour convertir cette valeur, qui est stocke en tant que string vers un type numerique
// Cette valeur, desormais numerique aura comme unite de valeur des secondes
$date_debut = strtotime($information['created_at']);
// La date d'aujourd'hui, je la recupere avec time() (exprime en seconde)
$date_fin = time();
// Je vais donc soustraire lavaleur de date_fin à date_debut, puis convertir ce rersultat exprime en seconde, en jours. Pour cela, je divise ce nombre par 86400
// 86400 -> 60(secondes) x 60(minutes) x 24(heures)
// J'utilise la fonction round() pour arrondir le resultat de cette soustraction, au chiffre en dessous
// Il existe une autre fonction pour arrondir au chiffre superieur, c'est ceil()
$delai = round(($date_fin - $date_debut) / 86400);
?>

<!-- Je crochète à l'indice du tableau dont j'i besoin pour avoir un <h1> dynamique. Le titre généré sera différent selon la voiture sur laquelle on aura cliqué -->
<h1 class="text-center text-danger my-5">Voiture <?= $information['title']?> en <?= $information['type']?></h1>

<?= $erreur ?>

<a href="list.php"><button class="btn btn-outline-danger">Retour à la liste des biens</button></a>
<hr>
<div class="card col-md-6 my-5 border border-warning text-center">
    <div class="card-header">
        <!-- Pareil que pour le <h1>, je crochete a l'indice du tableau qui m'interese -->
    Le véhicule <?= $information['title']?> est disponible à <?= $information['city'] ?> (code postal : <?= $information['code_postal']?>)
    </div>
    <div class="card-body">
        <h5 class="card-title">Ce véhicule est proposé à la  <?= $information['type']?> au prix de 
        <!-- Je fais une condition pour avoir un affichage different pour le prix selon que c'est une vente  ou une location -->
        <?php if($information['type'] == 'vente'){
            echo $information['price'] .  " €";
        }else{
            echo $information['price'] . " €/j";
        }
         ?>

        <!-- Ci-dessous, la meme condition if, en syntaxe contractee -->
        <!-- <?php if($information['type'] == 'vente'): ?>
            <?= $information['price'] . " €" ?>
        <?php else: ?>
            <?= $information['price'] . " €/j" ?>
        <?php endif; ?> -->

        </h5>
        <p class="card-text"></p>
    </div>


    <div class="card-footer text-muted">
        <!-- Je fais une condition pour prendre en compte deux cas de figure -->
        <!-- Si le nombre de jours ecoules depuis la publication de l'annonce est egal à 0... -->
        <?php if($delai == 0): ?>
            <!-- ...alors je ne veux pas afficher "0 jours", mais "aujourd'hui" -->
            <p>Cette annonce a été postée aujourd'hui</p>
        <!-- Pour tous les autres cas de figure (1 jour, 2 jours, 30 jours se sont ecoules), il affiche la valeur trouvee dans $delai -->
        <?php else : ?>
        <p>Annonce postée il y a <?= $delai ?> jour(s)</p>
        <?php endif; ?>
    </div>

    <!-- J'ajoute une condition ici car j'ai pour l'instant deux messages contradictoires en FRONT -->
    <!-- Selon que le vehicule soit reserve ou non, seul un des deux messages doit apparaitre -->
    <!-- Si le vehicule est reserve, le message du heut ainsi que le formulaire pour reserver doivent disparaitre -->
    <!-- Si le vehicule n'est pas reserver, alors c'est le message du bas qui ne doit plus s'afficher, seulement celui du haut ainsi que le formulaire -->
    <?php if(empty($information['reservation_message'])): ?>
    
        <p>
            <strong>
                Ce véhicule n'est pas réservé ! Soyez les premiers à laisser un message afin que le propriétaire vous recontacte.
            </strong>

            <form class="mx-5" action="" method="post">
                <!-- Je recupere l'id du vehicule ici, pour envoyer cette information dans le if($_POST), pour que PHP sache quel id du vehicule il doit modifier en BDD -->
                <!-- Je le met en type=hidden car cet input ne doit pas apparaitre en affichage. J'en ai besoin pour transmettre l'information au ($_POST), mais il ne doit surtout pas apparaitre, au risque d'entrainer des modifications non-voulus en BDD -->
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="form-group">
                    <label for="formReservationMessage">Message de réservation</label>
                    <textarea name="reservation_message" id="formReservationMessage" rows="5" class="form-control" placeholder="Donnez un maximum de coordonnées pour que le propriétaire vous recontacte !"></textarea>
                </div>

                <button class="btn btn-outline-danger mt-3">Je réserve ce véhicule !</button>
            </form>
        </p>
    
        <?php else: ?>
        <div class="alert alert-warning">
            <p>
                Ce véhicule a été reservé, voici le message du futur conducteur :
                <hr>
                <em><?= $information['reservation_message'] ?></em>
            </p>
        </div>

        <?php endif; ?>
    
</div>

<?php require_once('inc/footer.php');