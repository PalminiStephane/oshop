<?php

// pour que notre autoload fonctionne, il faut le charger !
require_once __DIR__ . '/../app/Autoload.php';

use app\models\Product;

$product = new Product();
var_dump($product->findAll());