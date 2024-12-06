<?php
namespace App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getProductWithCategory($id);
    public function categoryNameByProductID($pro_id);
    public function getAllProductsWithCategories();
}
