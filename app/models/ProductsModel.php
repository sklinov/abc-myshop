<?php

namespace app\models;
use PDO;

class ProductsModel
{
    protected $conn;
    public $product_list = [];
    
    public function __construct($db) 
    {
        $this->conn = $db;
    }
    private function doQuery($query) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        }
        catch(PDOException $e) {
            echo 'Error:'. $e->getMessage();
        } 
        return $stmt;
    }

    protected function addToProductList($item) {
        array_push($this->product_list, $item);
    }
    protected function getProductList() {
        return $this->product_list;
    }

    public function getProducts() {
        $query = "SELECT * from products";
        $result =  $this->doQuery($query);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $this->addToProductList($row);
        }
        return $this->getProductList();
    }
}