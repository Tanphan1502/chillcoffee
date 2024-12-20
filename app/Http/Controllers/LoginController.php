<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Hiển thị trang đăng nhập
    public function login()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    public function authenticate(Request $request)
    {
        // Validate thông tin người dùng
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Xác thực thông tin người dùng
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            session([
                'user_id' => $user->id,
                'user_email' => $user->email,
                'user_name' => $user->username,
                'user_role' => $user->role,
                
            ]);


            // Role handle
            if ($user->role ==="admin") {
                return redirect()->route('admin');
            }else{
                return redirect()->route('home');
            }
            // Nếu đăng nhập thành công, chuyển hướng đến trang chủ hoặc trang mong muốn
            
        }

        // Nếu đăng nhập thất bại, quay lại trang đăng nhập và thông báo lỗi
        return back()->withErrors([
            'email' => 'Thông tin vừa nhập không đúng',
        ])->withInput();
    }

    // Đăng xuất người dùng
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }
}
