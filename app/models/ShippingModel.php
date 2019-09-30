<?php

namespace app\models;
use PDO;

class ShippingModel extends Model
{
    private $shipping_list = [];

    protected function addToShippingList($item) 
    {
        array_push($this->shipping_list, $item);
    }
    protected function getShippingList() 
    {
        return $this->shipping_list;
    }

    public function getDataFromDB() 
    {
        $query = "SELECT * from shipping";
        $result =  $this->doQuery($query);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            extract($row);
            $this->addToShippingList($row);
        }
        return $this->getShippingList();
    }
}