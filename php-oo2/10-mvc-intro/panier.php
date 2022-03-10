<?php

// J'ouvre une session (pour récupérer ce qu'il y a dans le panier)
session_start();

// La bonne position (pas en bas)
// if(isset($_GET['action']) && $_GET['action'] == "delete"){
//     unset($_SESSION['panier']);
// }


// Si quelqu'un clique sur "créer le panier" (et que je récup dans l'URL une action = create) ou si une session panier existe deja, alors j'affiche le contenu de mon panier (les indices 26, 27 et 28, séparés par le tiret dans mon implode()). J'afficherais aussi un lien pour vider le panier
if(isset($_GET['action']) && $_GET['action'] == "create" || isset($_SESSION['panier'])){
    $_SESSION['panier'] = array(26, 27, 28);
    echo "Indices de produits présents dans le panier : " . implode('-', $_SESSION['panier']) . '<br>';

    echo "<a href='?action=delete'>Vider le panier</a>";
}else{
    // Si par contre personne n'a cliqué sur le lien "créer le panier" et qu'aucune session panier n'existe, alors j'affiche le lien, "créer le panier"
    // C'est le cas lorsqu'on affiche pour la premiere fois cette page
    echo "<a href='?action=create'>Créer le panier</a>";
}

// Si une action est passée dans l'URL et qu'elle est égale à delete, alors, je vide le panier avec unset()
// En l'état actuel, ce code est mal organisé. Je suis obligé de cliquer deux fois sur "vider le panier" pour que l'affichage du tableau soit retiré et que le bouton "créer le panier" s'affiche à nouveau
// Il aurait fallu que la condition ci-dessous soit codée en haut du fichier (en dessous de session_start)
if(isset($_GET['action']) && $_GET['action'] == "delete"){
    unset($_SESSION['panier']);
}