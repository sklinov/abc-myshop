<?php
namespace app\controllers;

session_start();

define('PROJECT_SUBFOLDER','/abc');

require 'autoload.php';

//Instantiate
$wallet = new Wallet();
$header = new Header();
$products = new Products();
$shipping = new Shipping();
$products_list = $products->get();
$shipping_list = $shipping->get();
$cart = new Cart($products_list, $shipping_list);

//Do logic

require 'dispatch.php';

//Show
$header->showHeader($wallet);
$products->show();
$cart->showCart();

?>