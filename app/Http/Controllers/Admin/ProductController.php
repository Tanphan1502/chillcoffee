<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;
use App\Repositories\RepositoryInterface\ProductRepositoryInterface;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository,ProductRepositoryInterface $productRepository)
    {
        $this->productRepository =$productRepository;
        $this->categoryRepository=$categoryRepository;
    }
    //Show sản phẩm
    public function index(){
        $i=0;
        $pro = $this->productRepository->all();
        $categories = $this->categoryRepository->getAllCategoriesWithProducts();
     
        return view('admin.pages.productList', compact('pro','i','categories'));
    }

    //Thêm sản phẩm mới
    public function store(Request $request)
    {
        //validate sau

        // Tao san pham moi
        $productData =
        [
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'status'=>$request->status,
            'hot'=>$request->hot,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            
        ];
         // xu ly path images 
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $filename = time() . "-" . $originalName;
            $request->file('image')->move(public_path('images/products'), $filename);
            $productData['img'] = 'images/products/' . $filename;
        }
        ($productData);
        //sử dụng phương thức create trong repository để tạo mới sp
        $this->productRepository->create($productData);
        return redirect()->route('product')->with('success', 'Thêm sản phẩm thành công');
    }


// --> Update Product
    public function editPro($id){
        $categories = $this->categoryRepository->getAllCategoriesWithProducts();
        $pro= $this->productRepository->find($id);
        return view('admin.pages.editPro',compact('pro','categories'));
    }
    public function updatePro(Request $request, $id)
    {
        //xac thuc du lieu lam sau
        $pro = $this->productRepository->find($id);
        $categories = $this->categoryRepository->getAllCategoriesWithProducts();
       
        //data
        $productData = 
        [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'hot' => $request->hot,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ];
        // dd($productData);
        //xu ly anh
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $filename=time()."-".$originalName;
            $request->file('image')->move(public_path('images/products'), $filename);
            // Cập nhật đường dẫn hình ảnh
            $productData['img'] = 'images/products/' . $filename;
        }
        $this->productRepository->update($id, $productData);

        return redirect()->route('product')->with('success','Cập nhật sản phẩm thành công');
    }
    //Xoá sản phẩm theo ID
    public function delete($id){
        $result = $this->productRepository->delete($id);
        if ($result) {
            return redirect()->route('product')->with('success', 'Xoa sp thanh cong');
        }
        
    }

}
