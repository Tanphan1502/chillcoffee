<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\Cart;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Lấy user_id từ session
        $userId = session()->get('user_id');

        // Lấy thông tin user_address có usr_id = user_id trong session
        $useraddress = UserAddress::where('usr_id', $userId)->get();

        // Lấy thông tin giỏ hàng từ session
        $cart = session()->get('cart', []);

        return view('checkout', compact('cart', 'useraddress'));
    }

}
