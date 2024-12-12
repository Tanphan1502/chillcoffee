@extends('admin.layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
            {{-- form add new user start --}}
            <form action="{{ route('updateUser', $user->id) }}" method="post" enctype="multipart/form-data">
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
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Nhập lại mật khẩu" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="role">Vai trò</label>
                            <select name="role" id="role" class="form-control">
                                <option value="{{ $user->role }}" selected>
                                    @if ($user->role === 'admin')
                                        <span>Quản trị viên</span>
                                <option value="user">Khách hàng</option>
                            @else
                                <span>Khách hàng</span>
                                <option value="admin">Quản trị viên</option>
                                @endif
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="{{ $user->status }}" selected>
                                    @if ($user->status === 'active')
                                        <span>Kích hoạt</span>
                                <option value="Inactive">Chưa kích hoạt</option>
                            @else
                                <span>Chưa kích hoạt</span>
                                <option value="active">Kích hoạt</option>
                                @endif
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->avatar }}"
                                style="width: 50px; height: 50px; ">
                            <label class="control-label" for="image">Hình ảnh</label>

                            <input type="file" id="image" name="image" accept="image/*" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-2 pull-right">
                        <div class="form-group">
                            <button type="submit" class=" btn btn-primary ">Cập Nhật </button>
                        </div>
                    </div>

                </div>
            </form>
            {{-- form add new user end --}}
        </div>
    </div>
@endsection
