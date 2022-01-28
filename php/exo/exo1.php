<!-- Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, Allemagne, Inconnu auxquels vous associez les valeurs suivantes : Paris, Rome, Madrid, Berlin, '?' -->
<!-- Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et le Y le pays). -->
<!-- Pour Inconnu, vous afficherez "Ca n'existe pas !" à la place de la phrase précédente. -->

<?php

// $listePays[] = "France";
// $listePays[] = "Italie";
// $listePays[] = "Espagne";
// $listePays[] = "Allemagne";
// $listePays[] = "Inconnu";

// $capitale[] = "Paris";
// $capitale[] = "Rome";
// $capitale[] = "Madrid";
// $capitale[] = "Berlin";
// $capitale[] = "?";

// foreach($listePays as $key => $value){
//     echo "<p>L'indice " . $key . " a pour valeur le pays " . $value . "</p>";
// }

// echo "<p>La capitale " . $capitale[0] . " se situe en " . $listePays[0] . "</p>";

// echo "<p>La capitale " . $capitale[1] . " se situe en " . $listePays[1] . "</p>";

// echo "<p>La capitale " . $capitale[2] . " se situe en " . $listePays[2] . "</p>";

// echo "<p>La capitale " . $capitale[3] . " se situe en " . $listePays[3] . "</p>";

// echo "<p>Ca n'existe pas !</p>";

// CORRECTION

$pays = array(
    // Paris, Rome ... sont des value
    'France' => 'Paris',
    'Italie' => 'Rome',
    'Espagne' => 'Madrid',
    'Allemagne' => 'Berlin',
    'Inconnu' => '?'
);

// Affiche les informations d'une variable 
var_dump($pays);

// Compte les valeurs de ma variable
echo count($pays);

foreach($pays as $key => $value){
    if($key == 'Inconnu'){
        echo "Ce pays n'existe pas !";
    }else{
        echo "<p>La capitale " . $value . " se situe en " . $key . "</p>";
    }
}


?>