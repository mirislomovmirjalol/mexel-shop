@extends('layouts.app')

@section('content')
    <section class="bg-white pt-8 h-screen">
        <div class="container mx-auto flex items-center flex-wrap pt-4">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                       href="#">
                        MORE
                    </a>

                    <div class="flex items-center" id="store-nav-content">

                        <a class="pl-3 inline-block no-underline text-gray-500 hover:text-black" href="#">
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z"/>
                            </svg>
                        </a>

                        <a class="pl-3 inline-block no-underline text-gray-500 hover:text-black" href="#">
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z"/>
                            </svg>
                        </a>

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
