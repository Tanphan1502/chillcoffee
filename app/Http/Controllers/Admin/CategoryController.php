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

    //Show
    public function index()
    {
        $cat = $this->categoryRepository->all();
        return view('admin.pages.categoryList', compact('cat'));
    }

    //Thêm mới 
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

    public function editCat($id)
    {
        $cat = $this->categoryRepository->find($id);
        return view('admin.pages.editCat',compact('cat'));
    }
    public function updateCat(Request $request, $id)
    {
         $categorydata =
         [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
         ];
         $this->categoryRepository->update($id, $categorydata);
         return redirect()->route('category')->with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
      $result =  $this->categoryRepository->delete($id);
      if ($result) {
        return redirect()->route('category')->with('success','Xoá thành công');
      }
    }
}
