@extends('admin.layout')
@section('content')
     <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="order_id">Mã đơn hàng</label>
                                <input type="text" id="order_id" name="order_id" value="" placeholder="Mã đơn hàng"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="status">Trạng thái</label>
                                <input type="text" id="status" name="status" value="" placeholder="Trạng thái" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="customer">Khách hàng</label>
                                <input type="text" id="customer" name="customer" value="" placeholder="Tên kháchh hàng"
                                    class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary fa-pull-right">Tìm đơn hàng</button>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Ngày nhận đơn</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added"
                                        type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="date_modified"></label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified"
                                        type="text" class="form-control" value="03/06/2014">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="amount">Amount</label>
                                <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                            </div>
                        </div>
                    </div> -->
            
                </div>
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">
            
                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                    <thead>
                                        <tr>
            
                                            <th>Mã đơn hàng</th>
                                            <th data-hide="phone">Khách hàng</th>
                                            <th data-hide="phone">Thành tiền</th>
                                            <th data-hide="phone">Ngày mua</th>
                                            <th data-hide="phone,tablet">Date modified</th>
                                            <th data-hide="phone">Trạng thái</th>
                                            <th class="text-right">Hành động</th>
            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                3221
                                            </td>
                                            <td>
                                                Khách 2
                                            </td>
                                            <td>
                                                500.000 vnd
                                            </td>
                                            <td>
                                                23/12/2024
                                            </td>
                                            <td>
                                                03/05/2015
                                            </td>
                                            <td>
                                                <span class="label label-success">Đang vận chuyển</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs">Xem</button>
                                                    <button class="btn-white btn btn-xs">Sửa</button>
                                                    <button class="btn-white btn btn-xs">Xoá</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                32234
                                            </td>
                                            <td>
                                                Khách 1
                                            </td>
                                            <td>
                                                500.000 vnd
                                            </td>
                                            <td>
                                                03/12/2024
                                            </td>
                                            <td>
                                                03/05/2015
                                            </td>
                                            <td>
                                                <span class="label label-primary">Hoàn tất</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs">Xem</button>
                                                    <button class="btn-white btn btn-xs">Sửa</button>
                                                    <button class="btn-white btn btn-xs">Xoá</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3232
                                            </td>
                                            <td>
                                                Khách4
                                            </td>
                                            <td>
                                                5004.000 vnd
                                            </td>
                                            <td>
                                                4/12/2024
                                            </td>
                                            <td>
                                                03/05/2015
                                            </td>
                                            <td>
                                                <span class="label label-warning">Chờ xác nhận</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs">Xem</button>
                                                    <button class="btn-white btn btn-xs">Sửa</button>
                                                    <button class="btn-white btn btn-xs">Xoá</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3215
                                            </td>
                                            <td>
                                                Khách 4
                                            </td>
                                            <td>
                                                500.000 vnd
                                            </td>
                                            <td>
                                                13/12/2024
                                            </td>
                                            <td>
                                                03/05/2015
                                            </td>
                                            <td>
                                                <span class="label label-danger">Huỷ đơn hàng</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs">Xem</button>
                                                    <button class="btn-white btn btn-xs">Sửa</button>
                                                    <button class="btn-white btn btn-xs">Xoá</button>
                                                </div>
                                            </td>
                                        </tr>
                                       
            
            
            
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
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