<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\Http\Requests\CategoryAdminRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
use Session;

class CategoryController extends Controller
{
    //PAGE category
    public function pageCategory(){
        $category =  CategoryModel::paginate(8);
        $data['category'] = $category;
        return view('admin.CategoryManager.category', $data);
    }

    //PAGE update category
    public function pageUpdateCategory($id){
        $category = CategoryModel::where('id', $id)->get();
        if ($category != null) {
            $data['category'] = $category;
            return view('admin.CategoryManager.updateCategory', $data);
        } else {
            return redirect()->route('admin.category');
        }

    }
    //POST update status
    public function statusFuture($id){
        $category = CategoryModel::find($id);
        if($category != null){
            $category->category_status = 1;
            $category->save();
            Session::put('message_success', 'Đã bật danh mục nổi bật');
            return back();
        } else {
            return redirect()->route('admin.category');
        }
    }
    //POST update category
    public function update(CategoryAdminRequest $request, $id){
        $category = CategoryModel::find($id);
        if ($category != null) {
            $category->category_name = $request->category_name;
            $category->category_slug = Str::slug($request->category_name);
            $category->category_status = $request->category_status;
            $category->category_desc = $request->category_desc;
            $category->save();
            Session::put('message_success', 'Sửa danh mục thành công');
            return back();
        }
        return response()->route('admin.category');
    }

    public function statusNotFuture($id) {
        $category = CategoryModel::find($id);
        if($category != null) {
            $category->category_status = 0;
            $category->save();
            Session::put('message_success', 'Đã tắt danh mục nổi bật');
            return back();
        } else {
            return redirect()->route('admin.category');
        }

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
        $category = CategoryModel::find($id);
        if($category != null){
            CategoryModel::destroy($id);
            Session::put('message_success', 'Đã xóa danh mục');
            return back();
        }
            return response()->route('admin.category');
    }

}
