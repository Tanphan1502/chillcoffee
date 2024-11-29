<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'cart';

    // Khóa chính của bảng
    protected $primaryKey = 'cart_id';

    // Cho phép hoặc tắt timestamps tự động của Laravel (created_at, updated_at)
    public $timestamps = false;

    // Các cột có thể được gán giá trị
    protected $fillable = [
        'usr_id',
        'prd_id',
        'quantity',
        'total',
        'time',
    ];

    // Định nghĩa quan hệ nếu cần
    public function user()
    {
        return $this->belongsTo(User::class, 'usr_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'prd_id', 'id');
    }
}
