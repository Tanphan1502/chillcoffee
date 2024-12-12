@extends('admin.layout')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .error-message {
        color: red;
        font-size: 0.9em;
        display: none;
        /* Ẩn thông báo theo mặc định */
        position: absolute;
        /* Đặt vị trí tuyệt đối */
        margin-top: 0px;
        /* Khoảng cách từ trường nhập liệu */
    }

    .form-group {
        position: relative;
        /* Để thông báo lỗi có thể sử dụng vị trí tuyệt đối */
        margin-bottom: 10px;
        /* Khoảng cách giữa các nhóm trường */
    }
</style>
@section('content')
    <!-- sử dụng hàm old() để lưu lại giá trị khi người dùng gửi form lỗi -->
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        {{-- form add new user start --}}
        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                {{-- prepair field  --}}
                @csrf
                @method('POST')

                <div class="row">
                    {{-- Username field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="username">Tên người dùng</label>
                            <input type="text" id="username" name="username" placeholder="Ví dụ: Nguyễn văn a"
                                class="form-control" onkeyup="validateName();">
                            <p id="usernameMessage" class="error-message">Vui lòng nhập tên</p>
                        </div>
                    </div>

                    {{-- Email field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" id="email" name="email" onchange="validateEmail();"
                                placeholder="ví dụ: Email@mail.com" class="form-control">
                            <p id="emailMessage" class="error-message">Email không hợp lệ. Vui lòng nhập lại.</p>
                        </div>
                    </div>

                    {{-- Address field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="address">Địa chỉ</label>
                            <input type="text" id="address" name="address" placeholder="123 ngõ 1 hẻm 1 đường 1 ..."
                                class="form-control" onchange="validateAddress();">
                            <p id="addressMessage" class="error-message">Vui lòng nhập địa chỉ</p>
                        </div>
                    </div>

                    {{-- phone number field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="phonenumber">Số điện thoại</label>
                            <input type="tel" id="phonenumber" name="phonenumber" placeholder="090 XXX XXX"
                                class="form-control" onkeyup="validatePhone()">
                            <p id="phonenumberMessage" class="error-message">Vui lòng nhập số điện thoại lớn hơn 10 kí tự
                            </p>
                        </div>
                    </div>

                    {{-- Password field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" placeholder="Mật khẩu"
                                class="form-control" onkeyup="validatePass();">
                            <p id="passwordMessage" class="error-message">Mật khẩu tối thiểu 5 kí tự</p>
                        </div>
                    </div>

                    {{-- Confirm password field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="confirmpassword">Nhập lại mật khẩu</label>
                            <input type="password" id="confirmpassword" name="confirmpassword"
                                placeholder="Nhập lại mật khẩu" class="form-control" onkeyup="validateConfirmPass();">
                            <p id="confirmMessage" class="error-message">Mật khẩu không trùng khớp</p>
                        </div>
                    </div>

                    {{-- Role field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="role">Vai trò</label>
                            <select name="role" id="role" class="form-control">
                                <option value="admin" selected>Quản trị viên</option>
                                <option value="user">Khách hàng</option>
                            </select>

                        </div>
                    </div>

                    {{-- Status field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="inactive" selected>Chờ kích hoạt</option>
                                <option value="active">Kích hoạt</option>
                            </select>
                        </div>
                    </div>

                    {{-- image field  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" accept="image/*" class="form-control">
                        </div>
                    </div>

                    {{-- button  --}}
                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" class=" btn btn-primary ">Thêm Nhanh </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        {{-- form add new user end --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th data-toggle="true">Tên Người dùng</th>
                                    <th>Avatar</th>
                                    <th data-hide="phone">Vai trò</th>
                                    <th data-hide="phone">Điện thoại</th>
                                    <th data-hide="email">Email</th>
                                    <th data-hide="phone">Địa chỉ</th>
                                    <th data-hide="phone">Trạng thái</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data-->
                                @foreach ($user as $item)
                                    <tr>
                                        <td>
                                            {{ $item->username }}

                                        </td>
                                        <td>
                                            <img class="img-circle" src="{{ asset($item->avatar) }}"
                                                alt="{{ $item->avatar }}" style="width: 50px; height: 50px;">
                                        </td>
                                        <td>

                                            @if ($item->role === 'admin')
                                                <span class="label label-warning">Admin</span>
                                            @else
                                                <span class="label label-primary"> Khách hàng</span>
                                            @endif

                                        </td>
                                        <td>
                                            {{ $item->phonenumber }}
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td>
                                            {{ $item->address }}
                                        </td>
                                        <td>
                                            @if ($item->status === 'inactive')
                                                <span class="label label-warning">Chưa kích hoạt</span>
                                            @else
                                                <span class="label label-primary"> Kích hoạt</span>
                                            @endif

                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <form action="{{ route('editUser', $item->id) }}" method="GET"
                                                    style="display:inline;">
                                                    <button class="btn-white btn btn-xs">Sửa</button>
                                                </form>
                                                <form action="{{ route('delUser', $item->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-white btn btn-xs"
                                                        onclick="return confirmDel()">Xoá </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
