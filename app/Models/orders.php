<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    //Moi quan he voi bang User
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    // moi quan he voi bang order_item
    public function order_items(){
        return $this->hasMany(orders_items::class, 'order_id');
    }
    use HasFactory;
}
