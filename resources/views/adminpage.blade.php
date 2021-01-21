<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - Blog </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\files\assets\icon\font-awesome\css\font-awesome.min.css')}}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('backend\files\assets\images\favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend\files\bower_components\bootstrap\css\bootstrap.min.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend\files\assets\icon\feather\css\feather.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend\files\assets\css\style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend\files\assets\css\jquery.mCustomScrollbar.css')}}">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{route('admin.dashboard')}}">
                            <img class="img-fluid" src="{{asset('backend\files\assets\images\logo.png')}}" alt="Theme-Logo">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <form method="GET" action="{{route('admin.searchPost')}}">
                                        <div class="input-group">
                                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                            <input type="text" name="search_post" class="form-control">
                                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        {{-- <img src="..\files\assets\images\avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> --}}
                                        <span>{{Auth::user()->name}}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        {{-- <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.htm">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.htm">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.htm">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="{{route('admin.logout')}}">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="{{route('admin.dashboard')}}">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Quản lý bài viết</span>
                                        <span class="pcoded-badge label label-warning">NEW</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)">
                                                <span class="pcoded-mtext">Danh mục</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{route('admin.category')}}">
                                                        <span class="pcoded-mtext">Tất cả danh mục</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" pcoded-hasmenu">
                                            <a href="javascript:void(0)">
                                                <span class="pcoded-mtext">Bài viết</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class=" ">
                                                    <a href="{{route('admin.post.create')}}">
                                                        <span class="pcoded-mtext">Thêm bài viết</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="{{route('admin.post')}}">
                                                        <span class="pcoded-mtext">Tất cả bài viết</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        {{-- <li class=" pcoded-hasmenu">
                                            <a href="javascript:void(0)">
                                                <span class="pcoded-mtext">Horizontal</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class=" ">
                                                    <a href="menu-horizontal-static.htm" target="_blank">
                                                        <span class="pcoded-mtext">Static Layout</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-horizontal-fixed.htm" target="_blank">
                                                        <span class="pcoded-mtext">Fixed layout</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-horizontal-icon.htm" target="_blank">
                                                        <span class="pcoded-mtext">Static With Icon</span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="menu-horizontal-icon-fixed.htm" target="_blank">
                                                        <span class="pcoded-mtext">Fixed With Icon</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-bottom.htm">
                                                <span class="pcoded-mtext">Bottom Menu</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="box-layout.htm" target="_blank">
                                                <span class="pcoded-mtext">Box Layout</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="menu-rtl.htm" target="_blank">
                                                <span class="pcoded-mtext">RTL</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Quản lý slider</span>
                                        {{-- <span class="pcoded-badge label label-danger"></span> --}}
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{route('admin.slider.create')}}">
                                                <span class="pcoded-mtext">Thêm slider</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('admin.slider')}}">
                                                <span class="pcoded-mtext">Tất cả slider</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    {{-- content --}}
                    @yield('Dashboard')
                    @yield('Category')
                    @yield('UpdateCategory')
                    @yield('AddPost')
                    @yield('Post')
                    @yield('UpdatePost')
                    @yield('AddSlider')
                    @yield('AllSlider')
                    @yield('UpdateSlider')
                    @yield('SearchPost')
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script>
    <script type="text/javascript" src="{{asset('backend\files\bower_components\jquery\js\jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend\files\bower_components\jquery-ui\js\jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend\files\bower_components\popper.js\js\popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend\files\bower_components\bootstrap\js\bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('backend\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('backend\files\bower_components\modernizr\js\modernizr.js')}}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{asset('backend\files\bower_components\chart.js\js\Chart.js')}}"></script>
    <!-- amchart js -->
    <script src="{{asset('backend\files\assets\pages\widget\amchart\amcharts.js')}}"></script>
    <script src="{{asset('backend\files\assets\pages\widget\amchart\serial.js')}}"></script>
    <script src="{{asset('backend\files\assets\pages\widget\amchart\light.js')}}"></script>
    <script src="{{asset('backend\files\assets\js\jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend\files\assets\js\SmoothScroll.js')}}"></script>
    <script src="{{asset('backend\files\assets\js\pcoded.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('backend\files\assets\js\vartical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend\files\assets\pages\dashboard\custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend\files\assets\js\script.min.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="{{ asset('../vendor/ckeditor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('../vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')}}"></script>
<script>
    var options = {
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('editor', options);
    $('#lfm').filemanager('image');
</script>

</body>

</html>
