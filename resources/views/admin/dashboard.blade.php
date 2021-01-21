@extends('adminpage')
@section('Dashboard')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <!-- task, page, download counter  start -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-yellow update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">
                                                <h4 class="text-white">{{$category}}</h4>
                                                <h6 class="text-white m-b-0">Danh mục</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-1" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="text-white m-b-0"><i
                                                class="feather icon-clock text-white f-14 m-r-10"></i>update : {{$category_lasted}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-green update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">
                                                <h4 class="text-white">{{$post}}</h4>
                                                <h6 class="text-white m-b-0">Thống kê bài viết</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-2" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="text-white m-b-0"><i
                                                class="feather icon-clock text-white f-14 m-r-10"></i>update : {{$post_lasted}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-pink update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">
                                                <h4 class="text-white">{{$slider}}</h4>
                                                <h6 class="text-white m-b-0">Thống kê slider</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-3" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="text-white m-b-0"><i
                                                class="feather icon-clock text-white f-14 m-r-10"></i>update : {{$slider_lasted}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-lite-green update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">
                                                <h4 class="text-white">{{$user}}</h4>
                                                <h6 class="text-white m-b-0">Thành viên</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-4" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="text-white m-b-0"><i
                                                class="feather icon-clock text-white f-14 m-r-10"></i>update : {{$user_lasted}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="card latest-update-card">
                                    <div class="card-header">
                                        <h5>Cập nhật thông tin</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                <li><i class="fa fa-trash close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            @include('errors.note')
                                            @include('errors.message')
                                            @include('success.note')
                                        </div>
                                    </div>
                                    <form method="POST">
                                        <div class="card-block">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Name</label>
                                                    <input type="text" value="{{Auth::user()->name}}" class="form-control" name="name" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Email</label>
                                                    <input type="email" value="{{Auth::user()->email}}" class="form-control" name="email" id="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Phone</label>
                                                    <input type="text" value="{{Auth::user()->phone}}" class="form-control" name="phone" id="" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Address</label>
                                                    <input type="text" value="{{Auth::user()->address}}" class="form-control" name="address" id="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Password</label>
                                                    <input type="password" class="form-control" name="password" id="" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Repassword</label>
                                                    <input type="repassword" class="form-control" name="repassword" id="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9"></div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                {{-- <div class="m-b-25">
                                                    <img src="..\files\assets\images\avatar-4.jpg" class="img-radius"
                                                        alt="User-Profile-Image">
                                                </div> --}}
                                                <h6 class="f-w-600">{{Auth::user()->name}}</h6>
                                                <p>Web Designer</p>
                                                <i class="feather icon-edit m-t-10 f-16"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông tin cá nhân</h6>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Email</p>
                                                        <h6 class="text-muted f-w-400"><a
                                                                class="__cf_email__"
                                                                data-cfemail="3a505f54437a5d575b535614595557">{{Auth::user()->email}}</a>
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Phone</p>
                                                        <h6 class="text-muted f-w-400">
                                                            @if (Auth::user()->phone != null)
                                                                {{Auth::user()->phone}}
                                                            @else
                                                                NULL
                                                            @endif
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Address</p>
                                                        <h6 class="text-muted f-w-400">
                                                            @if (Auth::user()->address != null)
                                                                {{Auth::user()->address}}
                                                            @else
                                                                NULL
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </div>
                                                {{-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Recent</p>
                                                        <h6 class="text-muted f-w-400">Guruable Admin</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Most Viewed</p>
                                                        <h6 class="text-muted f-w-400">Able Pro Admin</h6>
                                                    </div>
                                                </div> --}}
                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="facebook"><i
                                                                class="feather icon-facebook facebook"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="twitter"><i
                                                                class="feather icon-twitter twitter"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="instagram"><i
                                                                class="feather icon-instagram instagram"
                                                                aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="styleSelector">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
