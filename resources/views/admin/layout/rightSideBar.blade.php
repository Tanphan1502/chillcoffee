       <nav class="navbar-default navbar-static-side" role="navigation">
           <div class="sidebar-collapse">
               <ul class="nav metismenu" id="side-menu">
                   <li class="nav-header">
                       <div class="dropdown profile-element">
                           <span>
                               <img alt="image" class="img-circle" src="{{ asset('css2/img/profile_small.jpg') }}" />
                           </span>
                           <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                               <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin
                                           1</strong>
                                   </span> <span class="text-muted text-xs block">Quản Trị Viên <b
                                           class="caret"></b></span> </span> </a>
                           <ul class="dropdown-menu animated fadeInRight m-t-xs">
                               <li><a href="profile.html">Hồ sơ</a></li>
                               <li><a href="contacts.html">Liên hệ</a></li>
                               <li><a href="mailbox.html">Hộp thư</a></li>
                               <li class="divider"></li>
                               <li><a href="{{ route('login') }}">Đăng xuất</a></li>
                           </ul>
                       </div>
                       <div class="logo-element">
                           Logo
                       </div>
                   </li>
                   <li class="active">
                       <a href="{{ route('admin') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Thống
                               kê</span></a>
                   </li>
                   </li>
                   <li>
                       <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Tài khoản</span><span
                               class="fa arrow"></span></a>
                       <ul class="nav nav-second-level collapse">

                           <li><a href="#">Thêm mới</a></li>
                           <li>
                               <a href="{{ route('user') }}">Danh sách người dùng</a>
                           </li>
                       </ul>
                   </li>
                   <li>
                       <a href="#"><i class="fa fa-list-ol"></i> <span class="nav-label">Danh mục-Sản
                               phẩm</span><span class="fa arrow"></span></a>
                       <ul class="nav nav-second-level collapse">
                           <li><a href="{{ route('product') }}">Danh sách sản phẩm</a></li>
                           <li><a href="{{ route('category') }}">Danh sách loại</a></li>
                       </ul>
                   </li>

                   <li>
                       <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Đơn
                               hàng</span><span class="fa arrow"></span></a>
                       <ul class="nav nav-second-level collapse">
                           <li><a href="{{ route('order') }}">Danh sách đơn hàng</a></li>
                           <li><a href="ecommerce_product_list.html">Đơn hàng chờ xác nhận</a></li>
                       </ul>
                   </li>
                   <li>
                       <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Bài viết</span><span
                               class="fa arrow"></span></a>
                       <ul class="nav nav-second-level collapse">
                           <li><a href="form_basic.html">Tạo mới</a></li>
                           <li><a href="form_advanced.html">Danh sách bài viết</a></li>
                       </ul>
                   </li>



               </ul>

           </div>
       </nav>
