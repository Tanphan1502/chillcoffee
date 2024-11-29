<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_address';
    protected $primaryKey = 'usraddress_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'usr_id',
        'user_name',
        'address',
        'phonenumber',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usr_id', 'id');
    }

    // Đặt địa chỉ mặc định
    public static function setDefault($usrAddressId, $userId)
    {
        try {
            // Đặt status 'default' cho địa chỉ được chọn
            self::where('usraddress_id', $usrAddressId)->update(['status' => 'default']);

            // Xóa status 'default' của các địa chỉ khác
            self::where('usr_id', $userId)
                ->where('usraddress_id', '!=', $usrAddressId)
                ->update(['status' => null]);
        } catch (\Exception $e) {
            \Log::error('Error in setDefault:', ['message' => $e->getMessage()]);
            throw $e;
        }
    }

    // Lọc địa chỉ mặc định
    public function scopeDefault($query)
    {
        return $query->where('status', 'default');
    }

    // Đặt địa chỉ này làm mặc định
    public function markAsDefault()
    {
        $this->update(['status' => 'default']);

        self::where('usr_id', $this->usr_id)
            ->where('usraddress_id', '!=', $this->usraddress_id)
            ->update(['status' => null]);
    }

    // Kiểm tra xem địa chỉ này có phải là mặc định
    public function isDefault()
    {
        return $this->status === 'default';
    }

    // Kiểm tra quyền thay đổi
    public static function canUpdate($usrId, $usrAddressId)
    {
        return self::where('usr_id', $usrId)
            ->where('usraddress_id', $usrAddressId)
            ->exists();
    }
}
