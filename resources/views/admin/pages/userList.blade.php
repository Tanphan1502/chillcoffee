@extends('admin.layout')
@section('content')
    <!-- sử dụng hàm old() để lưu lại giá trị khi người dùng gửi form lỗi -->
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        {{-- form add new user start --}}
        <div class="ibox-content m-b-sm border-bottom">
            <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="username">Tên người dùng</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}"
                                placeholder="Tên Người dùng" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="address">Địa chỉ</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}"
                                placeholder="Địa chỉ" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="phonenumber">Số điện thoại</label>
                            <input type="number" id="phonenumber" name="phonenumber" value="{{ old('phonenumber') }}"
                                placeholder="Số điện thoại" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" placeholder="Mật khẩu"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">Nhập lại mật khẩu</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Nhập lại mật khẩu" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="role">Vị trí</label>
                            <select name="role" id="role" class="form-control">
                                <option value="admin" selected>Quản trị viên</option>
                                <option value="user">Khách hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="inactive" selected>Chờ kích hoạt</option>
                                <option value="active">Kích hoạt</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" accept="image/*" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class=" btn btn-primary ">Thêm Nhanh </button>
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
                                    <th data-hide="phone">Vị trí</th>
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
                                                <span class="label label-primary"> kích hoạt</span>
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
