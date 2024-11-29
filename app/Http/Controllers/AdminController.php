<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function productList(){
        return view('admin.productList');
    }
    public function categoryList(){
        return view('admin.categoryList');
    }
    public function orderList(){
        return view('admin.orderList');
    }

}
