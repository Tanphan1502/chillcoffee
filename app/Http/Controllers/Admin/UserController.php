<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
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
        $title = 'Danh sách người dùng';
        $user = $this->userRepository->all();
        return view('admin.pages.userList', compact('user','title'));
    }
    public function store(Request $request)
    {
        // User data
        $userData =
        [
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'password' => bcrypt($request->password),
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
       
        $this->userRepository->create($userData);
        return redirect()->route('user')->with('success','Thêm người dùng thành công');
        
    }
//edit user form
    public function editUser($id){
        $user = $this->userRepository->find($id);
        $title = 'Cập nhật thông tin người dùng';
        return view('admin.pages.editUser',compact('user','title'));
    }

    public function updateUser(Request $request, $id){
        $user = $this->userRepository->find($id);
        //xac thuc
        //cap nhat
        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'role' => $request->role,
            'status' => $request->status
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
