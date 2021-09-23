@extends('layouts.app')

@section('content')
    <div class="container my-10 h-screen">
        <div class="lg:w-1/2 md:w-full mx-auto flex flex-col bg-white shadow-sm mt-4 rounded">

            <div class="py-4 px-4 sm:px-6">
                <a href="">
                    <div class="flex justify-between text-base font-medium text-gray-800">
                        <h2 class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl"
                            id="slide-over-title">
                            {{ auth()->user()->name }}
                        </h2>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </a>
            </div>


        </div>
        <div class="lg:w-1/2 md:w-full mx-auto flex flex-col bg-white shadow-sm mt-12 rounded">

            <a href="{{ route('activeOrders.show') }}" class="py-2 px-4 sm:px-6">
                <p class="flex justify-start no-underline hover:no-underline text-gray-600"
                   id="slide-over-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                    Active Orders
                </p>
            </a>

            <a href="{{ route('historyOrders.show') }}" class="py-2 px-4 sm:px-6 ">
                <p class="flex justify-start no-underline hover:no-underline text-gray-600"
                   id="slide-over-title">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
                        <path fill-rule="evenodd"
                              d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                              clip-rule="evenodd"/>
                    </svg>
                    History Orders
                </p>
            </a>
        </div>
        <div class="flex justify-center mt-4 rounded">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"
               class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-sm">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endsection

