<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Plato Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Plato - v2.2.0
  * Template URL: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <div class="wrap">
    <section id="hero">
        <div class="hero-container" data-aos="fade-up">
          <h1>Hãy cùng chúng tôi khám phá những điều thú vị</h1>
          <h2>Chúng ta luôn là một</h2>
          <a href="#about" class="btn-get-started scrollto">Bắt đầu nào</a>
        </div>
    </section><!-- End Hero -->
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
          <h1 class="text-light"><a href="{{route('index')}}"><span>Plato</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="index.html">Home</a></li>
            <li class="drop-down"><a href="">Danh mục</a>
              <ul>
                @foreach ($categoryNav as $categoryNavs)
                <li><a href="{{route('postCategory', $categoryNavs->category_slug)}}">{{$categoryNavs->category_name}}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="#contact">Liên hệ</a></li>
          </ul>
        </nav><!-- .nav-menu -->

      </div>
    </header><!-- End Header -->

    @yield('index')
    @yield('pageDetail')
    @yield('PostCategory')

    <!-- ======= Footer ======= -->
    <footer id="footer">

      <div class="footer-newsletter">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <h4>Newsletter</h4>
              <p>Hãy để lại Email nếu bạn cảm thấy hay</p>
              <form action="" method="post">
                  @csrf
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Thông tin cá nhân</h3>
              <p>
                  454A lê Văn Lương, Tân Phong, Quận 7, TPHCM
               <br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Danh mục nổi bật</h4>
              <ul>
                  @foreach ($categoryNav as $categoryNavs)
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('postCategory', $categoryNavs->category_slug)}}">{{$categoryNavs->category_name}}</a></li>
                  @endforeach
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Bài viết nổi bật</h4>
              <ul>
                  @foreach ($postNav as $postNavs)
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('pageDetail', $postNavs->post_slug)}}">{{ Str::words($postNavs->post_name, 6,'....')}}</a></li>
                  @endforeach
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Social Networks</h4>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="container py-4">
        <div class="copyright">
          &copy; Copyright <strong><span>Plato</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer><!-- End Footer -->

  </div>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('/frontend/assets/js/main.js')}}"></script>

</body>

</html>
