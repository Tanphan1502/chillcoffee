<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $title = 'Danh sách người dùng';
        $user = $this->userRepository->all();
        return view('admin.pages.userList', compact('user','title'));
    }



// Them nguoi dung moi
    public function store(Request $request)
    {
        //validate 
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:15|unique:users', // Kiểm tra số điện thoại duy nhất
            'password' => 'required|string|min:6|same:confirmpassword',  // Kiểm tra trường 'confirmpassword'
          
           
        ]);

        // Kiểm tra email đã tồn tại chưa trước khi tạo mới người dùng
          $existingUser = $this->userRepository->getUserByEmailOrPhone($validatedData['email'], $validatedData['phonenumber']);
          dd($existingUser);
        // //    // $existingUser = $this->userRepository->User::where('email', $request->email)->orWhere('phonenumber', $request->phonenumber)->first();

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
        // User data

        $userData = [
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'phonenumber' => $validatedData['phonenumber'],
            'password' => bcrypt($validatedData['password']),
            'role'=>$request->role,
            'status' => $request->status,
            
        ];
        // Xử lý hình ảnh
            if ($request->hasFile('image')) {
                    $originalName = $request->file('image')->getClientOriginalName();
                    $filename = time() . "-" . $originalName;
                    $request->file('image')->move(public_path('images/users'), $filename);
                    $userData['avatar'] = 'images/users/' . $filename;
                };
       // dd($userData);
            try {
                $user = $this->userRepository->create($userData);
                return redirect()->route('user')->with('success', 'Thêm người dùng thành công');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error'=>'Thêm người dùng lỗi:'.$e->getMessage()]);
            }        
    }
       
       
        // $this->userRepository->create($userData);
        // return redirect()->route('user')->with('success','Thêm người dùng thành công');

        // $this->userRepository->create($userData);
        // return redirect()->route('user')->with('success','Thêm người dùng thành công');
        
        
    // }

    // }
    //edit user form
    public function editUser($id){
        $user = $this->userRepository->find($id);
        $title = 'Cập nhật thông tin người dùng';
        return view('admin.pages.editUser',compact('user','title'));
    }

    //edit action
    public function updateUser(Request $request, $id){
        $user = $this->userRepository->find($id);
        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'role' => $request->role,
            'status' => $request->status,
        ];

        // Xử lý hình ảnh
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $filename = time() . "-" . $originalName;
            $request->file('image')->move(public_path('images/users'), $filename);
            // Cập nhật đường dẫn hình ảnh
            $userData['avatar'] = 'images/users/' . $filename;
        };

        // Chỉ cập nhật password nếu có thay đổi
        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->password);
        }

        $this->userRepository->update($id, $userData);
        return redirect()->route('user')->with('success','Cập nhật thành công');
    }



   // xoa theo id 
    public function delete($id) {
        // Kiểm tra xem $urs_id có giá trị không
       $result = $this->userRepository->delete($id);
       if($result){
        return redirect()->route('user')->with('success','Xoá người dùng thành công');
       }else{
        return redirect()->route('user')->with('error','Người dùng không tồn tại');
       }
    }
}
