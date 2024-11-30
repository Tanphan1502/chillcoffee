<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
    public function productList(){
        return view('admin.pages.productList');
    }
    public function categoryList(){
        return view('admin.pages.categoryList');
    }
    public function orderList(){
        return view('admin.pages.orderList');
    }
    public function userList(){
        return view('admin.pages.userList');
    }

}
