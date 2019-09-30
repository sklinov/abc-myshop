<?php

namespace app\models;
use PDO;

class ProductsModel extends Model
{
    private $product_list = [];

    protected function addToProductList($item) 
    {
        array_push($this->product_list, $item);
    }
    
    protected function getProductList() 
    {
        return $this->product_list;
    }

    public function getDataFromDB() 
    {
        $query = "SELECT * from products";
        $result =  $this->doQuery($query);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            extract($row);
            $this->addToProductList($row);
        }
        return $this->getProductList();
    }
}