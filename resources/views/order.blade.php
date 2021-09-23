@extends('layouts.app')

@section('content')
    <div class="container my-10 h-screen">
        <div class="lg:w-1/2 md:w-full mx-auto flex flex-col bg-white shadow-xl">
            <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                <div class="flex items-start justify-between">
                    <a href="{{ URL::previous() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <h2 class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl"
                        id="slide-over-title">
                        Order #{{ $id }}
                    </h2>
                    <span></span>
                </div>

                <div class="mt-8">
                    <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                            @if($products)

                                @foreach($products as $product)
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
                                                    <span class="font-semibold px-2 mx-1">{{ $product->count }}</span>
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
                            {{ $product->getFullPrice($id) }}
                        @else
                            0
                        @endif
                        sum</p>
                </div>
                <p class="mt-0.5 text-sm text-yellow-500">Delivery is not included in this price!</p>
                <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                    <p>
                        <button type="button"
                                class="mx-2 text-gray-800 border rounded-md p-2 hover:bg-gray-200 focus:outline-none"
                                @click="open = false">Continue Shopping<span aria-hidden="true"> →</span></button>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

