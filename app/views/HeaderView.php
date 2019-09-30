<?php
namespace app\views;
use \app\controllers\Wallet;

class HeaderView
{
    public function renderHeader(Wallet $wallet) {
        echo '
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">MyShop</span>
            <span class="navbar-brand mb-0 h1">Your balance: &#36;'.$wallet->getBalance().'</span>
        </nav>
        ';
    }
}