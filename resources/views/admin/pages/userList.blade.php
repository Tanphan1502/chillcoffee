@extends('admin.layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
            {{-- form add new user start --}}
            <form action="{{route('addUser')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="username">Tên người dùng</label>
                            <input type="text" id="username" name="username" value=""
                                placeholder="Tên Người dùng" class="form-control" required>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" id="email" name="email" value=""
                                placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="address">Địa chỉ</label>
                            <input type="text" id="address" name="address" value=""
                                placeholder="Địa chỉ" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="user_name">Số điện thoại</label>
                            <input type="number" id="phonenumber" name="phonenumber" value=""
                                placeholder="Số điện thoại" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" value=""
                                placeholder="Mật khẩu" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">Nhập lại mật khẩu</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" value=""
                                placeholder="Nhập lại mật khẩu" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="role">Vị trí</label>
                            <select name="role" id="status" class="form-control">
                                <option value="admin" selected>Quản trị viên</option>
                                <option value="user">Khách hàng</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" selected>Chờ kích hoạt</option>
                                <option value="1">Kích hoạt</option>
                                
                            </select>
                        </div>
                    </div> --}}
                    <button type="submit" class=" form-control-sm btn-primary pull-right ml-10">Thêm Nhanh </button>
                </div>
            </form>
            {{-- form add new user end --}}
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>

                                    <th data-toggle="true">Tên Người dùng</th>
                                    <th data-hide="email">Email</th>
                                    <th data-hide="phone">Điện thoại</th>
                                    <th data-hide="phone">Địa chỉ</th>
                                    <th data-hide="phone">Vị trí</th>
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
                                            {{ $item->role }}

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
                                            <span class="label label-primary">Kích hoạt</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button class="btn-white btn btn-xs">Sửa</button>
                                                <button class="btn-white btn btn-xs">Xoá</button>
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
