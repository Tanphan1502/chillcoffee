<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\RepositoryInterface\ProductRepositoryInterface;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    //Lấy một sản phẩm cụ thể cùng với thông tin danh mục của nó dựa trên id.
    public function getProductWithCategory($id)
    {
        return $this->model->with('category')->find($id);
    }

    //lấy tên danh mục của một sản phẩm cụ thể dựa trên productId.
    public function categoryNameByProductID($pro_id)
    {
        $product = $this->model->with('category')->find($pro_id);
        return $product?$product->category->name:null; // tra ve ten danh muc hoac null
    }

    // lấy tất cả sản phẩm cùng với thông tin danh mục của no.
    public function getAllProductsWithCategories()
    {
        return $this->model->with('category')->get();
    }
}