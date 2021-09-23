@extends('layouts.app')

@section('content')

    <section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right"
             style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1422190441165-ec2956dc9ecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">
        <div class="container mx-auto">
            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
                <h1 class="text-black text-2xl my-4">Stripy Zig Zag Jigsaw Pillow and Duvet Set</h1>
                <a class="text-xl inline-block hover:no-underline border-b border-gray-600 leading-relaxed text-gray-600 hover:text-black hover:border-black"
                   href="#">products</a>
            </div>
        </div>
    </section>

    <section class="bg-white pt-8">
        <div class="container mx-auto flex items-center flex-wrap pt-4">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                       href="#">
                        Best Products
                    </a>
                </div>
            </nav>

            @foreach($bestProducts as $product)
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

        <div class="container mx-auto flex items-center flex-wrap pt-4">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                       href="#">
                        New Products
                    </a>
                </div>
            </nav>

            @foreach($newProducts as $product)
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
