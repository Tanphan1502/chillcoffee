@extends('admin.layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
            {{-- form add product start  --}}
            <div class="row">
                <form action="{{ route('addPro') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên sản phẩm</label>
                            <input type="text" id="name" name="name" value="" placeholder="Tên sản phẩm"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="price">Giá</label>
                            <input type="text" id="price" name="price" value="" placeholder="Giá"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="quantity">Số lượng</label>
                            <input type="text" id="quantity" name="quantity" value="" placeholder="Số lượng"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" selected>Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="hot">Nổi bật</label>
                            <select name="hot" id="hot" class="form-control">
                                <option value="1" selected>Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="type">Loại</label>
                            <select name="type" id="type" class="form-control">
                                <option value="1" selected>Drink</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" accept="image/*" class="form-control">
                            <!--accept="image/*" de trinh duyet chi hien thi file hinh anh tang trai nghiem ng dung-->
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="description">Mô tả ngắn</label>
                            <input type="text" id="description" name="description" value=""
                                placeholder="Mô tả sản phẩm" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class=" form-control-sm btn-primary pull-right ml-10">Thêm mới </button>
                </form>
            </div>
        </div>
        {{-- form add product end  --}}

        {{-- show data section start --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th data-toggle="true">Tên sản phẩm</th>
                                    <th>Sản phẩm</th>
                                    <th data-hide="phone">Loại</th>
                                    <th data-hide="all">Mô tả ngắn</th>
                                    <th data-hide="phone">Giá</th>
                                    <th data-hide="phone,tablet">Số lượng</th>
                                    <th data-hide="phone">Trạng thái</th>
                                    <th data-hide="phone">Nổi bật</th>
                                    <th class="text-right" data-sort-ignore="true">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- data start -->
                                @foreach ($pro as $pro)
                                    <tr>
                                        <td>
                                            {{ $i += 1 }}
                                        </td>
                                        <td>
                                            {{ $pro->name }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($pro->img) }}" alt="{{ $pro->img }}"
                                                style="width: 50px; height: 50px;">
                                        </td>
                                        <td>
                                            {{ $pro->type }}
                                        </td>
                                        <td>
                                            {{ $pro->description }}
                                        </td>
                                        <td>
                                            {{ $pro->price }} vnd
                                        </td>
                                        <td>
                                            {{ $pro->quantity }}
                                        </td>
                                        <td>
                                            <span class="label label-primary" value="">{{ $pro->status }}</span>
                                        </td>
                                        <td>{{ $pro->hot }}</td>
                                        <td class="text-right"style="display:flex">
                                            <div class="btn-group">
                                                <form action="{{route('editPro',$pro->id)}}"style="display:inline" >
                                                    <button type="submit" class="btn-white btn btn-xs">Sửa</button>
                                                </form>
                                                <form action="{{ route('delPro', $pro->id) }}" method="POST"
                                                    style="display:inline ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-white btn btn-xs"
                                                        onclick="return confirm('Ban chac chan xoa {{ $pro->name }}')">Xoá</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- data 1 end -->
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
        {{-- show data section end --}}
    </div>
@endsection
