<?php 

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

if(isset($_GET['changeshipping']))
{
    $shipping_id = $_GET['changeshipping'];
    $cart->changeShipping($shipping_id);
}

if(isset($_GET['rate']))
{
    $product_id = $_GET['rate'];
    $product_rating = $_GET['rating'];
    $rating = new Rating();
    $rating->setProductRating($product_id, $product_rating);
}