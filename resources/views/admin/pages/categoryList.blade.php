@extends('admin.layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <form action="{{route('addCat') }}" method="POST">
                    @csrf
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="name">Loại sản phẩm</label>
                        <input type="text" id="name" name="name" value="" placeholder="Loại sản phẩm"
                            class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="description">Mô tả ngắn</label>
                        <input type="text" id="description" name="description" value="" placeholder="Mô tả ngắn"
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
                 <div class="col-sm-4">
                    <div class="form-group">
                       
                    <button type="submit" class=" col-sm-4 form-control btn-primary">Thêm mới </button>
                    </div>
                </div>
                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>

                                    <th data-toggle="true">Tên loại</th>

                                    <th data-hide="all">Mô tả ngắn</th>

                                    <th data-hide="phone">Trạng thái</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Show data 1 -->
                            @foreach ($cat as $cat )
                                 <tr>
                                    <td>
                                        {{$cat->name}}
                                    </td>

                                    <td>
                                        {{$cat->description}}
                                    </td>

                                    <td>
                                        <span class="label label-danger">{{$cat->status}}</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">Sửa</button>
                                            <button class="btn-white btn btn-xs">Xoá</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                               

                                <!--  data 1 end -->



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
