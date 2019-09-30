<?php

namespace app\controllers;

class Wallet
{
    private $balance;

    public function __construct() 
    {
        $this->balance = isset($_SESSION['balance']) ? $_SESSION['balance'] : 100;
    }

    public function __destruct()
    {
        $_SESSION['balance'] = $this->balance;
    }

    private function saveBalance() 
    {
        $_SESSION['balance'] = $this->balance;
    }

    public function pay($ammount)
    {
        if($ammount<=$this->balance)
        {
            $this->balance -=$ammount;
            $this->saveBalance();
            return true;
        }
        return false;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}