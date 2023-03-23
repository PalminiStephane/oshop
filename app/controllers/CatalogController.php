<?php

// le namespace c'est TOUJOURS la première instruction sur un fichier PHP !
namespace Oshop\controllers;

use Oshop\models\Brand;
use Oshop\models\Product;
use Oshop\models\Category;
use Oshop\models\Type;

class CatalogController extends CoreController
{
    public function category($params) {

        // pour debug
        //dump($params);

        // on peut ici récupérer l'id, envoyé dans la variable $params
        $id = $params['id'];

        // on récupère les produits qui sont dans la catégorie $id
        $productModel = new Product();
        $products = $productModel->findAllByCategoryId($id);

        $categoryModel = new Category();
        $category = $categoryModel->find($id);

        $this->show('category', [
            'pageTitle' => 'Dans les shoe - catégorie N°' . $id,
            'products' => $products,
            'category' => $category
        ]);
    }

    public function brand($params) {

        // on récupère l'id de la marque (fourni en paramètre dans l'URL)
        $id = $params['id'];

        // on récupère les produits qui sont dans la marque $id
        $productModel = new Product();
        $products = $productModel->findAllByBrandId($id);

        $brandModel = new Brand();
        $brand = $brandModel->find($id);

        // on appelle notre vue
        $this->show('brand', [
            'pageTitle' => 'Dans les shoe - ' . $brand->getName(),
            'products' => $products,
            'brand' => $brand
            
        ]);
    }

    public function type($params) {

        // on récupère l'id de la marque (fourni en paramètre dans l'URL)
        $id = $params['id'];

        // on récupère les produits qui sont dans la marque $id
        $productModel = new Product();
        $products = $productModel->findAllByTypeId($id);

        $typeModel = new Type();
        $type = $typeModel->find($id);

        // on appelle notre vue
        $this->show('type', [
            'pageTitle' => 'Dans les shoe - ' . $type->getName(),
            'products' => $products,
            'type' => $type
        ]);
    }

    public function product($params) {

        // on récupère l'id de la marque (fourni en paramètre dans l'URL)
        $id = $params['id'];

        // 1. on instancie le modèle
        $productModel = new Product();
        // 2. on recupère les données 
        $product = $productModel->find($id);


        $categoryModel = new Category();
        $brandModel = new Brand();
        $category = $categoryModel->find($product->getCategory_id());
        $brand = $brandModel->find($product->getBrand_id());

        // 3. je prépare mes données
        $viewData = [
            'pageTitle' => 'Dans les shoe - ' . $product->getName(),
            'product' => $product,
            'categoryName' => $category->getName(),
            'brandName' => $brand->getName()
        ];

        // on appelle notre vue
        // 4. je les envoie à la vue
        $this->show('product', $viewData);
    }
}