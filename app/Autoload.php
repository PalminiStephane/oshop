<?php

// notre fonction de "callback", qui sera appelée quand une classe n'est pas trouvée
function monPremierAutoloader($className) {

    echo "classe non trouvée : " . $className . "<br><br>";

    // charge automatiquement la classe non trouvée !
    require_once __DIR__ . '/../app/models/' . $className . '.php';

}

function monDeuxiemeAutoloader($className) {
    echo "classe non trouvée : " . $className . "<br>";

    // on remplace les \ par des / :
    $classNameWithSlashs = str_replace('\\', '/', $className);

    // On affiche le fichier qui va être inclus pour debugger
    echo "on essaye de charger : " . __DIR__ . '/../' . $classNameWithSlashs . '.php<br>';

    // Puis on tente d'inclure le fichier
    require_once __DIR__ . '/../' . $classNameWithSlashs . '.php';
}

// spl_autoload_register fonctionne comme addEventListener en JS :
// -> quand l'event "classe non trouvée" est déclenché, PHP va appeller
// la function dont on a mis le nom en param dans spl_autoload_register
//spl_autoload_register('monPremierAutoloader');
spl_autoload_register('monDeuxiemeAutoloader');