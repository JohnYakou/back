<?php

session_start();

require_once('inc/header.inc.php');

$_SESSION['prenom'] = "John";
$_SESSION['statut'] = "utilisateur";

?>

<div>
    <button class='btn btn-primary my-2'><a class='text-light' href='profil.php' target='_blank'>Aller vers le profil</a></button>
</div>




































<?php

require_once('inc/footer.inc.php');