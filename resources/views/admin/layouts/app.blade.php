<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<!--Nav-->
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: false }"
         class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            <a href="#"
               class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Mexel
                Admin</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}"
             class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <a class="px-4 py-2 mt-2 text-sm font-semibold hover:text-gray-500 hover:no-underline"
               href="{{ route('admin.index') }}">Home</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold hover:text-gray-500 hover:no-underline"
               href="{{ route('admin.category') }}">Categories</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold hover:text-gray-500 hover:no-underline"
               href="{{ route('admin.product') }}">Products</a>
            <div @click.away="open = false" class="relative z-20" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold hover:text-gray-500 hover:no-underline">
                    <span>Users</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{ route('admin.users') }}">All</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{ route('admin.admin') }}">Admins</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{ route('admin.client') }}">Clients</a>
                    </div>
                </div>
            </div>
            <div @click.away="open = false" class="relative z-10" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold hover:text-gray-500 hover:no-underline">
                    <span>Orders</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{ route('admin.order') }}">All</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{ route('admin.activeOrder') }}">Active</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{ route('admin.historyOrder') }}">History</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

@if(session()->has('success'))
    <div class="container transition-all" id="alert">
        <div class="lg:w-1/2 md:w-full shadow-xl top-4 left-1 right-1 mx-auto fixed z-50">
            <div class="relative py-3 pl-4 pr-10 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                <p>{{ session()->get('success') }}</p>
                <button class="absolute inset-y-0 right-0 flex items-center mr-4" onclick="hideAlert()">
                    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>
@endif
@if(session()->has('danger'))
    <div class="container transition-all" id="alert">
        <div class="lg:w-1/2 md:w-full shadow-xl top-4 left-1 right-1 mx-auto fixed z-50">
            <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                <p>{{ session()->get('warning') }}</p>
                <button class="absolute inset-y-0 right-0 flex items-center mr-4" onclick="hideAlert()">
                    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="container transition-all" id="alert">
        <div class="lg:w-1/2 md:w-full shadow-xl top-4 left-1 right-1 mx-auto fixed z-50">
            <div class="relative py-3 pl-4 pr-10 leading-normal text-yellow-700 bg-yellow-100 rounded-lg" role="alert">
                <p>{{ session()->get('warning') }}</p>
                <button class="absolute inset-y-0 right-0 flex items-center mr-4" onclick="hideAlert()">
                    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>
@endif

@yield('content')

<!--footer-->
<footer class="footer-1 bg-gray-100 py-8 sm:py-12 mt-16">
    <div class="container mx-auto px-4">
        <div class="sm:flex sm:flex-wrap sm:-mx-4 md:py-4">
            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6">
                <h5 class="text-xl font-bold mb-6">Features</h5>
                <ul class="list-none footer-links">
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Cool
                            stuff</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Random
                            feature</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Team
                            feature</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Stuff
                            for developers</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Another
                            one</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Last
                            time</a>
                    </li>
                </ul>
            </div>
            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 sm:mt-0">
                <h5 class="text-xl font-bold mb-6">Resources</h5>
                <ul class="list-none footer-links">
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Resource</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Resource
                            name</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Another
                            resource</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Final
                            resource</a>
                    </li>
                </ul>
            </div>
            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                <h5 class="text-xl font-bold mb-6">About</h5>
                <ul class="list-none footer-links">
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Team</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Locations</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Privacy</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Terms</a>
                    </li>
                </ul>
            </div>
            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                <h5 class="text-xl font-bold mb-6">Help</h5>
                <ul class="list-none footer-links">
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Support</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Help
                            Center</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                           class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Contact
                            Us</a>
                    </li>
                </ul>
            </div>
            <div class="px-4 mt-4 sm:w-1/3 xl:w-1/6 sm:mx-auto xl:mt-0 xl:ml-auto">
                <h5 class="text-xl font-bold mb-6 sm:text-center xl:text-left">Stay connected</h5>
                <div class="flex sm:justify-center xl:justify-start">
                    <a href=""
                       class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 text-gray-600 hover:text-white hover:bg-blue-600 hover:border-blue-600">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href=""
                       class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 ml-2 text-gray-600 hover:text-white hover:bg-blue-400 hover:border-blue-400">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href=""
                       class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 ml-2 text-gray-600 hover:text-white hover:bg-red-600 hover:border-red-600">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="sm:flex sm:flex-wrap sm:-mx-4 mt-6 pt-6 sm:mt-12 sm:pt-12 border-t">
            <div class="sm:w-full px-4 md:w-1/6">
                <strong>FWR</strong>
            </div>
            <div class="px-4 sm:w-1/2 md:w-1/4 mt-4 md:mt-0">
                <h6 class="font-bold mb-2">Address</h6>
                <address class="not-italic mb-4 text-sm">
                    123 6th St.<br>
                    Melbourne, FL 32904
                </address>
            </div>
            <div class="px-4 sm:w-1/2 md:w-1/4 mt-4 md:mt-0">
                <h6 class="font-bold mb-2">Free Resources</h6>
                <p class="mb-4 text-sm">Use our HTML blocks for <strong>FREE</strong>.<br>
                    <em>All are MIT License</em></p>
            </div>
            <div class="px-4 md:w-1/4 md:ml-auto mt-6 sm:mt-4 md:mt-0">
                <button class="px-4 py-2 bg-purple-800 hover:bg-purple-900 rounded text-white">Get Started</button>
            </div>
        </div>
    </div>
</footer>

<script>
    var alert = document.getElementById("alert");

    function hideAlert() {
        if (alert.style.display === "none") {
            alert.style.display = "block";
        } else {
            alert.style.display = "none";
        }
    }

    setTimeout(function () {
        alert.style.display = "none";
    }, 5000);
</script>
</body>
</html>
