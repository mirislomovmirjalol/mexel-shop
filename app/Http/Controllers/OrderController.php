<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_product;
use App\Models\Order;
use App\Models\Order_address;
use App\Models\order_product;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class OrderController extends Controller
{
    public function orderConfirmed(Request $request)
    {
        $this->validate($request,
            [
                'city' => ['required', 'string', 'max:255'],
                'region' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'home_number' => ['required', 'numeric'],
                'landmark' => ['nullable', 'string'],
            ]);


        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        $products = Cart_product::where('cart_id', $cart->id)->latest()->get();

        if (!$products) {
            return abort('404');
        }

        $order = new Order;
        $order->user_id = $user->id;
        $order->save();

        $address = new Order_address;
        $address->order_id = $order->id;
        $address->city = $request->city;
        $address->region = $request->region;
        $address->street = $request->street;
        $address->home_number = $request->home_number;
        $address->landmark = $request->landmark;
        if ($address->save()) {
            foreach ($products as $order_product) {

                $product = Product::where('id', $order_product->product_id)->first();
                $rate = $product->rate;
                $rate += 0.1;
                $product->rate = $rate;
                $product->save();

                $order_products = new order_product;
                $order_products->order_id = $order->id;
                $order_products->product_id = $order_product->product_id;
                $order_products->count = $order_product->count;
                $order_products->save();

            }
            session()->flash('success', "Order qabul qilindi!");
        }
        $cart->delete();
        return redirect()->route('home');
    }

    public function activeOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->whereIn('status', ['0', '1'])->latest()->get();
        return view('activeOrders', compact('orders'));
    }

    public function historyOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->whereIn('status', ['2', '3'])->latest()->get();
        return view('historyOrders', compact('orders'));
    }

    public function showOrder($id)
    {
        $userOrders = Order::where('user_id', Auth::user()->id);
        $order = $userOrders->where('id', $id)->first();
        if (!$order) {
            return abort('404');
        }
        $products = order_product::where('order_id', $order->id)->latest()->get();

        return view('order', compact('id', 'products'));
    }

    public function order()
    {
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function activeOrderForAdmin()
    {
        $orders = Order::whereIn('status', ['0', '1'])->latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function historyOrderForAdmin()
    {
        $orders = Order::whereIn('status', ['2', '3'])->latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request)
    {
        $this->validate($request,
            [
                'city' => ['required', 'string', 'max:255'],
                'region' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'home_number' => ['required', 'numeric'],
                'landmark' => ['nullable', 'string'],
            ]);

        $order = order_address::where('order_id', $request->id)->first();
        if (!$order) {
            return abort('404');
        }

        $order->city = $request->city;
        $order->region = $request->region;
        $order->street = $request->street;
        $order->home_number = $request->home_number;
        $order->landmark = $request->landmark;

        if ($order->save()) {
            session()->flash('success', "#$order->id order ozgartirildi!");
        } else {
            session()->flash('warning', "#$order->id order ozgartirilmadi!");
        }
        return redirect()->route('admin.order');
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        if (!$order) {
            return abort('404');
        }
        $products = order_product::where('order_id', $order->id)->latest()->get();

        return view('admin.order.show', compact('id', 'products', 'order'));
    }

    public function addToCart($productId, $order)
    {
        $product = Product::where('id', $order)->first();
        if (!$product) {
            abort('404');
        }
        $order_product = order_product::where('order_id', $productId)->where('product_id', $order)->first();
        if (is_null($order_product)) {
            return abort('404');
        } else {
            $count = $order_product->count;
            $count++;
            $order_product->count = $count;
        }

        $order_product->save();
        session()->flash('success', "Savatga $product->name qoshildi!");
        return redirect()->back();
    }

    public function reduceFromCart($productId, $order)
    {
        $product = Product::where('id', $order)->first();
        if (!$product) {
            abort('404');
        }
        $order_product = order_product::where('order_id', $productId)->where('product_id', $order)->first();
        if (isNull($order_product)) {
            $count = $order_product->count;
            if ($count > 1) {
                $count--;
                $order_product->count = $count;
                $order_product->save();
            } else {
                $order_product->delete();
            }
            session()->flash('warning', "Savatdan $product->name kamaytirildi!");
            return redirect()->back();
        }
        return abort('404');
    }

    public function removeFromCart($productId, $order)
    {
        $product = Product::where('id', $order)->first();
        if (!$product) {
            abort('404');
        }
        $cartId = order::where('id', $productId)->first();
        $order_product = order_product::where('order_id', $productId)->where('product_id', $order)->first();
        if (isNull($order_product)) {
            $order_product->delete();
        } else {
            return abort('404');
        }
        session()->flash('warning', "Savatdan $product->name olib tashlandi!");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $order = order::where('id', $id)->first();
        if (!$order) {
            return abort('404');
        }
        if ($order->delete()) {
            session()->flash('success', "#$order->id order ochirildi!");
        } else {
            session()->flash('warning', "#$order->id order ochirilmadi!");
        }
        return redirect()->route('admin.order');

    }

    public function cancelOrder($order)
    {
        $order = order::where('id', $order)->first();
        if (!$order) {
            return abort('404');
        }
        $order->status = 3;
        if ($order->save()) {
            session()->flash('warning', "#$order->id order bekor qilindi!");
        } else {
            session()->flash('danger', "#$order->id order bekor qilinmadi!");
        }
        return redirect()->route('admin.order');
    }

    public function confirmOrder($order)
    {
        $order = order::where('id', $order)->first();
        if (!$order) {
            return abort('404');
        }
        $order->status = 1;
        if ($order->save()) {
            session()->flash('success', "#$order->id order qabul qilindi!");
        } else {
            session()->flash('danger', "#$order->id order qabul qilinmadi!");
        }
        return redirect()->route('admin.order');
    }

    public function deliveredOrder($order)
    {
        $order = order::where('id', $order)->first();
        if (!$order) {
            return abort('404');
        }
        $order->status = 2;
        if ($order->save()) {
            session()->flash('success', "#$order->id order qabul qilindi!");
        } else {
            session()->flash('danger', "#$order->id order qabul qilinmadi!");
        }
        return redirect()->route('admin.order');
    }
}
