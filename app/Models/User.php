<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
    {
        use HasFactory, Notifiable;
        // Đặt tên bảng tương ứng (nếu không phải là "users")
        protected $table = 'users';
        //Xac dinh moi quan he voi bang order
        public function orders()
        {
            return $this->hasMany(Orders::class, 'user_id');
        }

        // Ba tính năng tự động cập nhật created_at và updated_at
        //public $timestamps = true;
        
        // Các thuộc tính có thể được gán hàng loạt
        protected $fillable = [
            'id', 'username','avatar' ,'email', 'address', 'phonenumber', 'password', 'role','status','created_at','updated_at'
        ];

        // Đảm bảo password và confirm password được mã hóa
        protected $hidden = [
            'password', 'confirmpassword', 'remember_token',
        ];

        // Định dạng ngày tháng nếu cần
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
    }
