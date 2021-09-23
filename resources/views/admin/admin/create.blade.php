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
                    Create New Admin
                </h1>
                <span></span>
            </div>
        </div>


    </header>

    <div class="container">
        <div class="mt-5 md:mt-0 md:col-span-2 lg:w-1/2 mx-auto">
            <form action="{{ route('admin.admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input placeholder="John" required type="text" name="name" id="name"
                                       autocomplete="nameCategory"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('name')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone
                                    Number</label>
                                <input id="phone"
                                       required
                                       value="+998 (__) _______"
                                       mask="+998 (__) _______"
                                       name="phone"
                                       type="text"
                                       placeholder="+998909268106"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('phone')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       placeholder="example@index.com"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('email')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input id="password"
                                       type="password"
                                       name="password"
                                       placeholder="************"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('password')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password
                                    Confirm</label>
                                <input id="password_confirmation"
                                       type="password"
                                       name="password_confirmation"
                                       placeholder="************"
                                       class="py-2.5 px-2.5 mt-1 border border-gray-400 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('password_confirmation')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="is_admin" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="is_admin" name="is_admin" autocomplete="is_admin"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                    <option value="1">Admin</option>
                                    <option value="0">Client</option>
                                </select>
                                @error('is_admin')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
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
    <script src="{{ asset('phonemask-main/src/phonemask.min.js') }}"></script>
    <script>
        const cssPhone = 'input[name="phone"';
        (new phoneMask()).init(cssPhone);
    </script>
@endsection
