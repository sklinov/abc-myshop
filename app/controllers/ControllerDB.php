<?php

namespace app\controllers;
use ReflectionClass;

class ControllerDB
{
    protected $data;
    protected $db;

    public function __construct() 
    {

    }

    protected function className()
    {
        $cls = new \ReflectionClass($this);
        return $cls->getShortName();
    }

    public function get() {
        $model_class_name = '\\app\models\\'.$this->className().'Model';
        $model = new $model_class_name();
        $this->data = $model->getDataFromDB();
        return $this->data;
    }

    public function show() {
        $view_class_name = '\\app\views\\'.$this->className().'View';
        $view = new $view_class_name();
        $view->render($this->data);
    }
}

