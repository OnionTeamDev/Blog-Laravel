@extends('welcome')
@section('PostCategory')
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs" data-aos="fade-up">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Danh mục: {{$keywordCategory}}</h2>
            <ol>
                <li><a href="{{route('index')}}">Trang chủ</a></li>
                <li>category</li>
                <li><a href="{{route('pageDetail', $keywordCategory)}}">{{$keywordCategory}}</a></li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="row">
          {{-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card" data-aos="fade-up">
              <img src="assets/img/features-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <i class="bx bx-tachometer"></i>
                <h5 class="card-title"><a href="">Our Mission</a></h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              </div>
            </div>
          </div> --}}
          @foreach ($post as $posts)
            <div class="col-lg-4 col-md-6 mt-5 mt-md-0 d-flex align-items-stretch">
                <div class="card" data-aos="fade-up" data-aos-delay="150">
                <img src="{{$posts->url_img}}" class="card-img-top" alt="...">
                <div class="card-body">
                    {{-- <i class="bx bx-file"></i> --}}
                    <h5 class="card-title"><a href="{{route('pageDetail', $posts->post_slug)}}">{{ Str::words($posts->post_name, 5,'....') }}</a></h5>
                    <p class="card-text">
                        @foreach ($posts->category as $categoryPost)
                            <b>{{$categoryPost->category_name}}</b>
                        @endforeach
                    </p>
                    <p class="card-text">{!! Str::words($posts->post_desc, 15,'....') !!}</p>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="button" onclick="location.href='{{route('pageDetail', $posts->post_slug)}}'" class="btn btn-primary">Đọc tiếp</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
          @endforeach
        </div>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-4 mx-auto">
                {{$post->links()}}
            </div>
            <div class="col-md-4">
            </div>
        </div>
      </div>
    </section><!-- End Features Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-down">
          <span>Liên Hệ</span>
          <h2>Liên Hệ</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>454A Lê Văn Lương, Tân phong</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>OnionTeam@gmail.com</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>0987.654.321</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->
  @if(Session::has('jsAlert'))
    <script type="text/javascript" >
        alert({{ session()->get('jsAlert') }});
    </script>
  @endif
@endsection
