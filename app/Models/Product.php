<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tên bảng trong CSDL
    protected $table = 'products';

    // Khóa chính của bảng
    //protected $primaryKey = 'id';

    // Cho phép Eloquent tự động thêm timestamp nếu bảng không có cột `created_at` và `updated_at`
    public $timestamps = false;

    // Các cột có thể điền dữ liệu (Mass Assignment)
    protected $fillable = [
        'id', 'name', 'img', 'price', 'quantity', 'type', 'description'
    ];

    /**
     * Scope: Lấy các sản phẩm mới.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewProducts($query, $limit)
    {
        return $query->orderBy('id', 'desc')->limit($limit);
    }

    /**
     * Scope: Lấy các sản phẩm còn hàng.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInStockProducts($query, $limit)
    {
        return $query->where('quantity', '>', 0)->limit($limit);
    }

    /**
     * Tạo mới một sản phẩm.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createProduct($data)
    {
        return self::create($data);
    }

    /**
     * Lấy sản phẩm theo ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function getProductById($id)
    {
        return self::find($id);
    }

    /**
     * Cập nhật sản phẩm theo ID.
     *
     * @param int $id
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function updateProduct($id, $data)
    {
        $product = self::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public static function deleteProduct($id)
    {
        $product = self::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }

    /**
     * Tìm sản phẩm theo tên.
     *
     * @param string $keyword
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function searchProductByName($keyword)
    {
        return self::where('name', 'like', '%' . $keyword . '%')->get();
    }

    /**
     * Tìm sản phẩm theo khoảng giá.
     *
     * @param float $minPrice
     * @param float $maxPrice
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function searchProductByPriceRange($minPrice, $maxPrice)
    {
        return self::whereBetween('price', [$minPrice, $maxPrice])->get();
    }
}
