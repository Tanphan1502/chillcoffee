<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Đảm bảo đã import model User
use Illuminate\Support\Facades\Hash; // Để mã hóa mật khẩu

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Xác thực đầu vào
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:15|unique:users', // Kiểm tra số điện thoại duy nhất
            'password' => 'required|string|min:6|same:confirmpassword',  // Kiểm tra trường 'confirmpassword'
        ]);

        // Kiểm tra email đã tồn tại chưa trước khi tạo mới người dùng
        $existingUser = User::where('email', $request->email)->orWhere('phonenumber', $request->phonenumber)->first();

        if ($existingUser) {
            $errorMessage = '';
            if ($existingUser->email == $request->email) {
                $errorMessage .= 'Email đã tồn tại. ';
            }
            if ($existingUser->phonenumber == $request->phonenumber) {
                $errorMessage .= 'Số điện thoại đã tồn tại. ';
            }
            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }

        // Tạo người dùng mới và lưu vào database
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),  // Chỉ lưu password
            'role' => 'user',  // Mặc định là 'user'
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }

}
