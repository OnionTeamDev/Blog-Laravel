<?php

namespace App\Http\Controllers\Home;

use App\CategoryModel;
use App\Events\NewSendMailContactEvent;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\ThanksContact;
use App\PostModel;
use App\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
        // $job = (new SendEmailJob($data, $mail))->delay(Carbon::now()->addSeconds(10));
        // dispatch($job);
        event(new NewSendMailContactEvent($data, $mail));
        return back();
    }

    public function PostCategory($slug) {
        $data['keywordCategory'] = $slug;
        $data['post'] = PostModel::with('category')
                                ->whereHas('category', function($query) use ($slug) {
                                    $query->where('category_slug', $slug);
                                })
                                ->join('users','user_id', '=', 'users.id')
                                ->select('users.name', 'post.*')
                                ->orderByDesc('created_at')
                                ->paginate(15);
        return view('visitor.postCategory', $data);
    }
}
