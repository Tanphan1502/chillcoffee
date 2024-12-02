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
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
            'status'=>$request->status
            
        ]);
        return redirect()->route('user')->with
        ('success','Thêm người dùng thành công');
        
    }



//edit user form
    public function editform($usr_id){
        $user = $this->userRepository->find($usr_id);
        return view('admin.pages.editUser',compact('user'));
    }

    public function update(Request $request, $id){
        $user = $this->userRepository->find($id);
        //xac thuc
        //cap nhat
        //dd($usr_id);
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'phonenumber' => $request->phonenumber,
            'role' => $request->role,
            'status' => $request->status
        ];
        // Chỉ cập nhật password nếu có thay đổi
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $this->userRepository->update($id, $data);

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
