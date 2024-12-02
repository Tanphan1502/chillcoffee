@extends('admin.layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                
                
                    <div class="ibox-content m-b-sm border-bottom">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="product_name">Tên sản phẩm</label>
                                    <input type="text" id="product_name" name="product_name" value="" placeholder="Tên sản phẩm"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label" for="price">Giá</label>
                                    <input type="text" id="price" name="price" value="" placeholder="Giá" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Số lượng</label>
                                    <input type="text" id="quantity" name="quantity" value="" placeholder="Số lượng"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label" for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" selected>Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class=" form-control-sm btn-primary pull-right ml-10">Thêm mới </button>
                        </div>
                
                    </div>              
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content">
                
                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                        <thead>
                                            <tr>
                
                                                <th data-toggle="true">Tên sản phẩm</th>
                                                <th data-hide="phone">Loại</th>
                                                <th data-hide="all">Mô tả ngắn</th>
                                                <th data-hide="phone">Giá</th>
                                                <th data-hide="phone,tablet">Số lượng</th>
                                                <th data-hide="phone">Trạng thái</th>
                                                <th class="text-right" data-sort-ignore="true">Hành động</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- static data 1 -->
                                            @foreach ($pro as $pro )
                                                <tr>
                                                <td>
                                                    {{$pro->name}}
                                                 
                                                </td>
                                                <td>
                                                    Cà phê hạt
                                                </td>
                                                <td>
                                                    Cà phê hạt sản xuất
                                                </td>
                                                <td>
                                                    50.00 vnd
                                                </td>
                                                <td>
                                                    1000
                                                </td>
                                                <td>
                                                    <span class="label label-primary">Hiện</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn-white btn btn-xs">Sửa</button>
                                                        <button class="btn-white btn btn-xs">Xoá</button>
                                                    </div>
                                                </td>
                                            </tr> 
                                            @endforeach
                                           
                                           

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