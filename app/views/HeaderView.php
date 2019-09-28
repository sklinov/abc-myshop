<?php
namespace app\views;

class HeaderView
{
    public function renderHeader() {
        echo '
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">MyShop</span>
            <a href="" class="btn btn-primary">Checkout</a>
        </nav>
        ';
    }
}