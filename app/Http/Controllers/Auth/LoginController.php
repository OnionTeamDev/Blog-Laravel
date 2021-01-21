<?php

namespace App\Http\Controllers\Auth;

use App\CategoryModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\PostModel;
use App\SliderModel;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
        ** @arg
    */
    public function pageLogin(){
        return view('admin.guest');
    }

    public function pageDashboard() {
        $data['category'] = CategoryModel::all()->count();
        $data['post'] = PostModel::all()->count();
        $data['slider'] =  SliderModel::all()->count();
        $data['user'] =  User::all()->count();

        $data['category_lasted'] = DB::table('category')->orderBy('updated_at', 'desc')->value('updated_at');
        $data['post_lasted'] = DB::table('post')->orderBy('updated_at', 'desc')->value('updated_at');
        $data['slider_lasted'] = DB::table('slider')->orderBy('updated_at', 'desc')->value('updated_at');
        $data['user_lasted'] = DB::table('users')->orderBy('updated_at', 'desc')->value('updated_at');

        return view('admin.dashboard', $data);
    }

    public function postLogin(LoginAdminRequest $request){
        $requests = $request->only('email', 'password');
        if (Auth::attempt($requests, $request->has('remember'))) {
            $user = $user = User::where('id', Auth::user()->id)->first();;
            if($user->hasRole('super_admin') != true){
                Auth::logout();
                Session::put('message_errors','Bạn không có quyền truy cập vào trang này !!');
                return Redirect::to('admin');
            }
            return Redirect::to('dashboard');
        }
            Session::put('message_errors','Mật khẩu không chính xác, vui lòng thử lại!!');
            return Redirect::to('admin')->withInput();
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('admin');
    }

}
