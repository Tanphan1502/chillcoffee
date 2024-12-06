<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    //Lấy một sản phẩm cụ thể cùng với thông tin danh mục của nó dựa trên id.
    public function getAllCategoriesWithProducts()
    {
        return $this->model->with('product')->get();
    }
}