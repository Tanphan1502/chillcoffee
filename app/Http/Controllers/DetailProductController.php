<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function detailproduct($id)
    {
        $product = Product::findOrFail($id); // Lấy thông tin sản phẩm theo ID
        $newProducts = Product::newProducts(4) // Sử dụng scope `newProducts` đã định nghĩa trong model
                          ->where('type', $product->type)
                          ->where('prd_id', '!=', $product->prd_id)
                          ->get();
        return view('detailproduct', compact('product', 'newProducts')); // Truyền dữ liệu sang view
    }
}
