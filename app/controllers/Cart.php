<?php

namespace app\controllers;
use \app\controllers\Wallet;

class Cart
{
    private $products_list;
    public $shipping_list;
    public $shipping;
    public $in_cart;
    public $message;

    public function __construct($products_list, $shipping_list) 
    {
        $this->products_list = $products_list;
        $this->shipping_list = $shipping_list;
        $this->in_cart = isset($_SESSION['in_cart']) ? $_SESSION['in_cart'] : [];
        $this->shipping = isset($_SESSION['shipping']) ? $_SESSION['shipping'] : null;
    }

    public function __destruct()
    {
        $_SESSION['in_cart'] = $this->in_cart;
        $_SESSION['shipping'] = $this->shipping;
    }

    private function saveCart()
    {
        $_SESSION['in_cart'] = $this->in_cart;
        $_SESSION['shipping'] = $this->shipping;
    }

    public function getCart() 
    {
        return $this->in_cart;
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

    public function changeShipping($shipping_id)
    {
       foreach($this->shipping_list as $shipping)
       {
           if($shipping['shipping_id'] === $shipping_id)
           {
               $this->shipping = $shipping;
               break;
           }
       } 
    }

    private function clearCart()
    {
        $this->in_cart = [];
        $this->shipping = null;
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->in_cart as $product)
        {
            $total += $product['product']['price'] * $product['quantity'];
        }
        $total += isset($this->shipping) ? $this->shipping['shipping_price'] : 0;
        return $total;
    }

    public function checkout(Wallet $wallet) 
    {
        if($this->checkShipping())
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
    }

    private function checkShipping()
    {
        if(isset($this->shipping))
        {
            return true;
        }
        else 
        {
            $this->message = 'Choose shipping';
            return false;
        }
    }

    public function showCart() 
    {
        $cart_view = new \app\views\CartView();
        $cart_view->renderCart($this);
    }
}

