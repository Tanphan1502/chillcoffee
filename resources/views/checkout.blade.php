@extends('layout')
@section('content')

<style>

    #set-default{
        border-radius: 5px;
        border: 1px solid #c49b63;
        background-color: black;
        color: #c49b63;
        margin-left: 20px;
    }

    #set-default:hover{
        border: 1px solid white;
        background-color: #c49b63;
        color: white;
    }

</style>

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Checkout</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checout</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 ftco-animate">
            @if (session('user_id'))

                <form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="delivery-info"><strong>Delivery Information</strong></label>
                                <div class="checkbox-wrap">
                                    <div id="add-new-address" class="d-flex flex-wrap">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phonenumber">Phone Number</label>
                                            <input type="text" class="form-control" id="phonenumber">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="comment">Notes</label>
                                            <textarea style="height: 58px !important;" class="form-control" rows="2" id="comment"></textarea>
                                        </div>
                                    </div>
                                    <!-- Các địa chỉ khác (sẽ ẩn khi chưa chọn "Ship to different address") -->
                                    <div id="other-addresses" style="display: none;">
                                        @foreach ($useraddress as $address)
                                                <!-- Chỉ hiển thị địa chỉ mặc định khi trang tải -->
                                                <p class="default-address">
                                                    <input type="checkbox" id="delivery-info-{{ $address->usraddress_id }}" name="delivery_info"
                                                        value="{{ $address->usraddress_id }}" class="delivery-info-checkbox">
                                                    <label for="delivery-info-{{ $address->usraddress_id }}">{{ $address->user_name }} | </label>
                                                    <label for="delivery-info-{{ $address->usraddress_id }}">{{ $address->address }} | </label>
                                                    <label for="delivery-info-{{ $address->usraddress_id }}">{{ $address->phonenumber }}</label>
                                                </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optradio" id="ship-to-available-address"> Ship to Address Available
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            @else

                <form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Firt Name</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">State / Country</label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">France</option>
                                        <option value="">Italy</option>
                                        <option value="">Philippines</option>
                                        <option value="">South Korea</option>
                                        <option value="">Hongkong</option>
                                        <option value="">Japan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" class="form-control" placeholder="House number and street name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    placeholder="Appartment, suite, unit etc: (optional)">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Town / City</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Postcode / ZIP *</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Email Address</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                    <label><input type="radio" name="optradio"> Ship to different address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form><!-- END -->

            @endif



                <div class="row mt-5 pt-3 d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>

                            @php
$subtotal = 0;
foreach ($cart as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}


$delivery = 1.00;
$discount = 3.00;

$total = $subtotal + $delivery - $discount;
                            @endphp

                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
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
                                <span>${{ number_format($total, 2) }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" value="dbt" name="optradio" class="mr-2"> Direct Bank
                                            Tranfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" value="cod" name="optradio" class="mr-2"> Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                            <p><a href="#" id="placeOrderButton" class="btn btn-primary py-3 px-4">Place an order</a></p>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->




            <div class="col-xl-4 sidebar ftco-animate">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <div class="icon">
                                <span class="icon-search"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Categories</h3>
                        <li><a href="#">Tour <span>(12)</span></a></li>
                        <li><a href="#">Hotel <span>(22)</span></a></li>
                        <li><a href="#">Coffee <span>(37)</span></a></li>
                        <li><a href="#">Drinks <span>(42)</span></a></li>
                        <li><a href="#">Foods <span>(14)</span></a></li>
                        <li><a href="#">Travel <span>(140)</span></a></li>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Recent Blog</h3>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                    blind texts</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                    blind texts</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                    blind texts</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Tag Cloud</h3>
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">dish</a>
                        <a href="#" class="tag-cloud-link">menu</a>
                        <a href="#" class="tag-cloud-link">food</a>
                        <a href="#" class="tag-cloud-link">sweet</a>
                        <a href="#" class="tag-cloud-link">tasty</a>
                        <a href="#" class="tag-cloud-link">delicious</a>
                        <a href="#" class="tag-cloud-link">desserts</a>
                        <a href="#" class="tag-cloud-link">drinks</a>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->

@endsection

<script>

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delivery-info-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    // Khi checkbox này được chọn, bỏ chọn tất cả các checkbox khác
                    document.querySelectorAll('.delivery-info-checkbox').forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện thay đổi của radio button
        const shipDifferentAddressRadio = document.getElementById('ship-different-address');
        const shipAvailableAddressRadio = document.getElementById('ship-to-available-address');
        const addNewAddress = document.getElementById('add-new-address');
        const otherAddresses = document.getElementById('other-addresses');

        if (shipAvailableAddressRadio) {
            shipAvailableAddressRadio.addEventListener('change', function() {
                if (this.checked) {
                    // Hiển thị các địa chỉ khác và ẩn "Add New Address"
                    otherAddresses.style.display = 'block';
                    addNewAddress.style.display = 'none';
                    // Bỏ checked của "Add New Address"
                }
            });
        }

        if (shipDifferentAddressRadio) {
            shipDifferentAddressRadio.addEventListener('change', function() {
                if (this.checked) {
                    // Ẩn các địa chỉ khác và hiển thị "Add New Address"
                    otherAddresses.style.display = 'none';
                    addNewAddress.style.display = 'block';
                }
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const placeOrderButton = document.getElementById('placeOrderButton');

        // Kiểm tra xem phần tử có tồn tại không trước khi gắn sự kiện
        if (placeOrderButton) {
            placeOrderButton.addEventListener('click', function (event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định

                // Gửi yêu cầu AJAX
                fetch('/place-order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({}),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Order placed successfully!');
                        // Điều hướng đến trang xác nhận đơn hàng
                        // window.location.reload
                    } else {
                        alert('Failed to place the order. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            });
        } else {
            console.error('Place order button not found.');
        }
    });

</script>
