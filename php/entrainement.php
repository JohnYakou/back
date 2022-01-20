<?php

require_once('inc/header.inc.php');
// Chapitre 1 - Affichage

print "Bonjour <br>";
// Ces deux instructions servent a afficher du contenu. Mais on va utiliser tout le temps echo. Plus arpide à l'éxecution.

echo "Bonjour <br>";
// Je peux aussi afficher avec de simple quotes. Pas obliger des doubles quotes.
// Je dois terminer toutes mes instructions avec ; OBLIGATOIRE
echo "Salut <br>";

?>

<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, fugiat mollitia! Pariatur suscipit soluta magnam possimus omnis minus asperiores, ad dignissimos et nemo rem veniam ut reiciendis quas unde sit eos quisquam nihil. Autem vel modi aliquam, aperiam earum adipisci, sed placeat quisquam harum maxime voluptatum! Sunt rerum itaque sit?</p>

<!-- Cette syntaxe ci-dessous correspond à un passage PHP contarté. Nous l'utiserons moins, mais il sera très pratique pour des cas particulier, je n'ai pas besoin de l'instruction echo pour obtenir un affichage. -->
<?= "C'est lundi" ?>

<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, fugiat mollitia! Pariatur suscipit soluta magnam possimus omnis minus asperiores, ad dignissimos et nemo rem veniam ut reiciendis quas unde sit eos quisquam nihil. Autem vel modi aliquam, aperiam earum adipisci, sed placeat quisquam harum maxime voluptatum! Sunt rerum itaque sit?</p>

<?php
// Permet d'écrire un commentaire sur une ligne

/* Permet d'écrire du commentaire
sur plusieurs lignes */

// Je mélange des balises html dans du php

echo "<strong>C'est l'année 2022</strong>";
echo "<h1>C'est l'accueil de mon site</h1>";
?>

<!-- Attention cependant à ne pas faire trop d'allers retours de l'un vers l'autre tel que ci-dessous. C'est le début d'un code "sale" -->

<h1> <?php echo "Ceci est ma première page" ?></h1>

<?php

// Chapitre 2 - Les variables

// Je nomme ma variable. Je lui affecte une valeur grace au signe égal.
// Une variable ne peut débuter par un chiffre (il peut y en avoir un par la suite, mais pas au début). Si elle commence par un chiffre, tout le code sera interrompu.
// Pas de caractère spéciaux. Le code fonctionnera, mais par convention ; pas d'accents, de @, de /, ...
$prenom = "Fred <br>";
echo $prenom;

$couleur = "orange";
// echo $couleur;

// Je peux changer la valeur de ma variable
$prenom = "John <br>";
echo $prenom;

// Les types de varibles

$prenom = "John";
$entier = 23;
$decimal = 2.52;
$booleen = TRUE;

echo gettype($prenom) . "<br>";
echo gettype($entier) . "<br>";
echo gettype($decimal) . "<br>";
echo gettype($booleen) . "<br>";

// Les constantes

// Le constante doit être déclarée avec la fonction prédéfinie define()
// Le premier argument qu'elle attend est le nom de cette constante. Obligatoirement en maj.
// Le second argument sera la valeur de la constante. Ici, Gonesse.
define('VILLE', 'Gonesse');
echo VILLE . "<br>";

// ERREUR !! La constance VILLE existe déjà
/* define('VILLE', 'Paris');
echo VILLE; */

// Je choisirai la constante plutot que la variable, si je veux protéger cette valeur de toutes modification ultérieure. Si je suis sûr que cette valeur sera la même quelque soit x, et si en plus je dois empécher quiconque de la modifier par mégarde, alors je vais l'affecter à une constante.
// Ca sera le cas par exemple pour le chemin vers le dossiers où je veux uploader toutes les photos au bon fonctionnement de mon site.
// Ca sera le chemin vers mno dossier /img/ tout le temps et pas ailleurs.
// Alors, autant protéger ce chemin dans une constante.

// Les constantes magiques

/* echo__FILE__ . "<br>";
echo__LINE__ . "<br>"; */

// Chapitre 3 - Concaténation et syntaxe

echo "Je m'appel " , $prenom , " et ma couleur préférée est le " , $couleur , "<br>";

// Ca marche aussi avec des points
echo "Je m'appel " . $prenom . " et ma couleur préférée est le " . $couleur . "<br>";

$nombre1 = 45;
$nombre2 = 36;
// .= permet de concaténer par affectation. Je concaatène avec le point, et j'affecte une nouvelle valeur avec le =
echo $nombre1 .= $nombre2 . "<br>";
// Attention en faisant cela, vous perdez la valeur première de ùnombre 1 (qui était de 45)
// Vérifier le avec le echo ci-dessous
echo $nombre1 . "<br>";
// Si vous avez besoin de conserver la valeur d'origine, alors il faudrait mieux déclarer une nouvelle variable qui prendra la valeur concaténée comme ci-dessous
// $nombre3 = $nombre1 + $nombre2;
// echo $nombre1;

// Différences entre simples quotes et double qoutes

echo "Aujourd'hui, c'est lundi <br>";
echo "Il a dit \"personne ne bouge !\" <br>";
// Pour les ' ', il y aura parfois de besoin du \ pour que votre code continu à être valide. Voir ci-dessous. Sans les \, PHP pense que je ferme ma chaîne de caractère alors que c'est unee apostrophe dans le mot auojourd'hui.
echo 'Aujourd\'hui, c\'est lundi <br>';

// Autres différences
echo "Ton prénom est  $prenom <br>";
// Selon que j'utilise doubles ou simples quotes, ma variable sera interprétée dans le premier cas. Mais pas dans le deuxième, elle devient un simple élément de la chaîne de caractères.
echo 'Ton prénom est $prenom <br>';

// Chapitre 4 - Les opérations arithmétiques

$premierNombre = 4;
$secondNombre = 2;

echo $premierNombre + $secondNombre . "<br>";
echo $premierNombre - $secondNombre . "<br>";
echo $premierNombre * $secondNombre . "<br>";
echo $premierNombre / $secondNombre . "<br>";

// Il en existe deux autres, le modulo et l'exponentiation

// Le modulo permet de connaitre le reste de la division
echo $premierNombre % $secondNombre . "<br>";
// L'exponentiation permet d'affecter la puissance du second au premier. Dans ce cas, 4 puissance 2 ou 4 au carré (4²).
echo $premierNombre ** $secondNombre . "<br>";

// Je peux faire des opérations avec des opérateurs d'affectation (+=, -=, *=, /=)
// ATTENTION : comme pour tout à l'heure avec .= ce n'est pas une simple opération? Je réaffecte automatiquement une nouvelle valeuret je perd donc celle d'origine.
// Le <br> n'est pas concaténer à la suite mais positionné en dessous volontairement pour ne pas générer un warning PHP.
echo $premierNombre += $secondNombre;
echo "<br>";

// Chapitre 5 - Les conditions

$a = 22;
$b = 30;
$c = 48;
$d = 55;
$e = 60;

// 1re condition avec if/else
if($a > $b){
    echo 'Vrai, $a est bien supérieur à $b'; 
}else{
    echo 'Faux, $a est inférieur à $b <br>';
}

// 2ème condition avec le comparateur && (AND)
// && oblige à ce que les deux conditions soient vraies pour qu'il entre dans le TRUE
if($a > $b && $b < $c){
    echo "Vrai, les deux conditions sont vraies.";
    // $a n'étant pas supérieur à $b, et même si $b est bien inférieur à $c, alors il va entrer dans le else, le FALSE
}else{
    echo "Faux, au moins une des deux conditions n'est pas vraie <br>";
}

// 3ème condition avec || (OR)
// Cette fois, si j'ai une des deux conditions qui est vraie, alors il va se diriger vers le premier bloc d'instruction.
if($a > $b || $b < $c){
    echo "Vrai, au moins une des deux conditions est vraies. <br>";
}else{
    echo "Faux, aucunes conditions n'est vraies.";
}

// 4ème condition avec le XOR
// XOR est appelé le OU exclusif. Si je décide de lui soumettre deux conditions, il faudra absolument qu'il y en ai une TRUE et une FALSE.
// Si les deux sont TRUE ou FALSE, il se dirigera obligatoirement vers le else, comme dans le cas ci-dessous. 
if($a == 22 XOR $b == 30){
    echo "Vrai, une seule des deux conditions est vraies.";
}else{
    // XOR se dirige vers else, car $a est bien égal à 22 et $b est aussi égal à 30.
    echo "Faux, les deux conditions sont vraies. <br>";
}

// 5ème condition avec l'aternative elseif, positionné entre la première condition et le else.
if($a > $b){
    echo 'Vrai, $a est bien supérieur à $b.';
    // La condition du dessus étant fausse, ilse dirige vers le elseif pour vérifier cette nouvelle condition qui lui ai proposée. Il va donc vérifier si celle-ci est TRUE ou FALSE, a son tour.
    // Ce-dessous, le ! signifie NOT, le "contraire de". Avec = à ses cotés, on pourrait le traduire par "différent de".
}elseif($a != 22){
    echo 'Vrai, $a est différent de 22.';
    // La condition du elseif étant aussi fausse, il dévie vers le else.
}else{
    echo "Aucune des deux conditions n'est vraies. <br>";
}
// Dans le cadre d'un if/elseif, il est obligatoire de coder le else. Pas comme pour un if/else basique.

// 6ème condition avec une forme contractée du if/else, aussi appelée ternaire.
// ? = if | : = else
// Avec une ternaire, on commence avec la condition ($d > $e) puis arrive le if (?). Juste après, c'est le bloc d'instruction à éxécutersi c'est TRUE. Si je n'entre pas dans le TRUE, alors je me dirige vers le else (:) et j'exécute l'instruction.
echo ($d > $e) ? 'Vrai, $d est bien supérieur à $e' : "Faux <br>";

// 7ème condition avec == et ===

$var1 = 100;
$var2 = '100';

// Dans ce cas, on va entrer dans le TRUE car == va comparer les valeurs.
if($var1 == $var2){
    echo "Vrai, elles ont la même valeur. <br>";
}else{
    echo "Faux, leurs valeurs sont différentes.";
}

// Dans ce cas, on entrer dans le FALSE car === va aussi comparer leur type (1 intégrer vs 1 string).
if($var1 === $var2){
    echo "Vrai, elles ont la même valeur et le même type.";
}else{
    echo "Faux, leurs valeurs sont similaires, mais pas le type. <br>";
}

// 8ème condition avec la fonction prédéfinie isset()

// isset() est une instruction qui permet de tester si l'élément soumit existe ou non.
// Je pourrai aussi tester si !isset(), c'est-à-dire n'existe pas.
if(isset($test)){
    echo "Vrai, cette variable existe.";
}else{
    // Dans la mesure où elle n'a pas été déclarée préalablement, j'entre dans le else ... c'est FALSE
    echo "Faux, cette variable n'existe pas. <br>";
}

// 8-bis, syntaxe contractée
// Ce-dessous, pour s'habituer à la syntaxe ternaire, la même condition que celle au-dessus
echo (isset($test)) ? "Vrai, cette variable existe" : "Faux, cette variable n'existe pas. <br>";

// 9ème condition avec le switch

$couleur = "bleu";
// Elle est équivalente à if/elseif. Et plus rapide à l'execution si j'ai trop de elseif à tester (en temps relatif).
switch($couleur){
    case "vert" :
        echo "La couleur est bien verte.";
        // Le break doit être codé, car même si la condition est vraie, il va passer à la condition suivante, sans s'arrêter et afficher ce qui correspond au TRUE.
        break;
    case "rouge" :
        echo "La couleur est bien rouge.";
        break;
    case "bleu" :
        echo "La couleur est bleue. <br>";
        break;
    default : 
        echo "Aucunes couleurs ne correspond.";
        break;
}

// La même en if/elseif
if($couleur == "vert"){
    echo "La couleur est verte.";
}elseif($couleur == "rouge"){
    echo "La couleur est rouge.";
}elseif($couleur == "bleu"){
    echo "La couleur est bleue. <br>";
}else{
    echo "Aucunes couleurs ne correspond.";
}

// Chapitre 6 - Les fonctions prédéfinies
// Un accent compte comme 1 caractère pour strlen (mais pas pour iconv_strlen).

$phrase = "Je m'appel John et j'habite à Gonesse.";
// strlen et iconc_strlen servent toutes les deux à calculer la longueur d'une chaîne de caractères.
echo iconv_strlen($phrase) . "<br>";
echo strlen($phrase) . "<br>";

$phrase2 = "étés";
// La différence entre les deux c'est que strlen va aussi compter les caractères spéciaux alors que iconv_strelen non.
// Concrètement, avec l'exemple ci-dessous, strlen va compter 6 caractères (avec les deux accents) alors que iconv_strlen va en trouver 4.
// Il faudrat donc décider du moment où on va plutot utilier l'une et pas l'autre.
echo iconv_strlen($phrase2) . "<br>";
echo strlen($phrase2) . "<br>";

// Fonction prédéfinie substr()

// substr() permet de couper un morceau d'une chaîne de caractères. Elle permet de n'en garder qu'une partie.
// Ce-dessous, je décide de couper ma phrase du haut en sa moitié. Je sais que sa longueur est de 38 (avec iconv_strlen).
// Je vais donner trois arguments à ma fonction. Le premier, c'est la variable qu'elle doit traiter. Le second, c'est le point de départ (tout retirer avant) et en dernier, mon point d'arrivée (tout retirer après). Comme je veux garder la moitié et que je sais qu'elle fait 38 caractères, je décide de supprimer tout ce qui vient après le 19ème caractères.
echo substr($phrase, 0, 19) . "<br>";

// Ci-dessous, je veux retirer le pluriel du mot étés. Pour cela, mon point d'arriver sera négatif (avec un -). Cela signifie que je vais partir de la fin, et retirer le dernier (-1).
// Si j'avais voulu retirer les deux derniers, j'aurais écrit -2 ...
echo substr($phrase2, 0, -1) . "<br>";

// Fonction prédéfinie date() permet de récupérer la date du jour et selon les arguments que je lui donne, le format qui apparaitra au final pourra différer. Je peux ne demander que le jour, le mois ou l'année. Je ne suis pas obliger de récupérer la totalitée des informations. Elle nous sera utile pour, par exemple, connaitre la date où le client a passé sa commande.
echo date("d / m / Y") . "<br>";
echo date("D / M / y") . "<br>";

// Fonction prédéfinie empty() permet de vérifier si une variable a reçu un contenu. Si une valeur lui a été affectée. C'est différent du isset() qui vérifie si la variable a été déclarée (si elle existe)
// empty() verifie si un contenu a été affecté.

if(empty($phrase)){
    echo "Vrai, cette variable n'a pas de contenu.";
}else{
    echo "Faux, cette variable n'est pas vide. <br>";
}

// Chapitre 7 - Les fonctions utilisateur ou développeur

// Ce sont celles qui ne sont pas fournis par PHP, et que je vais coder, pour un besoin précis.
// Celle ci-dessus prend un argument ($prenom). Et c'est un argument que je devrais lui renseigner au moment de son exécution ("John").
function salut($prenom){
    echo "Bonjour " . $prenom . "<br>";
}
salut("John");

// Fonction pour calculer le prix d'un produit TVA comprise
// Fonction que je vais compliquer progressivement pour la rendre plus intéressante
// Cette première fonction ne prend aucune argument.
// Son résultat est figé. Il n'est pas modulable pour l'instant

// calculTva
function calculTva(){
    // Ici, elle va me calculer le prix TTC (en appliquant une TVA de 20%) à un produit qui coûte 100€ HT
    return 100*1.2;
}

echo calculTva() . "<br>";
// Le résultat sera toujours 120€.

// Celle-ci va me permettre d'appliquer un taux de 20%, mais à différent produits qui ont différents prix.
// Elle prend donc un argument, le prix. Valeur que je renseignerai au moment de son exécution (dans le echo en bas).
// calculTva2
function calculTva2($prix){
    return $prix*1.2;
}

echo calculTva2(55) . "<br>";
echo calculTva2(155) . "<br>";

// Ma fonction évolue, elle peut désormais calculer différents taux de ma TVA (20% et 5%) sur différents prix.
// Elle prend un second argument ... le taux de TVA, qui sera renseigné en second, lors de l'exécution de cette fonction.
// calculTva3
function calculTva3($prix, $taux){
    return $prix * $taux;
}

echo "45€ HT avec un taux de 5% me donnera un prix TTC de "  .calculTva3(45,1.05) . "€<br>";
echo "45€ HT avec un taux de 20% me donnera un prix TTC de "  .calculTva3(45,1.20) . "€<br>";

// calculTva4
// Dernière amélioration. Elle peut calculer selon différetns taux, différents prix, mais, si je ne lui renseigne pas le taux de TVA, elle saura qu'elle peut en appliquer un par défaut ($taux = 1.2).
function calculTva4($prix, $taux = 1.2){
    return $prix * $taux;
}

// Et effectivement, en dessous, si je renseigne le taux de TVA, elle va appliquer celui-là (1.05) mais s'il n'est pas indiqué comme dans le second cas, alors elle applique celui par défaut (1.2).
echo "55€ HT avec un taux de 5% me donnera un prix TTC de "  .calculTva4(55, 1.05) . "€<br>";
echo "55€ HT avec un taux de TVA par défaut me donnera un prix TTC de "  .calculTva4(55) . "€<br>";

// Chapitre 8 - La portée des variables
// Cette notion est IMPORTANTE, même si elle est abstraite, car je vais devoir par moments utiliser une syntaxe particulière pour récupérer une valeur de variable qui n'as pas été déclarée dans le même espace.

?>

<br><br>-------------------------- ESPACE GLOBAL ----------------------- <br> <br>

code <br><br>
<!-- Tout le code qui précède une accolade ouvrante fait partie de l'espace global. -->
function monScript(){<br>
    <!-- L'espace local correspond à tout le code qui figure entre une accolade ouvrante et une accolade fermante. -->
    <!-- Je peux le considérer comme mon bloc d'instruction. -->
------------ ESPACE LOCAL ------------<br><br>

            bloc d'instruction<br><br>

------------ ESPACE LOCAL ------------<br><br>
}
<!-- Une fois sortis de mon espace local (accolade fermante) le code qui suit fait partie de l'espace global. -->
code<br>

-------------------------- ESPACE GLOBAL -----------------------<br><br>

<?php

// De l'espace global vers l'espace local
// Je déclare ma variable dans l'espace global

$pays = "France";

function affichePays(){
    // Le mot clé global me permet de l'importer dans l'espace local. Sans cela, je ne peux l'utiliser. Undefined variable !
    global $pays;
    echo $pays . "<br>";
}

affichePays();

// De l'espace local vers le global

function afficheJour(){
    // Cette variable est déclarée dans l'espace local (dans mon bloc d'instructions)
    $jour = "mercredi";
    // Pour la récupérer dans mon espace global, je dois utiliser le mot clé return pour l' "exporter" vers le global.
    return $jour;
}    

echo afficheJour() . "<br>";

function afficheJour2(){
    $jour = "jeudi";
    return $jour;
    // Je ne pourrai pas exécuter cette instruction ci-dessous.
    // Le mo clé return le précède, il empeche toute instruction qui le suit de s'exécuter.
    echo "Demain, c'est vendredi !";
}

echo afficheJour2() . "<br>";

// Chapitre 9 - Les boucles

// WHILE

// J'initialise ma variable $i (souvent à 0)
// $i pour intégrer, mais ce n'est pas obligé de l'appeler ainsi.
// La valeur affectée de 0 n'est pas obligatoire ici. Mais c'est une syntaxe que vous rentrerez souvent car on travaille souvent sur les tableaux avec les boucles. Et il faut savoir que la première valeur d'un tableau à un indice 0. La seconde valeur, un indice 1. La 3ème valeur, un indice 2 ...
$i = 0;

// Je débute ma boucle WHILE, et, entre parenthèses, je lui donne la condition pour qu'elle puisse s'exécuter. Ici, tant que $i est inférieur ou égal à 5, cette boucle peut tourner. Si elle atteint le chiffre de 6, alors son exécution sera stoppée.
while($i <= 5){
    // Dans son bloc d'instruction, je lui demande de faire l'affichage.
    // Affichage de la chaîne de caractère, concaténée à la valeur de $i durant ce tour. Les trois tirets servent de séparateur entre chaque tour de boucle.
    echo "Tour n° " . $i . " --- ";
    // Une fois terminée cette instruction d'affichage, je demande à ce que la valeur de $i s'incrémente de +1.
    // $i++ => $i = $i + 1
    $i++;
    // Cela veut dire qu'après le premier affichage, ou $i a pour valeur 0, au tour suivant, il aura la valeur de 1 (0 + 1).
    // Et ainsi de suite, à chauqe tour de boucle, il prendra une unité de plus (1 + 1 = 2 puis 2 + 1 = 3 ... jusqu'à 5 + 1 = 6) et lorque sa valeur sera supérieur à la condition (ici, 5), l'exécution de la boucle (l'affichage de echo) ne s'exécutera plus. $i aura la valeur de 6, mais l'exécution de l'echo ne pourra se faire.
}

// La même boucle sans les trois tirets après tour n°5
echo "<br>";

$i = 0;
while($i < 6){
    if($i == 5){
        echo "Tour n° " . $i . "<br>";
    }else{
        // Si $i n'est pas égal à 5, il n'affichera pas les tirets
        echo "Tour n° " . $i . " --- ";
    }
    // ATTENTION : l'incrémentation de $i se fait à L'EXTERIEUR de la condition if
    $i++;
}

// DO WHILE (peu utilisée)

// L'inistialisation se fait aussi au début
$i = 0;

// Sa syntaxe comme do, qui introduit le bloc d'instruction
// Elle débute par DO, qui introduit le bloc d'instruction
do{
    // L'instruction d'affichage
    echo "Tour n° " . $i . " --- ";
    // Une incrémentation qui ajoute +2 à chaque tour de boucle (volontairement, pour montrer qu'il existe des techniques si besoin pour ne pas seulement incrémenter de +1).
    $i += 2;
    // Elle se termine par WHILE, qui introduit la  condition
}while ($i <= 10);

echo "<br>";

// FOR

// Son utilité est strictement similaire à celui de la WHILE. Elles vont faire le même travail.
// La différence réside dans sa syntaxe. Le FOR prend l'initialisation, la condition ainsi que l'incrémentation dans la parenthèse.
for($i = 0; $i <= 5; $i++){
    // Reste l'instruction d'affichage dans le bloc d'instruction.
    echo "Tour " . $i . "<br>";
}

// FOR, cas pratique (exemple)

echo "<br>";
echo "<form>";
    echo "<select>";
    echo "<option>Sélectionnez l'année</option>";
    // Boucle FOR pour créer un selecteur qui va afficher toutes les années, de l'année en cours (2022) à 100 ans en arrière (1922).
    // Pour faciliter le choix, je commence par l'année la plus proche vers les plus anciennes.
    // A partir de là, je ne vais plus aller en ordre croissant mais décroissant. C'est pour cela que ma condition indique que ma variable $annee devra être supérieure à l'année en cours - 100 (1922). C'est la date à laquelle devra stopper ma boucle.
    // Ensuite, il me reste à décrémenter pour diminuer la valeur de $annee pour atteindre l'année 1922.
    for($annee = date('Y'); $annee >= date('Y') - 100 ; $annee --){
        // J'affiche la valeur de l'année dans le selecteur.
        echo "<option>$annee</option>";
    }
    echo "</select>";
echo "</form>";
echo "<br>";

// FOR imbriquée

echo "<table border='1' style='border-collapse: collapse'>";
    echo "<tr>";
        for($i = 1; $i <= 10; $i++){
            echo "<td style='padding: 3px'>$i</td>";
        }
    echo "</tr>";
echo "</table>";

echo "<br>";

// echo "<table border='1' style='border-collapse: collapse'>";
//         for($ligne = 0; $ligne <= 9; $ligne++){
//             echo "<tr>";
//                 for($cellule = 1; $cellule <= 10; $cellule++){
//                     echo "<td style='padding: 3px'>" . (10*$ligne+$cellule) . "</td>";
//                 }
//             echo "</tr>";
//         }
// echo "</table>";

echo "<div class='row'>";
    echo "<div class='col-6'>";
        echo "<table class='table'>";
                for($ligne = 0; $ligne <= 9; $ligne++){
                    echo "<tr>";
                        for($cellule = 0; $cellule <= 9; $cellule++ ){
                            echo "<td style='padding: 3px'>" . (10*$ligne+$cellule) . "</td>";
                        }
                    echo "</tr>";
                }
        echo "</table>";
    echo "</div>";
echo "</div>";

// Chapitre 10 - Inclusion de fichiers

echo "---------- Je suis dans le fichier entrainement.php ----------";
// La fonction include() permet d'importer du contenu
include('inc/fichier.inc.php');
// require() permet d'importer de la même manière que include(). La différence entre les deux, c'est que si il y a une erreur dans le code, include() va notifier l'erreur/warning, mais permettre au reste du code de s'exécuter. Alors que require() va bloquer le code intégralement (en notifiant l'erreur).
require('inc/fichier.inc.php');
// Il existe deux autres fonctions prédéfinies qui vont me permettrent d'importer le fichier qu'une seule fois dans ma page. Elles vont m'assurer cette sécurité, car il serait illogique d'importer ce même contenu ou code deux fois. Je pourrai l'importer dans d'autres pages, mais une seule fois.
// Il s'agit de include_once() et require_once()
echo "---------- Je suis revenu dans le fichier entrainement.php ---------- <br><br>";

// Chapitre 11 - Les tableaux / Arrays

// Un tableau est un type de variables - https://www.php.net/manual/fr/language.types.php
// Elle à la particularité de pouboir stocker plusieurs valeurs et les restituer telles que si on en a besoin.

// Cette variable ci-dessous, ne sera oas capable de séparer les valeurs lors de l'affichage. Elle va afficher la totalité, comme une chaîne de caractères.
$listePrenoms = "Inès, Yann, Aziz, Julien, Mathilde";
echo $listePrenoms . "<br>";

// Voici la syntaxe classique pour déclarer un tableau.
// Je le nomme (ici en camelCase) et je lui affecte sa liste de valeurs en l'introduisant avec le mot clé array.
// Je donne les valeurs entres parenthèses, chacune séparée de l'autre avec une virgule.
$tableauPrenoms = array('Inès', 'Yann', 'Aziz', 'Julien', 'Mathilde');
// echo $tableauPrenoms[0];

// La syntaxe ci-dessous se rencontre parfois. Mais au-dessous, c'est mieux =). Le dev. aura voulu voulu aérer son code car la liste des valeurs était longue.
// $tableauPrenoms = array(
//     'Inès', 
//     'Yann', 
//     'Aziz', 
//     'Julien', 
//     'Mathilde',
// )

// L'instruction print_r() permet un affichage non-conventionnel (affichage pour un dev. mais pas pour un utilisateur). Il va me permettre de voir tout ce que contient ma variable.
echo print_r($tableauPrenoms) . "<br>";

// La balise <pre> permet une meilleure lisibilitée de ce résultat.
echo "<pre>"; print_r($tableauPrenoms); echo "</pre>";

echo "-------------------------";

// var_dump() est une instruction qui permet d'afficher les informations contenues dans une variable, comme print_r(), mais de manière encore plus précise.
// J'aurais dès le début le nombre de valeurs qu'elle contient. Le type de chaque valeur, la longueur de la chaîne de caractères si c'est un string.
// Noter que pour Inès, la longuere de la chaîne de caractères est de 5 et non 4, à cause de l'accent sur le e.
echo "<pre>"; var_dump($tableauPrenoms); echo "</pre>";

// Syntaxe pour récupérer une valeur en particulier
// Je vais crocheter (car c'est une valeur donnée entre crochet, d'où le nom) à l'indice du tableau. Je donne donc le nom du tableau, puis entre crochet l'indice.
echo $tableauPrenoms[2] . "<br>";

// Autre syntaxe pour un tableau, qui a pour avantage de pouvoir ajouter des valeurs qui ne sont pas connues dès le début
// Rien ne m'empechera de déclarer deux valeurs, continuer mon code sur vingt lignes, puis ajouter une nouvelle valeur ...
$listePays[] = "France";
$listePays[] = "Espagne";
$listePays[] = "Algérie";
$listePays[] = "Italie";
$listePays[] = "Russie";

// print_r pour avoir les informations sur ce array.
echo "<pre>"; print_r($listePays); echo "</pre>";
echo $listePays[3] . "<br>";

// La boucle FOREACH, adaptée aux tableaux

// La boucle FOREACH necessite en premier lieu le nom de la variable / tableau / array sur laquelle elle doit être travailler. Ensuite le mot clé as pour donner un alias à la variable / tableau (ici cet alias sera $indice). Enfin, elle fera correspondre cet alias ($indice) avec sa valeur ($valeur) grâce à => (flèche).
// Dans cette syntaxe, les éléments les plus importants sont le as et =>.
// Le nom de l'alias ainsi que le nom de la valeur n'ont aucune importance pouru un PHP (tant qu'on leur donne un nom).
foreach($listePays as $indice => $valeur){
    echo "<p>L'indice " . $indice . " a pour valeur le pays " . $valeur . "</p>";
}

echo "<br>";

// Je donne dans cette foreach les noms de $key et $value, car ils sont très utilisés pour l'alias et la valeur (même si ce n'est pas une obligation comme on a dit).
// Ce n'est que pour vous habituer à cette syntaxe qui revient très fréquement.
foreach($tableauPrenoms as $key => $value){
    echo "<p>L'indice " . $key . " a pour valeur le prénom " . $value . "</p>";
}







require_once('inc/footer.inc.php');