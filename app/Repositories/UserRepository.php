<?php 
namespace App\Repositories;

use App\Models\User;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);// Truyền tên cột ID
    }

    public function getUserByEmailOrPhone($email, $phone)
    {
        return User::where('email', $email)
            ->orWhere('phonenumber', $phone)
            ->first();
    }

  
}