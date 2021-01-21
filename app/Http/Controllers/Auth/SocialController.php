<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class SocialController extends Controller
 {
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider);
        if ($user->hasRole('super_admin') == true) {
            Auth::login($user, true);
            return Redirect::to('dashboard');
        }
        Session::put('message_success', 'Cảm ơn bạn đã đăng kí. Bạn chưa được phép truy cập vào trang này !!');
        return Redirect::to('admin')->withInput();
    }

    public function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'password' => bcrypt('123456'),
                'provider_id' => $getInfo->id,
            ]);
            $user->assignRole('guest');
        }
        return $user;
    }
 }
