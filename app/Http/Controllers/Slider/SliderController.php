<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderAdminRequest;
use App\SliderModel;
use Illuminate\Support\Str;
use Session;

class SliderController extends Controller
{
    public function pageAddSlider(){
        return view('admin.SliderManager.addSlider');
    }
    public function pageUpdateSlider($id){
        $slider = SliderModel::where('id', $id)->first();
        $data['slider'] = $slider;
        return view('admin.SliderManager.updateSlider', $data);
    }
    public function pageAllSlider(){
        $slider = SliderModel::paginate(6);
        $data['slider'] = $slider;
        return view('admin.SliderManager.slider', $data);
    }
     //TODO update future
     public function statusFuture($id){
        $slider = SliderModel::find($id);
        if($slider != null) {
            $slider->slider_status = 1;
            $slider->save();
            Session::put('message_success', 'Đã bật nổi bật bài viết');
            return back();
        }
        return response()->route('admin.slider');
    }
    //TODO update not Future
    public function statusNotFuture($id){
        $slider = SliderModel::find($id);
        if($slider != null) {
            $slider->slider_status = 0;
            $slider->save();
            Session::put('message_success', 'Đã tắt nổi bật bài viết');
            return back();
        }
        return response()->route('admin.slider');
    }
    //TODO Create Slider
    public function create(SliderAdminRequest $request){
        if($request->slider_status == 1 || $request->slider_status == 0) {
            $slider = new SliderModel();
            $slider->slider_name = $request->slider_name;
            $slider->slider_slug = Str::slug($request->slider_name);
            $slider->slider_img = $request->url_img;
            $slider->slider_desc = $request->slider_desc;
            $slider->slider_status = $request->slider_status;
            $slider->save();
            Session::put('message_success', 'Thêm bài viết thành công');
            return back();
        } else {
            Session::put('message_errors', 'Vui lòng xem lại value của form');
            return back();
        }
    }
     //TODO destroy
     public function destroy($id){
        $slider = SliderModel::find($id);
        if ($slider != null) {
            SliderModel::destroy($id);
            Session::put('message_success', 'xóa bài viết thành công');
            return back();
        }
        return response()->route('admin.slider');
    }
    //TODO slider update
    public function update(SliderAdminRequest $request, $id){
        if($request->slider_status == 1 || $request->slider_status == 0) {
            $slider = SliderModel::find($id);
            $slider->slider_name = $request->slider_name;
            $slider->slider_slug = Str::slug($request->slider_name);
            $slider->slider_img = $request->url_img;
            $slider->slider_desc = $request->slider_desc;
            $slider->slider_status = $request->slider_status;
            $slider->save();
            Session::put('message_success', 'sửa slider thành công');
            return back();
        } else {
            Session::put('message_errors', 'Vui lòng xem lại value của form');
            return back();
        }
    }
}
