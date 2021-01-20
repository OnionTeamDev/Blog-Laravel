<?php

namespace App\Http\Controllers\Post;

use App\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function pageCreatePost(Request $request){
        $category = CategoryModel::all();
        $data['category'] = $category;
        return view('admin.PostManager.post', $data);
    }
}
