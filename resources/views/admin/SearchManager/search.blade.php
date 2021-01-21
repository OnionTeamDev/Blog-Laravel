@extends('adminpage')
@section('SearchPost')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>tất cả bài viết</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">post</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Bài viết</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title">Tất cả bài viết</h4>
                                    @include('errors.message')
                                    <div class="row">
                                        <div class="col-md-6">
                                            @include('success.note')
                                            @include('errors.note')
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h2>Kết quả tìm kiếm của: {{$keyword}}</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên bài viết</th>
                                                        <th>Ảnh đại diện</th>
                                                        <th>Danh mục</th>
                                                        <th>Nổi Bật</th>
                                                        <th>Người đăng</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($post as $posts)
                                                    <tr>
                                                        <td scope="row">{{$posts->id}}</td>
                                                        <td>{{$posts->post_name}}</td>
                                                        <td>
                                                            <img src="{{$posts->url_img}}" width="150px" alt="">
                                                        </td>
                                                        @if (count($posts->category) > 0)
                                                            @foreach ($posts->category as $categorys)
                                                                <td>{{$categorys->category_name}}</td>
                                                            @endforeach
                                                        @else
                                                            <td>Chưa có danh mục</td>
                                                        @endif
                                                        <td>
                                                            @if ($posts->post_status == 0)
                                                                <span style="font-size: 20px" onclick="location.href='{{route('admin.post.future', $posts->id)}}'">
                                                                    <i class="fa fa-star-o"></i>
                                                                </span>
                                                            @else
                                                                <span style="font-size: 20px" onclick="location.href='{{route('admin.post.notfuture', $posts->id)}}'">
                                                                    <i class="fa fa-star"></i>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>{{$posts->name}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success"  onclick="location.href='{{route('admin.post.update', $posts->id)}}'">Sửa</button>
                                                            <a onclick="return confirm('Bạn có muốn xóa bài viết này không?')" class="btn btn-danger" href="{{route('admin.post.destroy', $posts->id)}}" role="button">Xóa</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page body end -->
            </div>
        </div>
        <!-- Main-body end -->
        <div id="styleSelector">

            <div class="selector-toggle"><a href="javascript:void(0)"></a></div>
            <ul>
                <li>
                    <p class="selector-title main-title st-main-title"><b>Adminty </b>Customizer</p><span
                        class="text-muted">Live customizer with tons of options</span>
                </li>
                <li>
                    <p class="selector-title">Main layouts</p>
                </li>
                <li>
                    <div class="theme-color"><a href="#" class="navbar-theme" navbar-theme="themelight1"><span
                                class="head"></span><span class="cont"></span></a><a href="#" class="navbar-theme"
                            navbar-theme="theme1"><span class="head"></span><span class="cont"></span></a></div>
                </li>
            </ul>
            <div class="slimScrollDiv"
                style="position: relative; overflow: hidden; width: auto; height: calc(100vh - 440px);">
                <div class="style-cont m-t-10" style="overflow: hidden; width: auto; height: calc(100vh - 440px);">
                    <ul class="nav nav-tabs  tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#sel-layout"
                                role="tab">Layouts</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sel-sidebar-setting"
                                role="tab">Sidebar Settings</a></li>
                    </ul>
                    <div class="tab-content tabs">
                        <div class="tab-pane active" id="sel-layout" role="tabpanel">
                            <ul>
                                <li class="theme-option">
                                    <div class="checkbox-fade fade-in-primary"><label><input type="checkbox"
                                                value="false" id="sidebar-position" name="sidebar-position"
                                                checked=""><span class="cr"><i
                                                    class="cr-icon feather icon-check txt-success f-w-600"></i></span><span>Fixed
                                                Sidebar Position</span></label></div>
                                </li>
                                <li class="theme-option">
                                    <div class="checkbox-fade fade-in-primary"><label><input type="checkbox"
                                                value="false" id="header-position" name="header-position"
                                                checked=""><span class="cr"><i
                                                    class="cr-icon feather icon-check txt-success f-w-600"></i></span><span>Fixed
                                                Header Position</span></label></div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="sel-sidebar-setting" role="tabpanel">
                            <ul>
                                <li class="theme-option">
                                    <p class="sub-title drp-title">Menu Type</p>
                                    <div class="form-radio" id="menu-effect">
                                        <div class="radio radio-inverse radio-inline" data-toggle="tooltip" title=""
                                            data-original-title="simple icon"><label><input type="radio" name="radio"
                                                    value="st6" onclick="handlemenutype(this.value)" checked="true"><i
                                                    class="helper"></i><span class="micon st6"><i
                                                        class="feather icon-command"></i></span></label></div>
                                        <div class="radio  radio-primary radio-inline" data-toggle="tooltip" title=""
                                            data-original-title="color icon"><label><input type="radio" name="radio"
                                                    value="st5" onclick="handlemenutype(this.value)"><i
                                                    class="helper"></i><span class="micon st5"><i
                                                        class="feather icon-command"></i></span></label></div>
                                    </div>
                                </li>
                                <li class="theme-option">
                                    <p class="sub-title drp-title">SideBar Effect</p><select id="vertical-menu-effect"
                                        class="form-control minimal">
                                        <option name="vertical-menu-effect" value="shrink">shrink</option>
                                        <option name="vertical-menu-effect" value="overlay">overlay</option>
                                        <option name="vertical-menu-effect" value="push">Push</option>
                                    </select>
                                </li>
                                <li class="theme-option">
                                    <p class="sub-title drp-title">Hide/Show Border</p><select
                                        id="vertical-border-style" class="form-control minimal">
                                        <option name="vertical-border-style" value="solid">Style 1</option>
                                        <option name="vertical-border-style" value="dotted">Style 2</option>
                                        <option name="vertical-border-style" value="dashed">Style 3</option>
                                        <option name="vertical-border-style" value="none">No Border</option>
                                    </select>
                                </li>
                                <li class="theme-option">
                                    <p class="sub-title drp-title">Drop-Down Icon</p><select id="vertical-dropdown-icon"
                                        class="form-control minimal">
                                        <option name="vertical-dropdown-icon" value="style1">Style 1</option>
                                        <option name="vertical-dropdown-icon" value="style2">style 2</option>
                                        <option name="vertical-dropdown-icon" value="style3">style 3</option>
                                </li>
                                <li class="theme-option">
                                    <p xclass="sub-title drp-title">Sub Menu Drop-down Icon</p><select
                                        id="vertical-subitem-icon" class="form-control minimal">
                                        <option name="vertical-subitem-icon" value="style1">Style 1</option>
                                        <option name="vertical-subitem-icon" value="style2">style 2</option>
                                        <option name="vertical-subitem-icon" value="style3">style 3</option>
                                        <option name="vertical-subitem-icon" value="style4">style 4</option>
                                        <option name="vertical-subitem-icon" value="style5">style 5</option>
                                        <option name="vertical-subitem-icon" value="style6">style 6</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <ul>
                            <li>
                                <p class="selector-title">Header Brand color</p>
                            </li>
                            <li class="theme-option">
                                <div class="theme-color"><a href="#" class="logo-theme" logo-theme="theme1"><span
                                            class="head"></span><span class="cont"></span></a><a href="#"
                                        class="logo-theme" logo-theme="theme2"><span class="head"></span><span
                                            class="cont"></span></a><a href="#" class="logo-theme"
                                        logo-theme="theme3"><span class="head"></span><span class="cont"></span></a><a
                                        href="#" class="logo-theme" logo-theme="theme4"><span class="head"></span><span
                                            class="cont"></span></a><a href="#" class="logo-theme"
                                        logo-theme="theme5"><span class="head"></span><span class="cont"></span></a>
                                </div>
                            </li>
                            <li>
                                <p class="selector-title">Header color</p>
                            </li>
                            <li class="theme-option">
                                <div class="theme-color"><a href="#" class="header-theme" header-theme="theme1"><span
                                            class="head"></span><span class="cont"></span></a><a href="#"
                                        class="header-theme" header-theme="theme2"><span class="head"></span><span
                                            class="cont"></span></a><a href="#" class="header-theme"
                                        header-theme="theme3"><span class="head"></span><span class="cont"></span></a><a
                                        href="#" class="header-theme" header-theme="theme4"><span
                                            class="head"></span><span class="cont"></span></a><a href="#"
                                        class="header-theme" header-theme="theme5"><span class="head"></span><span
                                            class="cont"></span></a><a href="#" class="header-theme"
                                        header-theme="theme6"><span class="head"></span><span class="cont"></span></a>
                                </div>
                            </li>
                            <li>
                                <p class="selector-title">Active link color</p>
                            </li>
                            <li class="theme-option">
                                <div class="theme-color"><a href="#" class="active-item-theme small"
                                        active-item-theme="theme1">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme2">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme3">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme4">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme5">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme6">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme7">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme8">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme9">&nbsp;</a><a href="#" class="active-item-theme small"
                                        active-item-theme="theme10">&nbsp;</a><a href="#"
                                        class="active-item-theme small" active-item-theme="theme11">&nbsp;</a><a
                                        href="#" class="active-item-theme small" active-item-theme="theme12">&nbsp;</a>
                                </div>
                            </li>
                            <li>
                                <p class="selector-title">Menu Caption Color</p>
                            </li>
                            <li class="theme-option">
                                <div class="theme-color"><a href="#" class="leftheader-theme small"
                                        lheader-theme="theme1">&nbsp;</a><a href="#" class="leftheader-theme small"
                                        lheader-theme="theme2">&nbsp;</a><a href="#" class="leftheader-theme small"
                                        lheader-theme="theme3">&nbsp;</a><a href="#" class="leftheader-theme small"
                                        lheader-theme="theme4">&nbsp;</a><a href="#" class="leftheader-theme small"
                                        lheader-theme="theme5">&nbsp;</a><a href="#" class="leftheader-theme small"
                                        lheader-theme="theme6">&nbsp;</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="slimScrollBar"
                    style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 60.7904px;">
                </div>
                <div class="slimScrollRail"
                    style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                </div>
            </div>
            <ul>
                <li><a href="http://html.codedthemes.com/Adminty/doc" target="_blank"
                        class="btn btn-primary btn-block m-r-15 m-t-5 m-b-10">Online Documentation</a></li>
                <li class="text-center"><span class="text-center f-18 m-t-15 m-b-15 d-block">Thank you for sharing
                        !</span><a href="#!" target="_blank" class="btn btn-facebook soc-icon m-b-20"><i
                            class="feather icon-facebook"></i></a><a href="#!" target="_blank"
                        class="btn btn-twitter soc-icon m-l-20 m-b-20"><i class="feather icon-twitter"></i></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
