<?php

// Je déclare une méthode qui va prendre un argument
function inclusionAuto($nomDeClasse){
    // Le require_once ci-dessous me permet de récupérer le fichier ou est déclaré la class A, pour effacer l'erreur
    // require_once('A.class.php');

    // Le require_once ci-dessous me permet de maniere dynamique de recupérer tous les noms de fichiers (stockés par spl_autoload_register et envoyés dans l'argument de $nomDeClasse)
    require_once($nomDeClasse. '.class.php');

    // Je fais un var_dump de l'argument $nomDeClasse. Je dis qu'il a bien receptionné la lettre A
    // echo "<pre>"; var_dump($nomDeClasse); echo "</pre>";
    // echo "Ma fonction s'est bien exécutée.";
}

// La fonction prédéfinie spl_autoload_register est programmée pour faire deux choses
// 1. S'exécuter dès qu'un objet est instantié (dès qu'elle lit new dans notre projet)
// 2. stocker en mémoire ce qui suit le mot new (dans cet exemple, la lettre A, mais cela être un nom de classe plus long, un namespace + sa classe ...)
// Je donne en argument a spl_autoload_register le nom de ma fonction
// Ainsi, ma fonction va récupérer dans son argument ($nomDeClasse) ce que a stocké spl_autoload_register après le mot new (A)
spl_autoload_register('inclusionAuto');

// $a = new A;
// $b = new B;
// $c = new C;
// $d = new D;