@extends('admin.layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
            {{-- form add product start  --}}
            <div class="row">
                <form action="{{ route('updatePro',$pro->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="name">Tên sản phẩm</label>
                            <input type="text" id="name" name="name" value="{{$pro->name}}" placeholder="Tên sản phẩm"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="price">Giá</label>
                            <input type="text" id="price" name="price" value="{{$pro->price}}" placeholder="Giá"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="quantity">Số lượng</label>
                            <input type="text" id="quantity" name="quantity" value="{{$pro->quantity}}" placeholder="Số lượng"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">

                                <option value="{{$pro->status}}" selected>{{$pro->status}}</option>
                                <option value="1" >Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="hot">Nổi bật</label>
                            <select name="hot" id="hot" class="form-control">
<option value="{{$pro->hot}}" selected>{{$pro->hot}}</option>
                                <option value="1" selected>Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="type">Loại</label>
                            <select name="type" id="type" class="form-control">
                                <option value="{{$pro->type}}" selected>{{$pro->type}}</option>
                                <option value="1" >Drink</option>
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
                            <input type="text" id="description" name="description" value="{{$pro->description}}"
                                placeholder="Mô tả sản phẩm" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class=" form-control-sm btn-primary pull-right ml-10">Cập nhật sản phẩm </button>
                </form>
            </div>
        </div>
        {{-- form add product end  --}}
            {{-- form add new user end --}}
        </div>
    @endsection
