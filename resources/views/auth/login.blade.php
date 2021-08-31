@extends('layouts.app')

@section('content')
    <div class="w-full flex flex-wrap">
        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-3xl text-center">Welcome Back.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="py-10 p-8 mt-4 bg-white rounded-xl">
                        <div class="mb-6">
                            <label class="mr-4 text-gray-700 font-bold inline-block mb-2" for="phone">Phone
                                Number</label>
                            <input id="phone"
                                   required
                                   value="+998 (__) _______"
                                   mask="+998 (__) _______"
                                   name="phone"
                                   type="text"
                                   class="w-full border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-gray-400 rounded border-red-500"
                                   placeholder="+998909268106"/>

                            @error('phone')
                            <p class="text-red-500 text-xs italic mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <label class="mr-4 text-gray-700 font-bold inline-block mb-2"
                                   for="password">Password</label>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   class="w-full border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-gray-400 rounded"
                                   placeholder="************"/>
                            @error('password')
                            <p class="text-red-500 text-xs italic mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <a href="#"
                           class="text-sm text-gray-700 inline-block mt-4 transition duration-200 font-semibold">Forget
                            Password</a>
                        <button
                            class="w-full mt-6 text-gray-50 font-bold bg-gray-800 py-3 rounded-md hover:bg-gray-600 transition duration-300">
                            LOGIN
                        </button>
                    </div>

                    <div class="text-center pt-12 pb-12">
                        <p>Don't have an account? <a href="{{ route('register') }}" class="underline font-semibold">Register
                                here.</a></p>
                    </div>
                </form>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>
    </div>

    <script src="{{ asset('phonemask-main/src/phonemask.min.js') }}"></script>
    <script>
        const cssPhone = 'input[name="phone"';
        (new phoneMask()).init(cssPhone);
    </script>
@endsection
