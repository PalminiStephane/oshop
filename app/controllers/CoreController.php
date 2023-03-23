<?php

namespace Oshop\controllers;

use Oshop\models\Type;
use Oshop\models\Brand;
use Oshop\models\Category;

class CoreController
{
    protected function show($viewName, $viewData = [])
    {
        // on rajoute global $router pour pouvoir accéder à AltoRouter & générer des URLs avec $router->generate()
        global $router;

        // on regarde si BASE_URI est défini : si oui -> $absoluteURL = BASE_URI
        $absoluteURL = $_SERVER['BASE_URI'] ?? '';

        // étant donné qu'on a besoin des catégories sur toutes les routes, on les récupère ici !
        $categoryModel = new Category();
        $categories = $categoryModel->findAll();

        $typeModel = new Type();
        $types = $typeModel->findAll();

        $brandModel = new Brand();
        $brands = $brandModel->findAll();

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}