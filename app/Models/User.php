<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tắt tính năng tự động cập nhật created_at và updated_at
    public $timestamps = false;

    // Đặt tên bảng tương ứng (nếu không phải là "users")
    protected $table = 'users';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'usr_id', 'username', 'email', 'address', 'phonenumber', 'password', 'role','status'
    ];

    // Đảm bảo password và confirm password được mã hóa
    protected $hidden = [
        'password', 'confirmpassword', 'remember_token',
    ];

    // Định dạng ngày tháng nếu cần
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getIsAdminAttribute(){
    //     return $this->role==='admin';
    // }
    // Các mối quan hệ với các model khác (nếu có)
    // Ví dụ: public function posts() { return $this->hasMany(Post::class); }
}
