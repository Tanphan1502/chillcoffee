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
}