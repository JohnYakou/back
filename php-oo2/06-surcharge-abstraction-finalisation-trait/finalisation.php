<?php

// Le mot clé final => ne peut pas avoir d'héritier
// Le developpeir considère que le code est abouti, et ne veut pas qu'il soit modifiable dans des classes qui héritent
final class Application{
    public function executerApplication(){
        return "Je fonctionne";
    }
}

// C'est une classe que l'on peut instancier (contrairement à abstract)
$app = new Application;

echo $app->executerApplication() . "<br>";


class Application2{
    // Application 2 est une class "normale", qui peut contenir une méthode final
    final function lancerApplication(){
        return "Je fonctionne, moi aussi";
    }
}

// Extension hérite de Application2
class Extension extends Application2{
    // La classe hérite de la méthode lancerApplication() (voir le get_class_methods ci-dessous), mais je ne pourrai pas la modifier, la surcharger, la redéfinir
    // public function lancerApplication(){
    //     return 'Je fonctione autrement';
    // }
}

$ext = new Extension;

echo "<pre>"; print_r(get_class_methods($ext)); echo "</pre>";