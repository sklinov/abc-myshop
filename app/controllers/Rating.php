<?php

namespace app\controllers;

class Rating extends ControllerDB
{
    private $rating;

    private function getProductRating($product_id)
    {
        $model_class_name = '\\app\models\\'.$this->className().'Model';
        $model = new $model_class_name();
        $this->rating = $model->getProductRating($product_id);
    }

    public function setProductRating($product_id, $product_rating)
    {
        $model_class_name = '\\app\models\\'.$this->className().'Model';
        $model = new $model_class_name();
        $model->setProductRating($product_id, $product_rating);
    }

    public function showProductRating($product_id)
    {
        $product_rating = $this->getProductRating($product_id);
        $view_class_name = '\\app\views\\'.$this->className().'View';
        $view = new $view_class_name();
        $disabled = $this->checkIfNotRated($product_id) ? '' : 'disabled';
        return $view->render($this->rating, $product_id, $disabled);
    }

    private function checkIfNotRated($product_id)
    {
        if(isset($_SESSION['rating'][$product_id]))
        {
            return false;
        }
        return true;
    }
}