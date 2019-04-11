<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
    	$categories = Category::where('user_id', $id)->orderBy('parent_id')->get();
    	return view('category/show_category', compact('categories'));
    }

     public function showReceipt($id)
    {
        $categories = Category::where('user_id', $id)->where('parent_id', receipt)->get();
        return view('category/receipts_category', compact('categories'));
    }

     public function showExpense($id)
    {
        $categories = Category::where('user_id', $id)->where('parent_id', expense)->get();
        return view('category/expenses_category', compact('categories'));
    }

    public function createCategory()
    {
    	return view('category/create_category');
    }
    public function store(CategoryRequest $request, $id)
    {
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
        $pcategory = Category::store($request->all());
        $id = Auth::id();
        return redirect()->route('category.show',['id' => $id])->with('alert', 'Tạo danh mục thành công');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category/edit_category', compact('category'));
    }

    public function updateCategory(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = Category::updateCategory($data, $id);
        return redirect()->route('category.show',['category' => $category, 'id' => Auth::id()])->with('alert', 'Cập 
        nhật thành công');
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        $user_id = Auth::id();
        return redirect()->route('category.show', ['id' => $user_id])->with('alert', 'Xóa ví thành công');
    }
}
