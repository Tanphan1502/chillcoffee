<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('admin.pages.blog');
    }
    
    public function newPost(){
        return view('admin.pages.addBlog');
    }
    public function addBlog(Request $request)
    {
        $data = 
        [

        ];
    }
}
