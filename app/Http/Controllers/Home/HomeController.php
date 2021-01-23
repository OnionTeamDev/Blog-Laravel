<?php

namespace App\Http\Controllers\Home;

use App\CategoryModel;
use App\Http\Controllers\Controller;
use App\Mail\ThanksContact;
use App\PostModel;
use App\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function pageIndex(){
        $data['slider'] = SliderModel::all();
        $data['postNew'] =  PostModel::with('category')
                                ->join('users','user_id', '=', 'users.id')
                                ->select('users.name', 'post.*')
                                ->orderByDesc('created_at')
                                ->limit(4)
                                ->get();
        $data['post'] =  PostModel::with('category')
                                ->join('users','user_id', '=', 'users.id')
                                ->select('users.name', 'post.*')
                                ->orderByDesc('created_at')
                                ->paginate(10);
        $data['slider'] = SliderModel::where('slider_status', 1)
                                ->orderByDesc('created_at')
                                ->first();
        $data['category'] = CategoryModel::where('category_status', 1)->get();
        return view('visitor.index', $data);
    }

    public function pageDetail($slug){
        $checkPost = PostModel::where('post_slug', $slug)->first();
        if($checkPost != null){
            $post =  PostModel::with('category')
                    ->join('users','user_id', '=', 'users.id')
                    ->select('users.name', 'post.*')
                    ->where('post_slug', $slug)
                    ->first();
            $data['post'] = $post;
            return view('visitor.pageDetail', $data);
        }
         return redirect()->route('index');
    }
    public function sendContact(Request $request){
        $mail = $request->email;
        $data['mail'] = $mail;
        // Mail::to($mail)
        //     ->cc('minhho.technology@gmail.com', 'Minh Hồ')
        //     ->send(new ThanksContact());
        Mail::send('contactMail', $data, function ($message) use ($mail) {
            $message->from('minho.technology@gmail.com', 'OnionTeam');
            $message->to($mail);
            $message->cc('minhho.technology@gmail.com', 'Minh Hồ');
            $message->subject('Cảm ơn bạn đã đăng kí nhân thư thông báo từ chúng tôi');
        });
       return back();
    }
}
