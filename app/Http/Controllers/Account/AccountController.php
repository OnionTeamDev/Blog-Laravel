<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountAdminRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;

class AccountController extends Controller
{

    public function update(AccountAdminRequest $request){
        //ISSET password and password  == repassword
        if($request->password != null && $request->repassword != null){
            if($request->password === $request->repassword){
                $id = Auth::user()->id;
                $user = User::find($id);
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->password = bcrypt($request->password);
                $user->save();
                Session::put('message_success', 'cập nhật thông tin và mật khẩu thành công');
                return back();
            }
                Session::put('message_errors', 'password không trùng khớp');
                return back();
        }
        //NOT ISSET password
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        Session::put('message_success', 'cập nhật thông tin thành công');
        return back();
    }
}
