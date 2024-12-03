<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository =$productRepository;
    }

    //Show sản phẩm
    public function index(){
        $i=0;
        $pro = $this->productRepository->all();
        return view('admin.pages.productList', compact('pro','i'));
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
            'type'=>$request->type,
            
        ];
         // xu ly path images 
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $filename = time() . "-" . $originalName;
            $request->file('image')->move(public_path('images/products'), $filename);
            // Cập nhật đường dẫn hình ảnh
            $productData['img'] = 'images/products/' . $filename;
        }
        // dd($imagePath);
        //sử dụng phương thức create trong repository để tạo mới sp
        $this->productRepository->create($productData);
        return redirect()->route('product')->with('success', 'Thêm sản phẩm thành công');
    }

    public function editPro($id){
        $pro= $this->productRepository->find($id);
        return view('admin.pages.editPro',compact('pro'));
    }
   
    public function updatePro(Request $request, $id)
    {
        //xac thuc du lieu
        //chuan bi du lieu cap nhat
        $pro = $this->productRepository->find($id);
       
        //data
        $productData = 
        [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'hot' => $request->hot,
            'description' => $request->description,
            'type' => $request->type,
        ];
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
