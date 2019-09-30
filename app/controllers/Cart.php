<?php

namespace app\controllers;
use \app\controllers\Wallet;

class Cart
{
    private $products_list;
    public $in_cart;
    public $message;

    public function __construct($products_list) 
    {
        $this->products_list = $products_list;
        $this->in_cart = isset($_SESSION['in_cart']) ? $_SESSION['in_cart'] : [];
    }

    public function __destruct()
    {
        $_SESSION['in_cart'] = $this->in_cart;
    }

    private function saveCart()
    {
        $_SESSION['in_cart'] = $this->in_cart;
    }

    public function getCart() 
    {
        return $this->in_cart;
    }

    public function addToCart($product_id)
    {
        $this->changeQuantityInCart($product_id, 1);
    }

    public function removeFromCart($product_id)
    {
        $this->changeQuantityInCart($product_id, -1);
    }

    public function changeQuantityInCart($product_id, $change_by) 
    {
        foreach($this->products_list as $product)
        {
            if($product['product_id'] === $product_id)
            {
                $quantity = array_key_exists( $product['product_id'], $this->in_cart) ? $this->in_cart[$product['product_id']]['quantity'] + $change_by : $change_by;
                if($quantity > 0)
                {
                    $this->in_cart[$product['product_id']] = array('product'  => $product,
                                                                   'quantity' => $quantity);
                }
                else
                {
                   unset($this->in_cart[$product['product_id']]); 
                }
                
            }
        }
        $this->saveCart();
    }

    private function clearCart()
    {
        $this->in_cart = [];
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->in_cart as $product)
        {
            $total += $product['product']['price'] * $product['quantity'];
        }
        return $total;
    }

    public function checkout(Wallet $wallet) 
    {
        if($wallet->pay($this->getTotal()))
        {
            $this->clearCart();
        }
        else 
        {
            $this->message = 'Not enought money to pay';
        }
    }

    public function showCart() {
        $cart_view = new \app\views\CartView();
        $cart_view->renderCart($this);
    }
}

