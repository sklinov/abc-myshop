<?php

namespace app\controllers;

class ClassToLoad 
{
    public function __construct() 
    {
        echo 'CONSTRUCTED';
    }
    public function write($str) 
    {
        echo $str;
    }
}