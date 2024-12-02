<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductCotroller extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository =$productRepository;
    }

    public function index(){
        $pro = $this->productRepository->all();
        return view('admin.pages.productList', compact('pro'));
    }

}
