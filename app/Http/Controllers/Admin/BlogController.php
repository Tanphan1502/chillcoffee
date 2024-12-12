<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $title = "Bài viết";
        return view('admin.pages.blog', compact('title'));
    }
    
    public function newPost(){
       $title ="Thêm bài viết";
        return view('admin.pages.addBlog', compact('title'));
    }
    public function addBlog(Request $request)
    {
        $data = 
        [

        ];
    }
}
