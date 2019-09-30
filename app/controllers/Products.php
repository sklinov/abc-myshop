<?php

namespace app\controllers;

class Products
{
    private $products;
    private $db;

    public function __construct() 
    {
        $database = new \app\core\Database();
        $this->db = $database->connect();
    }

    public function getProducts() {
        $products_model = new \app\models\ProductsModel($this->db);
        $this->products = $products_model->getProductsFromDB();
        return $this->products;
    }

    public function showProducts() {
        $products_view = new \app\views\ProductsView();
        $products_view->renderProducts($this->products);
    }
}

