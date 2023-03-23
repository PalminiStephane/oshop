<?php

namespace Oshop\controllers;

use Oshop\models\Category;
use Oshop\models\Type;

// Par convention, on met souvent les pages "statiques" et la page d'accueil dans le MainController

class MainController extends CoreController
{
    // page d'accueil
    public function home() {

        // 1. j'instancie le modèle
        $categoryModel = new Category();
        // 2. je recupère les données
        $categoriesHomeOrder = $categoryModel->findHomeOrder();

        // 3. je prépare mes données
        $viewData = [
            'pageTitle' => 'Dans les shoe',
            'categoriesHomeOrder' => $categoriesHomeOrder
        ];

        // 4. j'envoie les donnée à la vue
        $this->show('home', $viewData);
    }

    // page mentions légales
    public function legal() {
        $this->show('legal', [
            'pageTitle' => 'Dans les shoe - Mentions légales'
        ]);
    }

    public function test() {

        // on test Category.php
        $categoryModel = new Category();

        $categories = $categoryModel->findAll();
        dump($categories);

        $category = $categoryModel->find(3);
        dump($category);


        // on test Type.php
        $typeModel = new Type();

        $types = $typeModel->findAll();
        dump($types);

        $type = $typeModel->find(2);
        dump($type);

        exit;
    }
}