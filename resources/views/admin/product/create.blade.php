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
                    Create New Product
                </h1>
                <span></span>
            </div>
        </div>


    </header>

    <div class="container">
        <div class="mt-5 md:mt-0 md:col-span-2 lg:w-1/2 mx-auto">
            <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input placeholder="Lamp" required type="text" name="name"
                                       id="name"
                                       autocomplete="nameProduct"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('name')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="desc"
                                       class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea rows="3" required name="desc" id="desc"
                                          class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>

                                @error('desc')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Price (Sum)</label>
                                <input placeholder="10000" value="" required type="text"
                                       name="price" id="price"
                                       autocomplete="price"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('price')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="category_id"
                                       class="block text-sm font-medium text-gray-700">Category</label>
                                <select id="category_id" name="category_id" autocomplete="category_id"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                    @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>


                            <div class="col-span-6">
                                <span class="block text-sm font-medium text-gray-700">Cover</span>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                             viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image"
                                                   class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Tap here</span>
                                                <input id="image" name="image" type="file" class="sr-only" value="">
                                            </label>
                                            <p class="pl-1">for upload image</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            JPG up to 10MB Square format
                                        </p>
                                    </div>
                                    @error('image')
                                    <p class="text-red-500 text-xs italic mt-2">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="px-4 py-3 text-center sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
