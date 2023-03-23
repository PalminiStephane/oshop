<?php

// on charge l'autoload de composer
require_once __DIR__ . '/../vendor/autoload.php';

// on instancie la classe AltoRouter
$router = new AltoRouter();

// on doit dire à AltoRouter dans quel dossier se trouve notre app
// pour qu'il puisse "différencier" la route demandée par le visiteur du dossier dans lequel se trouve notre app
$router->setBasePath($_SERVER['BASE_URI']);

// on map nos routes !
$router->map('GET', '/', [
    'action' => 'home',
    'controller' => '\Oshop\controllers\MainController'
], 'home');

$router->map('GET', '/catalogue/categorie/[i:id]', [
    'action' => 'category',
    'controller' => '\Oshop\controllers\CatalogController'
], 'catalog-category');

$router->map('GET', '/catalogue/marque/[i:id]', [
    'action' => 'brand',
    'controller' => '\Oshop\controllers\CatalogController'
], 'catalog-brand');

$router->map('GET', '/catalogue/type/[i:id]', [
    'action' => 'type',
    'controller' => '\Oshop\controllers\CatalogController'
], 'catalog-type');

$router->map('GET', '/catalogue/produit/[i:id]', [
    'action' => 'product',
    'controller' => '\Oshop\controllers\CatalogController'
], 'catalog-product');

$router->map('GET', '/mentions-legales', [
    'action' => 'legal',
    'controller' => '\Oshop\controllers\MainController'
], 'legal');

$router->map('GET', '/test', [
    'action' => 'test',
    'controller' => '\Oshop\controllers\MainController'
]);

//* mémo : comment ajouter une page ?
// 1. ajouter une route !
// 2. coder la méthode dans le contrôleur
// 3. coder la vue ! (le ou les templates)

// on "match" la requête actuelle avec nos routes enregistrées précédemment
$match = $router->match();

// si match = true, la route existe
if($match) {
    // comme avant, on veut récupérer le controleur à instancier 
    // et la méthode de ce controleur à appeler
    // sauf que ce coup-ci, on le fait grâce à AltoRouter !
    $controllerToInstantiate = $match['target']['controller'];
    $methodToCall = $match['target']['action'];

    // dispatcheur :
    $controller = new $controllerToInstantiate();
    // on appelle notre méthode, et on lui envoie les paramètres d'URL
    $controller->$methodToCall($match['params']);
} else {
    // 404, la route existe pas
    $controller = new \Oshop\controllers\ErrorController();
    $controller->error404();
}
