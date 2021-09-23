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

                                @foreach($cart as $product)
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
                                                    <form
                                                        action="{{ route('cart.remove', $product->products()->first()->id) }}"
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
                <p class="mt-0.5 text-sm text-yellow-500">Delivery is not included in this price!</p>
                <div class="mt-6">
                    <button type="button" onclick="confirmModal()"
                            class="w-full px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-800 hover:bg-gray-600">
                        Checkout
                    </button>
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


    <div
        class="min-w-screen px-2 hidden h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="confirmModal">
        <div class="absolute bg-gray-600 bg-opacity-60 opacity-80 inset-0 z-0"></div>
        <div
            class="w-full  max-w-lg p-2 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="text-center p-5 flex-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-16 h-16 flex items-center text-green-400 mx-auto"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd"
                              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h2>
                    <p class="text-sm  px-8 ">Please check your cart and make sure you added products all you need</p>
                </div>
                <!--modal footer-->
                <div class="flex justify-around">
                    <button
                        type="button"
                        onclick="cencelModal()"
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <form action="{{ route('cart.address') }}">
                        <button
                            type="submit"
                            class="mb-2 md:mb-0 bg-green-400 border border-green-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600">
                            Next Step
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmModal() {
            let modalId = document.getElementById('confirmModal')
            modalId.classList.remove('hidden')
        }

        function cencelModal() {
            let modalId = document.getElementById('confirmModal')
            modalId.classList.add('hidden')
        }
    </script>
@endsection

