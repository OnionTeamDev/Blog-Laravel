<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use Session;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.dashboard');
    }

    public function postLogin(LoginAdminRequest $request){
        $requests = $request->only('email', 'password');
        if (Auth::attempt($requests, $request->has('remember'))) {
            $users = Auth::user();
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
