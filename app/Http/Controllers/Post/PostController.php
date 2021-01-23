<?php

namespace App\Http\Controllers\Post;

use App\CategoryModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostAdminRequest;
use App\PostModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;


class PostController extends Controller
{
    //TODO page add post
    public function pageCreatePost(){
        $category = CategoryModel::all();
        $data['category'] = $category;
        return view('admin.PostManager.addPost', $data);
    }
    //TODO page all post
    public function pageAllPost(){
        $post = PostModel::with('category')
                ->join('users','user_id', '=', 'users.id')
                ->select('users.name', 'post.*')
                ->paginate(15);
        $data['post'] = $post;
        return view('admin.PostManager.post', $data);
    }
    //TODO page update post
    public function pageUpdatePost($id){
        $post = PostModel::with('category')
                ->where('id', $id)
                ->select('post.*')
                ->first();
        $category = CategoryModel::all();
        $data['post'] = $post;
        $data['category'] = $category;
        return view('admin.PostManager.updatePost', $data);
    }
    //TODO POST update
    public function update(PostAdminRequest $request, $id){

        $category = CategoryModel::find($request->category_id);
        if($category != null && $request->post_status == 1 || $request->post_status == 0) {
            $post = PostModel::find($id);
            $post->post_name = $request->post_name;
            $post->post_slug = Str::slug($request->post_name);
            $post->url_img = $request->url_img;
            $post->post_desc = $request->post_desc;
            $post->post_status = $request->post_status;
            $post->user_id = Auth::user()->id;
            $post->save();
            $post->category()->sync($request->category_id);
            Session::put('message_success', 'sửa bài viết thành công');
            return back();
        } else {
            Session::put('message_errors', 'Vui lòng xem lại value của form');
            return back();
        }
    }
    //TODO POST add post
    public function create(PostAdminRequest $request){
        $category = CategoryModel::find($request->category_id);
        if($category != null && $request->post_status == 1 || $request->post_status == 0) {
            $post = new PostModel();
            $post->post_name = $request->post_name;
            $post->post_slug = Str::slug($request->post_name);
            $post->url_img = $request->url_img;
            $post->post_desc = $request->post_desc;
            $post->post_status = $request->post_status;
            $post->user_id = Auth::user()->id;
            $post->save();
            $post->category()->attach($request->category_id);
            Session::put('message_success', 'Thêm bài viết thành công');
            return back();
        } else {
            Session::put('message_errors', 'Vui lòng xem lại value của form');
            return back();
        }
    }

    //TODO update future
    public function statusFuture($id){
        $post = PostModel::find($id);
        if($post != null) {
            $post->post_status = 1;
            $post->save();
            Session::put('message_success', 'Đã bật nổi bật bài viết');
            return back();
        }
        return response()->route('admin.post');
    }
    //TODO update not Future
    public function statusNotFuture($id){
        $post = PostModel::find($id);
        if($post != null) {
            $post->post_status = 0;
            $post->save();
            Session::put('message_success', 'Đã tắt nổi bật bài viết');
            return back();
        }
        return response()->route('admin.post');
    }
    //TODO destroy
    public function destroy($id){
        $post = PostModel::find($id);
        if ($post != null) {
            PostModel::destroy($id);
            Session::put('message_success', 'xóa bài viết thành công');
            return back();
        }
        return response()->route('admin.post');
    }
}
