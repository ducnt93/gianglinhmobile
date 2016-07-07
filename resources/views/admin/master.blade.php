<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giang Linh Mobile </title>

    <!-- Bootstrap -->
    <link href="{{url('/theme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('/theme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{url('/theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet">

@yield('header')
<!-- Custom Theme Style -->
    <link href="{{url('/theme/production/css/custom.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>GiangLinhMoblie</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{url('/theme/production/images/img.jpg')}}" alt="..."
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Chào bạn,</span>
                        <h2>Trung Đức</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        {{-- <h3>General</h3>--}}
                        <div class="clearfix"></div>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Tổng quan <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.html">Dashboard</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Điện thoại <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="form.html">Danh sách điện thoại</a>
                                    </li>
                                    <li><a href="form_advanced.html">Thêm điện thoại</a>
                                    </li>
                                    <li><a href="form_validation.html">Hãng</a>
                                    </li>
                                    <li><a href="form_wizards.html">Thêm hãng</a>
                                    </li>
                                    <li><a href="form_upload.html">Loại điện thoại</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Phụ kiện <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="general_elements.html">General Elements</a>
                                    </li>
                                    <li><a href="media_gallery.html">Media Gallery</a>
                                    </li>
                                    <li><a href="typography.html">Typography</a>
                                    </li>
                                    <li><a href="icons.html">Icons</a>
                                    </li>
                                    <li><a href="glyphicons.html">Glyphicons</a>
                                    </li>
                                    <li><a href="widgets.html">Widgets</a>
                                    </li>
                                    <li><a href="invoice.html">Invoice</a>
                                    </li>
                                    <li><a href="inbox.html">Inbox</a>
                                    </li>
                                    <li><a href="calendar.html">Calendar</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="tables.html">Tables</a>
                                    </li>
                                    <li><a href="tables_dynamic.html">Table Dynamic</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="chartjs.html">Chart JS</a>
                                    </li>
                                    <li><a href="chartjs2.html">Chart JS2</a>
                                    </li>
                                    <li><a href="morisjs.html">Moris JS</a>
                                    </li>
                                    <li><a href="echarts.html">ECharts </a>
                                    </li>
                                    <li><a href="other_charts.html">Other Charts </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Live On</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bug"></i> Additional Pages <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="e_commerce.html">E-commerce</a>
                                    </li>
                                    <li><a href="projects.html">Projects</a>
                                    </li>
                                    <li><a href="project_detail.html">Project Detail</a>
                                    </li>
                                    <li><a href="contacts.html">Contacts</a>
                                    </li>
                                    <li><a href="profile.html">Profile</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="page_404.html">404 Error</a>
                                    </li>
                                    <li><a href="page_500.html">500 Error</a>
                                    </li>
                                    <li><a href="plain_page.html">Plain Page</a>
                                    </li>
                                    <li><a href="login.html">Login Page</a>
                                    </li>
                                    <li><a href="pricing_tables.html">Pricing Tables</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#level1_1">Level One</a>
                                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                                            </li>
                                            <li><a href="#level2_1">Level Two</a>
                                            </li>
                                            <li><a href="#level2_2">Level Two</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#level1_2">Level One</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        {{--Thông tin tài khoản--}}
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{url('/theme/production/images/img.jpg')}}"
                                     alt="">{!! Auth::guard('admin')->user()->username !!}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Thông tin</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Thiết lập</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Trợ Giúp</a>
                                </li>
                                <li><a href="{!! url('/admin/auth/logout') !!}"><i class="fa fa-sign-out pull-right"></i> Đăng
                                        Xuất</a>
                                </li>
                            </ul>
                        </li>
                        {{--Thông tin tài khoản--}}

                        {{--Thông báo - Tin nhắn--}}
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>

                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="{{url('/theme/production/images/img.jpg')}}" alt="Thông tin ảnh"/>
                                      </span>
                        <span>
                                          <span>Mạnh trí</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="{{url('/theme/production/images/img.jpg')}}" alt="Thông tin ảnh"/>
                                      </span>
                        <span>
                                          <span>Trung Hiếu</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="{{url('/theme/production/images/img.jpg')}}" alt="Thông tin ảnh"/>
                                      </span>
                        <span>
                                          <span>Quốc toản</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                        <span class="image">
                                          <img src="{{url('/theme/production/images/img.jpg')}}" alt="Thông tin ảnh"/>
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>Hiện thị tất cả</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{--Thông báo - Tin nhắn--}}
                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                GiangLinhMobile - Được xây dựng bởi Trung Đức
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{url('/theme/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('/theme/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('/theme/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{url('/theme/vendors/nprogress/nprogress.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{url('/theme/production/js/custom.js')}}"></script>
@yield('script')
</body>
</html>