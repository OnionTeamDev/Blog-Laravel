@extends('welcome')
@section('pageDetail')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" data-aos="fade-up">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Bài Viết</h2>
          <ol>
            <li><a href="{{route('index')}}">Trang chủ</a></li>
            <li>PageDetail</li>
            <li><a href="{{route('pageDetail', $post->post_slug)}}">{{$post->post_slug}}</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up" data-aos-delay="200">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="{{$post->url_img}}" style="height: 400px" class="img-fluid" alt="">
          </div>

          <div class="portfolio-info" style="border-radius: 10px">
            <h3>Thông tin bài viết</h3>
            <ul>
              <li><strong>Danh Mục</strong>:
                @foreach ($post->category as $categoryPost)
                    {{$categoryPost->category_name}}
                @endforeach
              </li>
              <li><strong>Người đăng</strong>: {{$post->name}}</li>
              <li><strong>Ngày đăng</strong>: {{$post->created_at}} </li>
              <li><strong>Update Time</strong>: <a href="#">{{$post->updated_at}}</a></li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>{{$post->post_name}}</h2>
          <p>
              {!! $post->post_desc !!}
          </p>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

@endsection
