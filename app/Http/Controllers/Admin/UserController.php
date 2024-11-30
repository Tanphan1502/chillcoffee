<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Http\Request;
class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $user = $this->userRepository->all();
        return view('admin.pages.userList', compact('user'));
    }
    public function store(Request $request)
    {
        //Authenticate
        // $request->validate([
        //     'username'=>'required|string|min:3',
        //     'email'=>'required|email|unique:user',
        //     'password'=>'required|string|min:5|confirmed',
        // ]);
       
        // create new user with repository
        $this->userRepository->create([
            'username'=>$request->username,
            'email'=>$request->email,
            'address'=>$request->address,
            'phonenumber'=>$request->phonenumber,
            'role'=>$request->role,
            'password'=>bcrypt($request->password),
            
        ]);
        //dd($request->all());
        return redirect()->route('user')->with('success','Thêm người dùng thành công');
    }
}
