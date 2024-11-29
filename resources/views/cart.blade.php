@extends('layout')
@section('content')

    <section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Cart</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
        </div>

        </div>
    </div>
    </div>
    </section>
    
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="cart">
                            @if(count($cart) > 0)
                                @foreach($cart as $item)
                                    <tr class="text-center" id="row-{{ $item['id'] }}">
                                        <td class="product-remove">
                                            <button 
                                                class="btn-remove-product" 
                                                data-url="{{ route('cart.remove', $item['id']) }}" 
                                                style="border: none; background: none;">
                                                <span class="icon-close" style="cursor: pointer;"></span>
                                            </button>
                                        </td>
                                        <td class="image-prod"><div class="img" style="background-image:url(images/{{ $item['img'] }});"></div></td>
                                        <td class="product-name">
                                            <h3>{{ $item['name'] }}</h3>
                                            <p>Far far away, behind the word mountains, far from the countries</p>
                                        </td>
                                        <td class="price">${{ $item['price'] }}</td>
                                        <td class="quantity">
                                            <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="form-inline justify-content-center align-items-center form-control" id="update-form-{{ $item['id'] }}">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <input type="number" name="quantity" style="border: none !important;" class="quantity form-control" value="{{ $item['quantity'] }}" min="1" max="100" onchange="updateQuantity({{ $item['id'] }}, this.value)">
                                                </div>
                                            </form>
                                        </td>
                                        <td class="total" id="total-{{ $item['id'] }}">${{ $item['price'] * $item['quantity'] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No product in the cart</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if(count($cart) > 0)
            <div class="row justify-content-end" id="cart-totals">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        
                        @php
                            $subtotal = 0;
                            foreach($cart as $item) {
                                $subtotal += $item['price'] * $item['quantity'];
                            }

                            
                            $delivery = 1.0; 
                            $discount = 3.00; 

                            $total = $subtotal + $delivery - $discount;
                        @endphp

                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span id="subtotal">${{ number_format($subtotal, 2) }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>${{ number_format($delivery, 2) }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>${{ number_format($discount, 2) }}</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="cart-total">${{ number_format($total, 2) }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{ route('checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        @endif

        </div>
    </section>

    <!-- <section class="ftco-section">
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
                    
                    <a href="{{ route('detailproduct', ['id' => $product->prd_id]) }}" class="img" style="background-image: url('/images/{{ $product->img }}');"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="{{ route('detailproduct', ['id' => $product->prd_id]) }}">{{ $product->name }}</a></h3>
                        
                        <p>{{ $product->description }}</p>
                        
                        <p class="price"><span>${{ $product->price }}</span></p>
                        
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
    </div>
    </section> -->

@endsection

<script>

    function updateQuantity(productId, quantity) {
        $.ajax({
            url: "{{ route('cart.updateQuantity') }}", // Route xử lý cập nhật
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}", // CSRF token
                id: productId,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    // Định dạng lại giá trị với 1 chữ số sau dấu thập phân
                    const formattedTotal = parseFloat(response.total).toFixed(2); // Cập nhật total của sản phẩm
                    const formattedCartTotal = parseFloat(response.cartTotal).toFixed(2); // Cập nhật tổng giỏ hàng

                    // Cập nhật tổng giá tiền của sản phẩm
                    $('#total-' + productId).text('$' + formattedTotal);

                    // Cập nhật tổng giỏ hàng
                    $('#cart-total').text('$' + formattedCartTotal);

                    // Cập nhật subtotal
                    $('#subtotal').text('$' + formattedCartTotal); // Giả sử bạn đã gán id "subtotal" cho phần subtotal trong HTML

                } else {
                    alert(response.message || "Update failed");
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert("An error occurred. Please try again.");
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Lắng nghe sự kiện click trên nút xóa sản phẩm
        document.querySelectorAll('.btn-remove-product').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn hành động mặc định của nút

                const url = this.dataset.url; // URL để xóa sản phẩm
                const productRow = this.closest('tr'); // Dòng chứa sản phẩm để xóa giao diện
                const cartBody = document.getElementById('cart'); // Thẻ tbody chứa danh sách sản phẩm
                const cartTotals =document.getElementById('cart-totals')

                // Gửi yêu cầu xóa sản phẩm bằng Fetch API
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Xóa dòng sản phẩm khỏi giao diện
                            productRow.remove();
                            // cartTotals.remove();

                            // Nếu giỏ hàng trống, hiển thị thông báo
                            if (data.cartCount === 0) {
                                cartBody.innerHTML = `
                                    <tr>
                                        <td colspan="6" class="text-center">No product in the cart</td>
                                    </tr>`;
                            }

                            // Cập nhật số lượng hiển thị trong biểu tượng giỏ hàng
                            const cartCountElement = document.querySelector('.bag small');
                            if (cartCountElement) {
                                cartCountElement.textContent = data.cartCount;
                            }
                        } else {
                            alert('Error: Unable to remove product.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error: Unable to remove product.');
                    });
            });
        });
    });

</script>