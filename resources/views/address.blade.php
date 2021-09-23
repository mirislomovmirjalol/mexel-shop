@extends('layouts.app')

@section('content')
    <div class="container my-10 lg:mb-48">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Iltimos tovarni qabul qilshingiz mumkun bo'lgan addressni kiriting.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('orderConfirmed') }}" method="POST">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 lg:col-span-3">
                                        <label for="city" class="block text-sm font-medium text-gray-700">Shahar</label>
                                        <select id="city" required name="city"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                            <option>Tashkent</option>
                                            <option>Andijan</option>
                                            <option>Samarqand</option>
                                        </select>
                                        @error('city')
                                        <p class="text-red-500 text-xs italic mt-2">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 lg:col-span-3">
                                        <label for="region"
                                               class="block text-sm font-medium text-gray-700">Rayon</label>
                                        <select id="region" required name="region"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                            <option>Yunusabad</option>
                                            <option>Mirzo Ulugbek</option>
                                            <option>Sergeli</option>
                                        </select>
                                        @error('region')
                                        <p class="text-red-500 text-xs italic mt-2">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6">
                                        <label for="street" class="block text-sm font-medium text-gray-700">Manzil(Ko'cha
                                            Nomi)</label>
                                        <input type="text" name="street" id="street" required
                                               class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                        @error('region')
                                        <p class="text-red-500 text-xs italic mt-2">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6">
                                        <label for="home_number" class="block text-sm font-medium text-gray-700">Uy
                                            Raqami</label>
                                        <input type="number" required name="home_number" id="home_number"
                                               class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                        @error('home_number')
                                        <p class="text-red-500 text-xs italic mt-2">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6">
                                        <label for="landmark"
                                               class="block text-sm font-medium text-gray-700">Arintir</label>
                                        <textarea rows="3" name="landmark" id="landmark"
                                                  class="resize-none mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm"></textarea>
                                        @error('landmark')
                                        <p class="text-red-500 text-xs italic mt-2">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

