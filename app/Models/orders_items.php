<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_items extends Model
{
    protected $table = 'orders_items';
    public function order(){
        return $this->belongsTo(orders::class,'order_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'pro_id');
    }
    use HasFactory;
}
