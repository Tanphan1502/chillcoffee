<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Thống kê';
        return view('admin.pages.index', compact('title'));
    }
    public function productList(){
        return view('admin.pages.productList');
    }
    public function categoryList(){
        return view('admin.pages.categoryList');
    }
    public function orderList(){
        $title = 'Đơn hàng';
        return view('admin.pages.orderList', compact('title'));
    }
    public function userList(){
        return view('admin.pages.userList');
    }

}
