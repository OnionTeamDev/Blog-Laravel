<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Session;

class RegisterController extends Controller
{
    //
    public function pageRegister(){
        return view('admin.register');
    }

    public function postRegister(RegisterAdminRequest $request){
        if ($request->password == $request->repass) {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => bcrypt($request->password),
            ]);
            $user->assignRole('guest');
            Session::put('message_success', 'Đăng kí thành công, xin cảm ơn !!');
            return redirect()->back();
        } else {
            Session::put('message_errors', 'Mật khẩu nhập không khớp, vui lòng thử lại');
            return redirect()->back();
        }

    }
}
