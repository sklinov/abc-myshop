<?php
namespace app\controllers;

session_start();

define('PROJECT_SUBFOLDER','/abc//');

require 'autoload.php';

//Instantiate
$wallet = new Wallet();
$header = new Header();
$products = new Products();
$products_list = $products->getProducts();
//var_dump($products_list);
$cart = new Cart($products_list);

//Do logic

if(isset($_GET['addtocart']))
{
    $added_id = $_GET['addtocart'];
    $number_to_add = isset($_GET['numberToAdd']) && $_GET['numberToAdd'] !== '' && is_numeric($_GET['numberToAdd']) ? $_GET['numberToAdd'] : 1;
    $cart->changeQuantityInCart($added_id, $number_to_add);
}
if(isset($_GET['removefromcart']))
{
    $removed_id = $_GET['removefromcart'];
    $number_to_remove = isset($_GET['numberToRemove']) && $_GET['numberToRemove'] !== '' && is_numeric($_GET['numberToRemove']) ? $_GET['numberToRemove']*-1 : -1;
    $cart->changeQuantityInCart($removed_id, $number_to_remove);
}
if(isset($_GET['checkout']))
{
    $cart->checkout($wallet);
}

//
//Show everything
$header->showHeader($wallet);
$products->showProducts();
$cart->showCart();

?>