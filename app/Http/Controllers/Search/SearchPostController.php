<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\PostModel;
use Illuminate\Http\Request;

class SearchPostController extends Controller
{
    public function searchPost(Request $request) {
        $result = $request->search_post;
        $results = str_replace(' ','%',$result);
        $data['keyword'] = $result;
        $post = PostModel::with('category')
                    ->join('users','user_id', '=', 'users.id')
                    ->select('users.name', 'post.*')
                    ->where('post_name','LIKE','%'.$results.'%')
                    ->paginate(2);
        $data['post'] = $post;
        return view('admin.SearchManager.search', $data);
    }
}
