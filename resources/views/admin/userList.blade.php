@extends('admin.layout')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
<div class="ibox-content m-b-sm border-bottom">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="product_name">Tên người dùng</label>
                                    <input type="text" id="product_name" name="product_name" value="" placeholder="Tên Người dùng"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="status">Vị trí</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" selected>Quản trị viên</option>
                                        <option value="0">Thành viên</option>
                                        <option value="0">Khách hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" selected>Chờ kích hoạt</option>
                                        <option value="0">Kích hoạt</option>
                                        <option value="0">Ngưng Kích hoạt</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class=" form-control-sm btn-primary pull-right ml-10">Thêm Nhanh </button>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content">
                
                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                        <thead>
                                            <tr>
                
                                                <th data-toggle="true">Tên Người dùng</th>
                                                <th data-hide="phone">Vị trí</th>
                                                <!-- <th data-hide="all">Mô tả ngắn</th>
                                                <th data-hide="phone">Giá</th>
                                                <th data-hide="phone,tablet">Số lượng</th> -->
                                                <th data-hide="phone">Trạng thái</th>
                                                <th class="text-right" data-sort-ignore="true">Hành động</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- static data 1 -->
                                            <tr>
                                                <td>
                                                   Admin 1
                                                </td>
                                                <td>
                                                   Quản trị viên
                                                </td>
                                                <!-- <td>
                                                    Cà phê hạt sản xuất
                                                </td>
                                                <td>
                                                    50.00 vnd
                                                </td>
                                                <td>
                                                    1000
                                                </td> -->
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
                                            <tr>
                                                <td>
                                                   Admin 2
                                                </td>
                                                <td>
                                                   Thành viên
                                                </td>
                                                <!-- <td>
                                                    Cà phê hạt sản xuất
                                                </td>
                                                <td>
                                                    50.00 vnd
                                                </td>
                                                <td>
                                                    1000
                                                </td> -->
                                                <td>
                                                    <span class="label label-warning">Chờ kích hoạt</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn-white btn btn-xs">Sửa</button>
                                                        <button class="btn-white btn btn-xs">Xoá</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                   User 3
                                                </td>
                                                <td>
                                                   Khách hàng
                                                </td>
                                                <!-- <td>
                                                    Cà phê hạt sản xuất
                                                </td>
                                                <td>
                                                    50.00 vnd
                                                </td>
                                                <td>
                                                    1000
                                                </td> -->
                                                <td>
                                                    <span class="label label-danger">Ngừng kích hoạt</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn-white btn btn-xs">Sửa</button>
                                                        <button class="btn-white btn btn-xs">Xoá</button>
                                                    </div>
                                                </td>
                                            </tr>
                                         

<!-- static data 1 end -->

                                          
                
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