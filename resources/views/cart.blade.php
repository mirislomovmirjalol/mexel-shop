@extends('layouts.app')

@section('content')
    <div class="container my-10">
        <div class="lg:w-1/2 md:w-full mx-auto h-full flex flex-col bg-white shadow-xl">
            <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                <div class="flex items-start justify-between">
                    <h2 class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" id="slide-over-title">
                        Shopping cart
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                            <li class="py-6 flex">
                                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                    <img
                                        src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                        class="w-full h-full object-center object-cover">
                                </div>

                                <div class="ml-4 flex-1 flex flex-col">
                                    <div>
                                        <div class="flex justify-between text-gray-800">
                                            <h3>
                                                <a href="#">
                                                    Throwback Hip Bag
                                                </a>
                                            </h3>
                                            <p class="ml-4">
                                                10.00 Sum
                                            </p>
                                        </div>

                                    </div>
                                    <div class="flex-1 flex items-end justify-between text-sm">
                                        <div class="pr-8 flex ">
                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                <a href="#" class="hover:no-underline">-</a>
                                            </span>
                                            <span class="font-semibold px-2 mx-1">1</span>
                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                <a href="#" class="hover:no-underline">+</a>
                                            </span>
                                        </div>

                                        <div class="flex">
                                            <button type="button"
                                                    class="font-medium text-red-600 hover:text-gray-400">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="py-6 flex">
                                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                    <img
                                        src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                        class="w-full h-full object-center object-cover">
                                </div>

                                <div class="ml-4 flex-1 flex flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-800">
                                            <h3>
                                                <a href="#">
                                                    Throwback Hip Bag
                                                </a>
                                            </h3>
                                            <p class="ml-4">
                                                10.00 Sum
                                            </p>
                                        </div>

                                    </div>
                                    <div class="flex-1 flex items-end justify-between text-sm">
                                        <div class="pr-8 flex ">
                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                <a href="#" class="hover:no-underline">-</a>
                                            </span>
                                            <span class="font-semibold px-2 mx-1">1</span>
                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                <a href="#" class="hover:no-underline">+</a>
                                            </span>
                                        </div>

                                        <div class="flex">
                                            <button type="button"
                                                    class="font-medium text-red-600 hover:text-gray-400">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="py-6 flex">
                                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                    <img
                                        src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                        class="w-full h-full object-center object-cover">
                                </div>

                                <div class="ml-4 flex-1 flex flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-800">
                                            <h3>
                                                <a href="#">
                                                    Throwback Hip Bag
                                                </a>
                                            </h3>
                                            <p class="ml-4">
                                                10.00 Sum
                                            </p>
                                        </div>

                                    </div>
                                    <div class="flex-1 flex items-end justify-between text-sm">
                                        <div class="pr-8 flex ">
                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                <a href="#" class="hover:no-underline">-</a>
                                            </span>
                                            <span class="font-semibold px-2 mx-1">1</span>
                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                <a href="#" class="hover:no-underline">+</a>
                                            </span>
                                        </div>

                                        <div class="flex">
                                            <button type="button"
                                                    class="font-medium text-red-600 hover:text-gray-400">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>Subtotal</p>
                    <p>30.00 Sum</p>
                </div>
                <p class="mt-0.5 text-sm text-yellow-500">Taxing doesn't calculated at this price!</p>
                <div class="mt-6">
                    <a href="#"
                       class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-800 hover:bg-gray-600">Checkout</a>
                </div>
                <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                    <p>
                        or
                        <button type="button" class="mx-2 text-gray-800 border rounded-md p-2 hover:bg-gray-200 focus:outline-none"
                                @click="open = false">Continue Shopping<span aria-hidden="true"> →</span></button>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

