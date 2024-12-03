<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository= $categoryRepository;
    }


    public function store(Request $request)
    {
        $categorydata=[
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ];
        $this->categoryRepository->create($categorydata);
        return redirect()->route('category')->with('success', 'Thêm loại thành công');
    }
    
    public function index()
    {
        $cat =$this->categoryRepository->all();
        return view('admin.pages.categoryList', compact('cat'));
    }
}
