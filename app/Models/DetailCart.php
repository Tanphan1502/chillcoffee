<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    use HasFactory;

    protected $table = 'detailcarts'; // Tên bảng
    protected $primaryKey = 'cartdetail_id'; // Khóa chính

    // Các trường có thể điền vào
    protected $fillable = [
        'cart_id',
        'username',
        'phonenumber',
        'address',
        'total_quantity',
        'total_price',
        'time',
        'status',
    ];

    // Quan hệ với bảng Cart (nếu có)
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
}
