<?php
namespace app\views;

class ProductsView
{
    public function renderProducts($products) {
        if(isset($products) && count($products)> 0)
        {
            echo '
                <div class="container">
                <div class="row">
            
            ';
            foreach($products as $product) 
            {
                $svg = $product['image'];
                echo '
                <div class="card m-3">
                    <div class="card-img-top m-3" alt="'. $product['name'].'" style="width: 200px; height: 200px;">
                        '. $svg .'
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'. $product['name'].'</h5>
                        <p class="card-text">&#36;'. number_format($product['price'], 2, ',', ' ').'</p>
                        <a href="#" id="addtocart" class="btn btn-primary" data-product-id="'.$product['product_id'].'">Add to cart</a>
                    </div>
                </div>
                ';
            }
            echo '
                </div>
                </div>
                <script src="scripts/ProductsView.js"></script>
            ';
        }
        else
        {
            echo '<h3>No products loaded...</h3>';
        }
    }
}