<?php

namespace app\controllers;

class Products
{
    public function __construct() 
    {
        $database = new \app\core\Database();
        $db = $database->connect();
        $products_model = new \app\models\ProductsModel($db);
        $products = $products_model->getProducts();
        $products_view = new \app\views\ProductsView();
        $products_view->renderProducts($products);
    }
}

