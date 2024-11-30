@extends('admin.layout')
@section('content')
    <!-- main content start -->
    <div class="wrapper wrapper-content">
        <!-- first row table start -->
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Tháng này</span>
                        <h5>Doanh thu</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">40 886,200</h1>
                        <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                        <small>Tổng doanh thu</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Trong năm</span>
                        <h5>Đơn hàng</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">275,800</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                        <small>Đơn đặt hàng</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Hôm nay</span>
                        <h5>Khách truy cập</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">106,120</h1>
                        <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                        <small>người</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">Thấp</span>
                        <h5>Doanh thu ngày</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">80,600</h1>
                        <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i>
                        </div>
                        <small>VND</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Doanh Thu</h5>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-white active">Hôm nay</button>
                                <button type="button" class="btn btn-xs btn-white">Tháng</button>
                                <button type="button" class="btn btn-xs btn-white">Năm</button>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins">2,346</h2>
                                        <small>Tổng doanh thu</small>
                                        <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">4,422</h2>
                                        <small>Doanh thu tháng này</small>
                                        <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">9,180</h2>
                                        <small>Doanh thu ngày</small>
                                        <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- first row table  end-->


    </div>
    <!-- main content End -->
    {{-- </div>
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Tìm kiếm" class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                        </a>
                                        <div>
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a>
                                        <div>
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/profile.jpg">
                                        </a>
                                        <div>
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                        <li>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="wrapper wrapper-content animated fadeIn">

                <div class="p-w-md m-t-sm">
                    

                    


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">



                                <div class="ibox-content">

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" for="product_name">Tên sản phẩm</label>
                                                <input type="text" id="product_name" name="product_name" value=""
                                                    placeholder="Tên sản phẩm" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" for="status">Lọc sản phẩm</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" selected="">Completed</option>
                                                    <option value="0">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-striped">

                                            <tbody>
                                                
                                                <tr>
                                                    <td>Id</td>
                                                    <td>Tên sản phẩm</td>
                                                    <td>Loại sản phẩm</td>
                                                    <td>Đơn giá</td>
                                                    <td>Thương hiệu</td>
                                                    <td><strong>Số lượng còn</strong></td>
                                                    <td>Ngày nhập</td>
                                                    <td><a href="#"><i class="fa fa-check text-navy">Trạng thái</i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Master project</td>
                                                    <td>Patrick Smith</td>
                                                    <td>$892,074</td>
                                                    <td>Inceptos Hymenaeos Ltd</td>
                                                    <td><strong>20%</strong></td>
                                                    <td>Jul 14, 2015</td>
                                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Master project</td>
                                                    <td>Patrick Smith</td>
                                                    <td>$892,074</td>
                                                    <td>Inceptos Hymenaeos Ltd</td>
                                                    <td><strong>20%</strong></td>
                                                    <td>Jul 14, 2015</td>
                                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Master project</td>
                                                    <td>Patrick Smith</td>
                                                    <td>$892,074</td>
                                                    <td>Inceptos Hymenaeos Ltd</td>
                                                    <td><strong>20%</strong></td>
                                                    <td>Jul 14, 2015</td>
                                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Nhóm 1
                </div>
            </div>
        </div> --}}
@endsection
