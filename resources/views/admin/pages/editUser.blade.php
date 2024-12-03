@extends('admin.layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
            {{-- form add new user start --}}
            <form action="{{ route('updateUser', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="username">Tên người dùng</label>
                            <input type="text" id="username" name="username" value="{{ $user->username }}"
                                placeholder="Tên Người dùng" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}"
                                placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="address">Địa chỉ</label>
                            <input type="text" id="address" name="address" value="{{ $user->address }}"
                                placeholder="Địa chỉ" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="phonenumber">Số điện thoại</label>
                            <input type="number" id="phonenumber" name="phonenumber" value="{{ $user->phonenumber }}"
                                placeholder="Số điện thoại" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" value="" placeholder="Mật khẩu"
                                class="form-control">
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
                                
                                <option value="admin" >Quản trị viên</option>
                                <option value="user">Khách hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                 <option value="{{$user->status}}" selected></option>
                                <option value="inactive" >Chờ kích hoạt</option>
                                <option value="active">Kích hoạt</option>

                            </select>
                        </div>
                    </div>
                        <button type="submit" class=" form-control-sm btn-primary pull-right ml-10">Cap nhat </button>
                  
                </div>
            </form>
            {{-- form add new user end --}}
        </div>
    @endsection
