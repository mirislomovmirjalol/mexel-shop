@extends('layouts.app')

@section('content')
    <div class="container my-10 h-screen">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Use a permanent address where you can receive mail.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 lg:col-span-3">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Shahar</label>
                                        <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                            <option>Tashkent</option>
                                            <option>Andijan</option>
                                            <option>Samarqand</option>
                                        </select>
                                    </div>
                                    <div class="col-span-6 lg:col-span-3">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Rayon</label>
                                        <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                            <option>Yunusabad</option>
                                            <option>Mirzo Ulugbek</option>
                                            <option>Sergeli</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="street_address" class="block text-sm font-medium text-gray-700">Manzil(Ko'cha Nomi)</label>
                                        <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="py-2.5 px-2.5 mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="email_address" class="block text-sm font-medium text-gray-700">Uy Raqami</label>
                                        <input type="number" name="email_address" id="email_address" autocomplete="email" class="py-2.5 px-2.5 mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="first_name" class="block text-sm font-medium text-gray-700">Arintir</label>
                                        <textarea rows="3" name="first_name" id="first_name" class="resize-none py-2.5 px-2.5 mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

