<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    // Các cột có thể điền dữ liệu (Mass Assignment)
    protected $fillable = [
        'id',
        'name',
        'description',
        'status'
    ];
}
