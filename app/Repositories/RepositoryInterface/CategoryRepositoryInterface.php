<?php
namespace App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllCategoriesWithProducts();
}
