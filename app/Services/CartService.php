<?php
// app/Services/CartService.php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Facades\CartFacade;
class CartService
{
    public function getCartCount()
    {
         
        $cartCount = Cart::where('user_id', Auth::user()->id)
            ->count();

          return $cartCount;
    }
}

