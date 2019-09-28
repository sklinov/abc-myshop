<?php

namespace app\controllers;

class Header 
{
    public function __construct() 
    {
        $header_view = new \app\views\HeaderView();
        $header_view->renderHeader();
    }
}

