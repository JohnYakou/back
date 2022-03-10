<?php

// Je n'ai plus besoin de toutes ces requetes
// require_once('A.class.php');
// require_once('B.class.php');
// require_once('C.class.php');
// require_once('D.class.php');

// Je n'ai besoin que d'un seul, celui de autoloas, car il a automatiser la création des require_once
// Je l'appelle lui, il me recupère tous les autres
require_once('autoload.php');

// Toutes mes classes sont reconnus grace à un seul require_once
$a = new A;
$b = new B;
$c = new C;
$d = new D;

echo "<pre>"; var_dump($a); echo "</pre>";
echo "<pre>"; var_dump($b); echo "</pre>";
echo "<pre>"; var_dump($c); echo "</pre>";
echo "<pre>"; var_dump($d); echo "</pre>";
