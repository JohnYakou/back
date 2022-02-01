<div>
    <!-- Pour chaque drapeau cliquable, je vais faire transiter via la balise <a> (dans son attribut href) une valeur affiliee à l'indice pays (pays=en, pays=es) -->
    <a href="?pays=en"><img src="img/england.png" loading="lazy" alt="drapeau de l'Angleterre"></a>
    <a href="?pays=es"><img src="img/spain.png" loading="lazy" alt="drapeau de l'Espagne"></a>
    <a href="?pays=dz"><img src="img/algeria.png" loading="lazy" alt="drapeau de l'Algérie"></a>
</div>

<?php

// Je debute par une condition pour verifier si l'indice pays existe ou pas dans l'URL. Le isset est important ici pour cela. Si je ne l'utilsie pas, alors PHP s'attend a le trouver dès le premier chargement de la page, ce qui ne sera pas possible (je n'ai encore clique sur aucun drapeau), il me renverra une erreur warning
if(isset($_GET['pays'])){
    // Si donc il trouve cet indice dans l'URL, il affectera alors à la variable $pays la valeur de cet indice (en, es ou dz)
    $pays = $_GET['pays'];
    // Dans le elseif, je vais verifier un autre cas de figure, celui ou un cookie (qui porte le nom du pays) existe deja (deja cree lors d'une precedente visite sur le site)
}elseif(isset($_COOKIE['pays'])){
    // Si ce cookie existe, alors $pays se verra affecte de la valeur qui a ete stockee dans ce cookie
    $pays = $_COOKIE['pays'];
    // Il reste le else, le cas de figure ou, encore aucune information n'a transiite dans l'URL et aucun cookie existe
}else{
    // Dans ce cas la, la variable $pays se verra affecte de la valeur 'fr', ce qui entrainera par le biais de ma condition switch, l'affichage du mot bonjour
    $pays = 'fr';
}

// La fonction setcookie permet de crer le cookie
// Elle demande trois parametres. Dans l'ordre, le nom du cookie (pays). Le nom de la variable qui va stocker la valeur du cookie ($pays) et en dernier la duree de vie du cookie. Ici, c'est le calsul pour une duree d'1 an
// Avec time() je recupere la date d'aujourd'hui exprimee en seconde et je lui additionne 3600 secondes (dans une heure) multiplié à 24 heures (dans une journee) multiplie à 365 jours (pour faire une annee)
setcookie('pays', $pays, time()+3600*24*365);
// Desormais mon cookie est cree, je peux le retrouver stocke dans mon navigateur. Et si je quitte mon onglet voire meme le navigateur, lors de ma prochaine visite sur le site, $_COOKIE retrouvera l'existence de ce cookie et recuperera la valeur stockee (le elseif de la condition au-dessus)
// Le cookie se regenere automatiquement pour une annee a chaque visite de votre part sur le site
// Pour qu'il s'auto-detruise au bout d'un an, il faudrait que vous n'y alliez plus durant toute cette periode

// Dans cette switch, je vais tester ma variable $pays
switch($pays){
    case 'fr' : 
        // Dans le cas ou elle a ete affecte de la valeur 'fr' (dans le else), il sera affiche bonjour en accueil
        echo "<h1>Bonjour</h1>";
        break;
    case 'en' :
            // Dans le cas ou elle a ete affecte de la valeur 'en' (dans le else), il sera affiche welcome en accueil
        echo "<h1>Welcome</h1>";
        break;
    case 'es' :
            // Dans le cas ou elle a ete affecte de la valeur 'es' (dans le else), il sera affiche hola en accueil
        echo "<h1>Hola</h1>";
        break;
    case 'dz' :
            // Dans le cas ou elle a ete affecte de la valeur 'dz' (dans le else), il sera affiche salaam en accueil
        echo "<h1>Salaam</h1>";
        break;
        // Toujours prevoir un default si ce cas n'est pas prevu
    default :
        echo "<h1>Vous n'avez choisi aucune langue</h1>";
        break;
}