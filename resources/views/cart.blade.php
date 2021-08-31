@extends('layouts.app')

@section('content')
    <div class="container my-10 h-screen">
        <div class="lg:w-1/2 md:w-full mx-auto flex flex-col bg-white shadow-xl">
            <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                <div class="flex items-start justify-between">
                    <h2 class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl"
                        id="slide-over-title">
                        Shopping cart
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                            @if($cart)

                                @foreach($cart->get() as $product)
                                    <li class="py-6 flex">
                                        <div
                                            class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                            <img
                                                src="{{ asset('images') }}/{{ $product->products()->first()->image }}"
                                                class="w-full h-full object-center object-cover">
                                        </div>

                                        <div class="ml-4 flex-1 flex flex-col">
                                            <div>
                                                <div class="flex justify-between font-medium text-gray-800">
                                                    <h3>
                                                        <a href="{{ route ('product.show', $product->products()->first()->id) }}">
                                                            {{ $product->products()->first()->name }}
                                                        </a>
                                                    </h3>
                                                    <p class="ml-4">
                                                        {{ $product->products()->first()->price }} Sum
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="flex-1 flex items-end justify-between text-sm">
                                                <div class="pr-8 flex ">
                                                    <form
                                                        action="{{ route ('cart.reduce', $product->products()->first()->id) }}"
                                                        method="post">
                                                        <button type="submit" role="button">
                                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                                -
                                                            </span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                    <span class="font-semibold px-2 mx-1">{{ $product->count }}</span>
                                                    <form
                                                        action="{{ route ('cart.add', $product->products()->first()->id) }}"
                                                        method="post">
                                                        <button type="submit" role="button">
                                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                                +
                                                            </span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>

                                                <div class="flex">
                                                    <form action="{{ route('cart.remove', $product->products()->first()->id) }}"
                                                          method="post">
                                                        <button type="submit"
                                                                class="font-medium text-red-600 hover:text-gray-400">
                                                            Remove
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="py-6 flex">
                                    <div class="ml-4 flex-1 flex flex-col">
                                        <div>
                                            <div class="flex justify-between font-medium text-gray-800">
                                                <h3>
                                                    You Don't Have Any products on your cart!
                                                </h3>

                                            </div>

                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>Subtotal</p>
                    <p>
                        @if($product ?? '')
                            {{ $product->getFullPrice($cartId->id) }}
                        @else
                            0
                        @endif
                    sum</p>
                </div>
                <p class="mt-0.5 text-sm text-yellow-500">Taxing doesn't calculated at this price!</p>
                <div class="mt-6">
                    <a href="#"
                       class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-800 hover:bg-gray-600">Checkout</a>
                </div>
                <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                    <p>
                        or
                        <button type="button"
                                class="mx-2 text-gray-800 border rounded-md p-2 hover:bg-gray-200 focus:outline-none"
                                @click="open = false">Continue Shopping<span aria-hidden="true"> →</span></button>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

