<?php
namespace app\views;
use app\controllers\Cart;

class CartView
{
    public function renderCart(Cart $cart)
    {
        echo '
        <div class="navbar sticky-bottom navbar-dark bg-dark">
        ';
        if(isset($cart->in_cart) && count($cart->in_cart)> 0)
        {
            //Product grid
            foreach($cart->in_cart as $product) 
            {
                $svg = $product['product']['image'];
                echo '
                <div class="card m-2" style="width: 250px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 ml-2 mt-auto mb-auto" style="max-width: 50px; max-height: 50px;">
                            '.$svg.'
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">'. $product['product']['name'] .'</h5>
                            <p class="card-text">Price:'. $this->moneyFormat($product['product']['price']).'</p>
                            <p class="card-text">Quantity:'. $product['quantity'].'
                            <form class="form-inline">
                                <input class="form-control form-control-sm mr-1 " id="number-to-remove" value="1" size="1"></input>
                                <button id="removefromcart" data-product-id="'.$product['product']['product_id'].'" type="button" class="btn btn-sm btn-outline-danger ml-3">&#215;</button>
                            </form>
                            </p>
                            <p class="card-text">Subtotal:'. $this->moneyFormat($product['product']['price'] * $product['quantity']).'</p>
                        </div>
                        </div>
                    </div>
                </div>
                ';
            }
            //Shipping method
            echo '
                <div class="form-group ml-auto">
                <label class="nav-item" style="color:#ffffff;">Choose shipping:</label><br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">';
                foreach($cart->shipping_list as $shipping)
                {
                    echo ' 
                        <label class="btn btn-info">
                        <input type="radio" name="shipping" data-shipping-id="'.$shipping['shipping_id'].'" autocomplete="off">'.$shipping['shipping_name'].' - '.$this->moneyFormat($shipping['shipping_price']).'
                        </label>
                    ';
                }
            echo '
                </div>    
                </div>
            ';

            //Checkout controls
            $button_class = isset($cart->message) ? 'btn-danger': 'btn-primary';
            $button_label = isset($cart->message) ? $cart->message  : 'Checkout';
            echo '
            <h3 class="navbar-brand mr-3 ml-3">Total:<br>'. $this->moneyFormat($cart->getTotal()).'</h3>
            <button id="checkout" class="btn btn-lg '. $button_class. '">'.$button_label.'</button>
            <script src="scripts/CartView.js"></script>
            ';
        }
        else
        {
            echo '<h3 class="navbar-brand">No products in your cart...</h3>';
        }
        echo '

        </div>';
    }
    
    private function moneyFormat($number) 
    {
        return '$'.number_format($number, 2, ',', ' ');
    }
}
