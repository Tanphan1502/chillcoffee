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
                                <option value="{{$pro->status}}" selected>
                                    @if ($pro->status == 0)
                                                <span >Ẩn</span>
                                                <option value="1" >Hiện</option>    
                                    @else
                                                <span>Hiện</span>
                                                <option value="0" >Ẩn</option>   
                                    @endif
                                </option>
                                {{-- <option value="1" >Hiện</option>
                                <option value="0">Ẩn</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="hot">Nổi bật</label>
                            <select name="hot" id="hot" class="form-control">
                                 <option value="{{$pro->status}}" selected>
                                    @if ($pro->hot == 0)
                                                <span >Không</span>
                                                <option value="1" >Có</option>    
                                    @else
                                                <span>Có</span>
                                                <option value="0" >Không</option>   
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>
                         <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" accept="image/*" class="form-control">
                            <!--accept="image/*" de trinh duyet chi hien thi file hinh anh tang trai nghiem ng dung-->
                        </div>
                        <img src="{{ asset($pro->img) }}" alt="{{ $pro->img }}"  style="width: 50px; height: 50px; ">
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="category_id">Loại</label>
                            <select name="category_id" id="category_id" class="form-control">
                               @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="description">Mô tả ngắn</label>
                            <input type="text" id="description" name="description" value="{{$pro->description}}"
                                placeholder="Mô tả sản phẩm" class="form-control">
                        </div>
                    </div>

                     <div class="col-sm-2 pull-right">
                        <div class="form-group">
                            <label class="control-label" for="description">,</label>
                            <button type="submit" class=" btn btn-primary ">Cập Nhật </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- form add product end  --}}
            {{-- form add new user end --}}
        </div>
    @endsection
