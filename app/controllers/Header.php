<?php

namespace app\controllers;

class Header 
{
    public function __construct() 
    {    
    }

    public function showHeader(Wallet $wallet)
    {
        $header_view = new \app\views\HeaderView();
        $header_view->renderHeader($wallet);
    }
}

