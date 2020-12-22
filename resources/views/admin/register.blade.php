<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('../public/backend\files\bower_components\bootstrap\css\bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('../public/backend\files\assets\icon\themify-icons\themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('../public/backend\files\assets\icon\icofont\css\icofont.css')}}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{asset('../public/backend\files\assets\pages\flag-icon\flag-icon.min.css')}}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{asset('../public/backend\files\assets\pages\menu-search\css\component.css')}}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('../public/backend\files\assets\pages\multi-step-sign-up\css\reset.min.css')}}">
    <link rel="stylesheet" href="{{asset('../public/backend\files\assets\pages\multi-step-sign-up\css\style.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('../public/backend\files\assets\css\style.css')}}">


</head>

<body class="multi-step-sign-up">
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
    <form id="msform" method="POST">
        <!-- progressbar -->
        @csrf
        <ul id="progressbar">
            <li class="active">Thiết lập tài khoản</li>
            <li>Thông tin cá nhân</li>
            <li>Hoàn thành đăng kí</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <div class="col-md-12">
                <a style="color: white" class="btn btn-facebook m-b-20 btn-block" href="{{ route('admin.redirect',['facebook']) }}"><i
                        class="icofont icofont-social-facebook"></i>Register với facebook</a>
            </div>
            {{-- <img class="logo" src="..\files\assets\images\logo-blue.png" alt="logo.png"> --}}
            <h2 class="fs-title">Đăng Kí</h2>
            <h3 class="fs-subtitle">Hãy bắt đầu một khởi đầu mới. Đăng kí cho người mới</h3>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show row p-0 m-1 mb-4" role="alert">
                <div class="col-md-9 my-auto">
                    {{$error}}
                </div>
                <button type="button" class="close col-md-2" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
            @include('errors.note')
            @include('success.note')
            <div class="input-group">
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" >
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="repass" placeholder="Nhập lại mật khẩu" >
            </div>
            <div class="row">
                <button type="button" onclick="location.href='{{route('admin.login')}}'" name="previous" class="btn btn-inverse btn-outline-inverse mr-1"
                >Quay lại đăng nhập</button>
                <button type="button" name="next" class="btn btn-primary next" value="Next">Tiếp tục</button>
            </div>

        </fieldset>
        <fieldset>
            <h2 class="fs-title">Thông tin cá nhận</h2>
            <h3 class="fs-subtitle">Thêm một số thông tin về bạn</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="name" placeholder="Họ và tên" >
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" >
            </div>
            <div class="input-group">
                <textarea name="address" class="form-control" placeholder="Địa chỉ" ></textarea>
            </div>
            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous"
                value="Previous">Quay lại</button>
            <button type="submit" name="next" class="btn btn-primary" value="submit">Tiếp tục</button>
        </fieldset>
    </form>
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\jquery\js\jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\jquery-ui\js\jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\popper.js\js\popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\bootstrap\js\bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\modernizr\js\modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\modernizr\js\css-scrollbars.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{asset('../public/backend\files\assets\pages\multi-step-sign-up\js\main.js')}}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\i18next\js\i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('../public/backend\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('../public/backend\files\bower_components\jquery-i18next\js\jquery-i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/backend\files\assets\js\common-pages.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
</body>

</html>
