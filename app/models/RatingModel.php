<?php

namespace app\models;
use PDO;

class RatingModel extends Model
{   
    private $current_rating;

    public function getProductRating($product_id) {
        $query = "SELECT AVG(rating) AS AverageRating FROM rating WHERE product_id =".$product_id."";
        $result =  $this->doQuery($query);
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $this->current_rating = $row['AverageRating'] !== NULL ? number_format($row['AverageRating'], 2, ',', ' ') : 'N/A';
        }
        return $this->current_rating;
    }

    public function setProductRating($product_id, $product_rating)
    {
        $query = "INSERT INTO rating VALUES (DEFAULT, '".$product_id."','".$product_rating."');";
        $result = $this->doQuery($query);
        if($result)
        {
            $_SESSION['rating'][$product_id] = $product_rating;
        }
    }
}