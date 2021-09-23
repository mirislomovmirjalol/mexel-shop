<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::where("id", $id)->first();
        if ($category) {
            $products = product::where("category_id", $id)->latest()->get();

            if ($products) {
                return view('category', compact('products'));
            }
            return abort('404');
        }
        return abort('404');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                "name" => "required",
                "image" => "required|image",
            ]);

        $category = new Category;
        $image = $request->file("image");
        $new_name = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images'), $new_name);

        $category->image = $new_name;
        $category->name = $request->name;
        if ($category->save()) {
            session()->flash('success', "$category->name category qoshildi!");
        } else {
            session()->flash('warning', "$category->name category qoshilmadi!");
        }
        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        $category = Category::where("id", $id)->first();
        if ($category) {
            return view('admin.category.edit' , compact('category'));
        }
        return abort('404');
    }

    public function update(Request $request)
    {
        $this->validate($request,
            [
                "name" => "required",
            ]);

        $category = Category::where('id' , $request->id)->first();
        if (!$category) {
            return abort('404');
        }
        $image = $request->file('image');

        if ($image != '') {
            $new_name = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . $image->getClientOriginalName();

            unlink(public_path('images/') . $category->image);

            $image->move(public_path('images/'), $new_name);

            $category->image = $new_name;
        }
        $category->name = $request->name;
        if ($category->save()) {
            session()->flash('success', "$category->name category ozgartirildi!");
        } else {
            session()->flash('warning', "$category->name category ozgartirilmadi!");
        }
        return redirect()->route('admin.category');
    }

    public function destroy($id)
    {
        $category = category::where('id', $id)->first();
        if (!$category) {
            return abort('404');
        }
        if ($category->delete()) {
            session()->flash('success', "$category->name category ochirildi!");
        } else {
            session()->flash('warning', "$category->name category ochirilmadi!");
        }
        return redirect()->route('admin.category');

    }
}
