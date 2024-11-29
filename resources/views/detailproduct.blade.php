@extends('layout')
@section('content')

    <section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Product Detail</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product Detail</span></p>
        </div>

        </div>
    </div>
    </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="/images/{{ $product->img }}" class="image-popup"><img src="/images/{{ $product->img }}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <p class="price"><span>${{ $product->price }}</span></p>
                    <p>{{ $product->description }}</p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                        <div class="select-wrap">
                        <!-- <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                            <option value="">Small</option>
                        <option value="">Medium</option>
                        <option value="">Large</option>
                        <option value="">Extra Large</option>
                        </select> -->
                    </div>
                    </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                    <span class="input-group-btn mr-2">
                        <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                            <i class="icon-minus"></i>
                        </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                    <span class="input-group-btn ml-2">
                        <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                            <i class="icon-plus"></i>
                        </button>
                    </span>
                    </div>
                </div>
                <p>
                    <a href="#" class="btn btn-primary py-3 px-5 add-to-cart" 
                    data-id="{{ $product->prd_id }}" 
                    data-name="{{ $product->name }}" 
                    data-price="{{ $product->price }}" 
                    data-img="{{ $product->img }}">
                    Add to Cart
                    </a>
                </p>
                </div>  
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
            <h2 class="mb-4">Related products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="row">
            @foreach($newProducts as $product)
                <div class="col-md-3">
                    <div class="menu-entry">
                        <!-- Hiển thị ảnh sản phẩm -->
                        <a href="{{ route('detailproduct', ['id' => $product->prd_id]) }}" class="img" style="background-image: url('/images/{{ $product->img }}');"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="{{ route('detailproduct', ['id' => $product->prd_id]) }}">{{ $product->name }}</a></h3>
                            <!-- Hiển thị mô tả sản phẩm -->
                            <p>{{ $product->description }}</p>
                            <!-- Hiển thị giá sản phẩm -->
                            <p class="price"><span>${{ $product->price }}</span></p>
                            <!-- Nút thêm vào giỏ hàng -->
                            <p>
                                <a href="#" 
                                    class="btn btn-primary btn-outline-primary add-to-cart" 
                                    data-id="{{ $product->prd_id }}" 
                                    data-name="{{ $product->name }}" 
                                    data-price="{{ $product->price }}" 
                                    data-img="{{ $product->img }}">
                                    Add to Cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection

<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Xử lý sự kiện khi click vào nút "minus"
        document.querySelectorAll('.quantity-left-minus').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const quantityInput = this.closest('.input-group').querySelector('.input-number');
                let currentQuantity = parseInt(quantityInput.value);

                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                }
            });
        });

        // Xử lý sự kiện khi click vào nút "plus"
        document.querySelectorAll('.quantity-right-plus').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const quantityInput = this.closest('.input-group').querySelector('.input-number');
                let currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
            });
        });
    });

</script>