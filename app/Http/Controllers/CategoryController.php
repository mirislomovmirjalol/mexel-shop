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
}
