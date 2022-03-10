<?php

// La but de la fonction recherche est de rechercher, dans un tableau (premier argument attendu), un element (second argument à lui fournir)
function recherche($tab, $element){
    // Si le premier argument n'est pas un tableau, je génère un message d'erreur
    if(!is_array($tab))
        // throw va permettre d'envoyer le message d'erreur dans le bloc catch (que l'on n'a pas encore codé)
        // La classe Exception génère un message de type particulier
        throw new Exception("Ce n'est pas un tableau.");

    // Si le tableau ne contient pas de donnée(s), je génère un message d'erreur
    // A la place de sizeof, on aurait pu utiliser count()
    if(sizeof($tab) == 0)
        throw new Exception("Ce tableau ne contient pas de données.");

    // Arguments inverse par rapport à la fonction recherche()
    // Si $tab représente bien un tableau et si il contient bien des données, alors array va me retrouver cet element dans mon tableau, me donner son indice, que je conserve dans $position
    $position = array_search($element, $tab);
        // Je fais un return de $position pour récupérer l'indice
        return $position;
}

// Déclaration d'un tableau sans donnée
$tableau = array();
// Déclaration d'un tableau avec des données
$tabPersonnages = array('Mario', 'Bowser', 'Toad', 'Peach', 'Luigi', 'Yoshi');

// print_r du second tableau, pour vérifier les indices de nos perso
echo "<pre>"; print_r($tabPersonnages); echo "</pre>";


// bloc try pour tester mon code
try{
    // Je teste mon code, et je vois s'il respecte les conditions de la fonction recherche()
    // Celui-ci fonctionne, il me retourne l'indice du personnage Toad
    echo "Le personnage de Toad possède l'indice " . recherche($tabPersonnages, 'Toad') . '<br>';

    // Nouveau test, avec le premier tableau, $tableau
    // Celui-ci ne fonctionne pas, car c'est un tableau vide
    echo "Le personnage de Toad possède l'indice " . recherche($tableau, 'Toad') . '<br>';
}

// bloc catch qui s'execute si le try ne respecte pas les conditions
catch(Exception $erreur){
    // Malgré que le second test n'a pas fonctionné, je n'ai pas recu de message d'erreur
    // Si je fais un print_r de $erreur, je m'aperçois que le message d'erreur codé => throw new Exception("Ce tableau ne contient pas de données.") => a bien été récupéré dans l'argument $erreur
    // Je dois en fait codé un message d'erreur dans mon bloc catch pour récupérer =>         throw new Exception("Ce tableau ne contient pas de données.")

    // echo "<pre>"; print_r($erreur); echo "</pre>";

    // echo "<pre>"; print_r(get_class_methods($erreur)); echo "</pre>";

    // Avec le get_class_methods (au-dessus), je vois l'objet $erreur a sa disposition une méthode pour récupérer le message stocké (getMessage), récupéré la ligne ou l'erreur a été comise (getLine) et récupéré le nom du fichier ou il y a l'erreur (getFile)
    // Je peux ainsi générer un message plus précis (a mettre en forme dans le fichier style.css, en lui donnant, par exemple, bgcolor rouge, centrant le texte, lui donner une font-weight bold ...)
    echo "<div style=> ERREUR ! " . $erreur->getMessage() . "<br> Cela ne respecte pas le code à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . "<br>";
}

echo "<br>";

// Second exemple, je teste dans le try, la connexion à ma BDD
try{
    // Si elle est réussi, le echo du try va s'afficher...
    $pdo = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_prenom', 'root', '');
    echo "Connexion établie avec la base de données";
}

catch(PDOException $erreur){
    // echo "<pre>"; print_r($erreur); echo "</pre>";
    // echo "<pre>"; print_r(get_class_methods($erreur)); echo "</pre>";

    // ... mais si ma connextion échoue, ce message va s'afficher, en me donnant la ligne ou j'ai tenté de la faire, que je devrai aller corriger
    echo "Erreur base de donnée inconnue / " . $erreur->getMessage() . "<br> Cela ne respecte pas le code à la ligne " . $erreur->getLine() . " du fichier " . $erreur->getFile() . "<br>";

}