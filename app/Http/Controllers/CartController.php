<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_product;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function index()
    {
        $cartId = Cart::where('user_id', Auth::user()->id)->first();
        if (!is_null($cartId)) {
            $cart = Cart_product::where('cart_id', '=', $cartId->id)->first();
        } else {
            $cartId = Cart::create(['user_id' => Auth::user()->id,]);
            $cart = false;
        }
        return view('cart', compact('cart', 'cartId'));
    }

    public function addToCart($productId)
    {

        $product = Product::where('id', $productId)->first();
        if (!$product) {
            abort('404');
        }
        $cartId = Cart::where('user_id', Auth::user()->id)->first();
        if (is_null($cartId)) {
            $cart = Cart::create(['user_id' => Auth::user()->id,]);
            $cart_product = new Cart_product;
            $cart_product->cart_id = $cart->id;
            $cart_product->product_id = $productId;
            $cart_product->save();
        } else {
            $cart_product = Cart_product::where('product_id', $productId)->first();
            if (is_null($cart_product)) {
                $cart_product = new Cart_product;
                $cart_product->cart_id = $cartId->id;
                $cart_product->product_id = $productId;
            } else {
                $count = $cart_product->count;
                $count++;
                $cart_product->count = $count;
            }
            $cart_product->save();
        }
        session()->flash('success', "Savatga $product->name qoshildi!");
        return redirect()->back();
    }

    public function reduceFromCart($productId)
    {
        $product = Product::where('id', $productId)->first();
        if (!$product) {
            abort('404');
        }
        $cart_product = Cart_product::where('product_id', $productId)->first();
        if (isNull($cart_product)) {
            $count = $cart_product->count;
            if ($count > 1) {
                $count--;
                $cart_product->count = $count;
                $cart_product->save();
            } else {
                $cart_product->delete();
            }
            session()->flash('warning', "Savatdan $product->name kamaytirildi!");
            return redirect()->back();
        }
        return abort('404');
    }

    public function removeFromCart($productId)
    {
        $product = Product::where('id', $productId)->first();
        if (!$product) {
            abort('404');
        }
        $cart_product = Cart_product::where('product_id', $productId)->first();
        if (isNull($cart_product)) {
            $cart_product->delete();
        } else {
            return abort('404');
        }
        session()->flash('warning', "Savatdan $product->name olib tashlandi!");
        return redirect()->back();
    }

    public function address()
    {
        return view('address');
    }
}
