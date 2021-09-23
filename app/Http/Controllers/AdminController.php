<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.admin.index', compact('users'));
    }

    public function category()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function product()
    {
        $products = product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    public function admin()
    {
        $users = User::where('is_admin', 1)->latest()->get();
        return view('admin.admin.index', compact('users'));
    }

    public function client()
    {
        $users = User::where('is_admin', 0)->latest()->get();
        return view('admin.admin.index', compact('users'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['string', 'email', 'unique:users', 'max:255', 'nullable'],
                'phone' => ['required', 'string', 'unique:users', function ($attribute, $value, $fail) {
                    if (str_contains($value, '_')) {
                        $fail('The ' . $attribute . ' required.');
                    }
                },],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;

        if ($user->save()) {
            session()->flash('success', "$user->name admin qoshildi!");
        } else {
            session()->flash('warning', "$user->name admin qoshilmadi!");
        }
        return redirect()->route('admin.admin');
    }

    public function edit($id)
    {
        $admin = User::where("id", $id)->first();
        if ($admin) {
            return view('admin.admin.edit', compact('admin'));
        }
        return abort('404');
    }

    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['string', 'email', 'max:255', 'nullable'],
                'phone' => ['string', 'nullable', 'unique:users'],
                'password' => ['string', 'min:8', 'confirmed', 'nullable'],
            ]);

        $user = User::where('id', $request->id)->first();
        if (!$user) {
            return abort('404');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->is_admin = $request->is_admin;

        if ($user->save()) {
            session()->flash('success', "$user->name admin ozgartirildi!");
        } else {
            session()->flash('warning', "$user->name admin ozgartirilmadi!");
        }
        return redirect()->route('admin.admin');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return abort('404');
        }
        if ($user->delete()) {
            session()->flash('success', "$user->name user ochirildi!");
        } else {
            session()->flash('warning', "$user->name user ochirilmadi!");
        }
        return redirect()->route('admin.admin');

    }
}
