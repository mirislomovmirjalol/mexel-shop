<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bestProducts = product::orderBy('rate', 'desc')->limit(4)->get();
        $newProducts = product::latest()->limit(4)->get();
        return view('home', compact('bestProducts', 'newProducts'));
    }

    public function showProfile()
    {
        return view('profile');
    }

    public function showHistoryOrders()
    {
        return view('historyOrders');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->searchTerm;
        if (!$searchTerm) {
            return abort('404');
        }
        $items = product::query()->where('name',  'LIKE', "%{$searchTerm}%")->get();
        if (!$items) {
            $searchTerm = null;
            $items = null;
            return view('search', compact('items','searchTerm'));
        }
        return view('search', compact('items','searchTerm'));
    }
}
