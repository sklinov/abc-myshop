<?php
namespace app\views;

class RatingView
{
    public function render($product_rating, $product_id, $disabled) 
    {
       return '
        <form class="form mb-2">
            <label>Avg.rating:<b> '.$product_rating.'</b></label><br>
            <div class="btn-group" role="group">
                <button type="button" id="rating" data-product-id="'.$product_id.'" class="btn btn-sm btn-outline-info" '.$disabled.'>1</button>
                <button type="button" id="rating" data-product-id="'.$product_id.'" class="btn btn-sm btn-outline-info" '.$disabled.'>2</button>
                <button type="button" id="rating" data-product-id="'.$product_id.'" class="btn btn-sm btn-outline-info" '.$disabled.'>3</button>
                <button type="button" id="rating" data-product-id="'.$product_id.'" class="btn btn-sm btn-outline-info" '.$disabled.'>4</button>
                <button type="button" id="rating" data-product-id="'.$product_id.'" class="btn btn-sm btn-outline-info" '.$disabled.'>5</button>
            </div>
        </form>
        ';
    }

}





