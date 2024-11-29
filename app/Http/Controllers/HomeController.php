<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts=Product::newProducts(3)->get();
        return view('home', compact('newProducts'));
    }
}
