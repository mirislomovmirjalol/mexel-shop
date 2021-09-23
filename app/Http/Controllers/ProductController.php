<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            $rate = $product->rate;
            $rate += 0.1;
            $product->rate = $rate;
            $product->save();

            return view('product', compact('product'));
        }
        return abort('404');
    }

    public function create()
    {
        $categories = category::latest()->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'desc' => ['string', 'max:255', 'nullable'],
                'price' => ['required', 'min:1', 'max:255'],
                'category_id' => ['required', 'numeric', 'min:1'],
                "image" => ['required', 'image'],
            ]);

        $product = new product();
        $image = $request->file("image");
        $new_name = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images'), $new_name);

        $product->image = $new_name;
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($product->save()) {
            session()->flash('success', "$product->name product qoshildi!");
        } else {
            session()->flash('warning', "$product->name product qoshilmadi!");
        }
        return redirect()->route('admin.product');
    }

    public function edit($id)
    {
        $product = product::where('id', $id)->first();
        $categories = category::latest()->get();
        if ($product) {
            return view('admin.product.edit', compact('product', 'categories'));
        }
        return abort('404');
    }

    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'desc' => ['string', 'max:255', 'nullable'],
                'price' => ['required', 'string', 'min:1', 'max:255'],
                'rate' => ['required'],
                'category_id' => ['required', 'numeric', 'min:1'],

            ]);

        $product = product::where('id', $request->id)->first();
        if (!$product) {
            return abort('404');
        }

        $image = $request->file('image');

        if ($image != '') {
            $new_name = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . $image->getClientOriginalName();

            unlink(public_path('images/') . $product->image);

            $image->move(public_path('images/'), $new_name);

            $product->image = $new_name;
        }

        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->rate = $request->rate;
        $product->category_id = $request->category_id;

        if ($product->save()) {
            session()->flash('success', "$product->name product ozgartirildi!");
        } else {
            session()->flash('warning', "$product->name product ozgartirilmadi!");
        }
        return redirect()->route('admin.product');
    }

    public function destroy($id)
    {
        $product = product::where('id', $id)->first();
        if (!$product) {
            return abort('404');
        }
        if ($product->delete()) {
            session()->flash('success', "$product->name product ochirildi!");
        } else {
            session()->flash('warning', "$product->name product ochirilmadi!");
        }
        return redirect()->route('admin.product');

    }
}
