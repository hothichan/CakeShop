<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trông',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Mô tả không được để trông',
            'category_img.mimes' => 'Không phải là file ảnh',
            'category_img.file' => 'Ảnh phải là một file',
        ]);

        $data = $request->only('name', 'description');
        $img_name = $request->category_img->hashName();
        if ($img_name) {
            $request->category_img->move(public_path('uploads/category/'), $img_name);
            $data['image'] = $img_name;
        }
        // dd($data);
        if(Category::create($data)) {
            return redirect()->route('category.index')->with('success', 'Thêm mới thành công');
        }
       
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm mới');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'description' => 'required',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trông',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Mô tả không được để trông',
        ]);

        $data = $request->all('name', 'description');
        if($request->has('product_img')) {
            $img_name = $category->image;
            $img_part = public_path('uploads/category').'/' . $img_name;
            if(file_exists($img_part)) {
                unlink($img_part);
            }
        }
        if($category->update($data)) {
            return redirect()->route('category.index')->with('success', 'Sửa thành công');
        }
        return redirect()->back()->with('error', 'Không thể sửa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $img_name = $category->image;
        $img_part = public_path('uploads/category').'/' . $img_name;
        if(file_exists($img_part)) {
            unlink($img_part);
        }
        if($category->delete()) {
            return redirect()->route('category.index')->with('success', 'Xóa thành công');
        }
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm mới');
    }
}