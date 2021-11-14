@extends('layouts.app')

@section('content')
    <section class="bg-white pt-8">
        <div class="container mx-auto flex items-center flex-wrap pt-4">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                       href="#">
                        {{ $category->name }}
                    </a>

                    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                                class="relative z-10 text-gray-500 hover:text-black">
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z"/>
                            </svg>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                             class="inset-0 w-full z-10"></div>

                        <div x-show="dropdownOpen"
                             class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                            <a href="#"
                               class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gray-500 hover:text-white hover:no-underline">
                                Best Products
                            </a>
                            <a href="#"
                               class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gray-500 hover:text-white hover:no-underline">
                                Price Low to High
                            </a>
                            <a href="#"
                               class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gray-500 hover:text-white hover:no-underline">
                                Price Hight to Low
                            </a>

                        </div>
                    </div>
                </div>
            </nav>

            @foreach($products as $product)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <a href="{{ route ('product.show', $product->id) }}">
                        <img class="hover:grow hover:shadow-lg"
                             src="{{ asset('images') }}/{{ $product->image }}">
                    </a>
                    <div class="pt-3 flex items-center justify-between">
                        <p class="">{{ $product->name }}</p>
                        <form action="{{ route('cart.add', $product) }}" method="post">
                            <button type="submit" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-black"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </button>
                            @csrf
                        </form>
                    </div>
                    <p class="pt-1 text-gray-900">{{ $product->price }} Sum</p>
                </div>
            @endforeach

        </div>
    </section>
@endsection
