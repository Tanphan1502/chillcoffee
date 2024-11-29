<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSS Files with asset() -->
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    @include('header')

    <main style="background-color: black;">

    @yield('content')

    </main>

    @include('footer')

    <!-- JS Files with asset() -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            // Đảm bảo rằng sự kiện click chỉ được đăng ký một lần
            document.querySelectorAll('.add-to-cart').forEach(function (button) {
                button.addEventListener('click', function (e) {
                    e.preventDefault(); // Ngừng hành động mặc định của nút
                    e.stopPropagation(); // Ngừng sự kiện lan truyền

                    // Lấy thông tin sản phẩm từ data attributes
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const price = this.dataset.price;
                    const img = this.dataset.img;

                    // Sử dụng giá trị mặc định là 1 cho số lượng sản phẩm
                    const quantity = 1;

                    // Gửi yêu cầu thêm vào giỏ hàng với số lượng sản phẩm hiện tại
                    fetch('/add-to-cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({ id, name, price, img, quantity }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Hiển thị thông báo thêm sản phẩm thành công
                                alert('Product added to cart successfully!');

                                // Cập nhật số lượng giỏ hàng
                                const cartCountElement = document.querySelector('.bag small');
                                if (cartCountElement) {
                                    cartCountElement.textContent = Object.keys(data.cart).length;
                                }

                                // Cập nhật giỏ hàng ngay lập tức
                                // updateCartDisplay(data.cart);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });

        // Hàm cập nhật giỏ hàng trên giao diện
        // function updateCartDisplay(cart) {
        //     const cartContainer = document.querySelector('#cart'); // Thẻ chứa giỏ hàng
        //     cartContainer.innerHTML = ''; // Xóa nội dung giỏ hàng cũ

        //     // Duyệt qua các sản phẩm trong giỏ hàng và cập nhật hiển thị
        //     for (let productId in cart) {
        //         const item = cart[productId];
        //         const row = document.createElement('tr');
        //         row.classList.add('text-center');
        //         row.innerHTML = `
        //             <td class="product-remove">
        //                 <button class="btn-remove-product" data-id="${item.id}" style="border: none; background: none;">
        //                     <span class="icon-close" style="cursor: pointer;"></span>
        //                 </button>
        //             </td>
        //             <td class="image-prod">
        //                 <div class="img" style="background-image:url(images/${item.img});"></div>
        //             </td>
        //             <td class="product-name">
        //                 <h3>${item.name}</h3>
        //             </td>
        //             <td class="price">${parseFloat(item.price).toFixed(1)}</td>
        //             <td class="quantity">
        //                 <input type="number" class="quantity form-control" value="${item.quantity}" min="1" max="100">
        //             </td>
        //             <td class="total">${parseFloat(item.price * item.quantity).toFixed(1)}</td>
        //         `;
        //         cartContainer.prepend(row);
        //     }
        // }

    </script>

</html>
