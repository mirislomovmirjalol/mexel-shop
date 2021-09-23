@extends('admin.layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <a href="{{ URL::previous() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
                <h1 class="text-lg font-bold text-gray-900">
                    #{{ $order->id }} Order
                </h1>
                <span></span>
            </div>
        </div>


    </header>

    <div class="container">
        <div class="mt-5 md:mt-0 md:col-span-2 lg:w-1/2 mx-auto">
            <form action="{{ route('admin.order.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="street" class="block text-sm font-medium text-gray-700">Address</label>
                                <input placeholder="Address" value="{{ $order->address()->street }}" required
                                       type="text"
                                       name="street"
                                       id="street"
                                       autocomplete="street"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('street')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                                <input placeholder="Region" value="{{ $order->address()->region }}" required type="text"
                                       name="region"
                                       id="region"
                                       autocomplete="street"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('region')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input placeholder="City" value="{{ $order->address()->city }}" required type="text"
                                       name="city"
                                       id="city"
                                       autocomplete="street"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('city')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="home_number" class="block text-sm font-medium text-gray-700">Home
                                    Number</label>
                                <input placeholder="Home Number" value="{{ $order->address()->home_number }}" required
                                       type="text" name="home_number"
                                       id="home_number"
                                       autocomplete="street"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('home_number')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="landmark"
                                       class="block text-sm font-medium text-gray-700">Landmark</label>
                                <textarea rows="3" name="landmark" id="landmark"

                                          class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $order->address()->landmark }}</textarea>

                                @error('landmark')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <input type="number" name="id" value="{{ $order->id }}" class="hidden">

                        </div>
                        <div class="px-4 py-3 text-center sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
