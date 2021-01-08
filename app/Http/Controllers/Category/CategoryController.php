<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\Http\Requests\CategoryAdminRequest;
use Illuminate\Support\Str;
use Session;

class CategoryController extends Controller
{
    //PAGE category
    public function pageCategory(){
        $category =  CategoryModel::paginate(8);
        $data['category'] = $category;
        return view('admin.category', $data);
    }
    //POST category
    public function create(CategoryAdminRequest $request){
        $category = new CategoryModel();
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        $category->category_status = $request->category_status;
        $category->category_desc = $request->category_desc;
        $category->save();
        Session::put('message_success', 'Thêm danh mục thành công');
        return back();
    }
    public function destroy($id){
        $category = CategoryModel::destroy($id);
        if(isset($category)){
            Session::put('message_success', 'Đã xóa danh mục');
        }else{
            Session::put('message_error', 'Đã xóa danh mục');
        }
        return back();
    }

}
