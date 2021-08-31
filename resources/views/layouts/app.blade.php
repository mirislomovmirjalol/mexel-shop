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
    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked + #menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>
</head>
<body>

<!--Nav-->
<nav id="header" class="w-full z-30 top-0 py-1">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block m-0 p-0">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                 viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle"/>

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-0 md:pt-0">
                    <li><a class="inline-block text-gray-600 hover:text-black hover:no-underline py-2 px-4"
                           href="{{ route('category.index') }}">Category</a></li>
                    <li><a class="inline-block text-gray-600 hover:text-black hover:no-underline py-2 px-4" href="#">About</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-2">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
               href="{{ route('home') }}">
                <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24">
                    <path
                        d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z"/>
                </svg>
                MEXEL
            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">

            @if (Route::has('login'))
                @auth
                    <a class="inline-block no-underline text-gray-500 hover:text-black"
                       href="{{ route('profile.show') }}">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24">
                            <circle fill="none" cx="12" cy="7" r="3"/>
                            <path
                                d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z"/>
                        </svg>
                    </a>

                    <a class="pl-3 inline-block no-underline text-gray-500 hover:text-black"
                       href="{{ route('cart.show') }}">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24">
                            <path
                                d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z"/>
                            <circle cx="10.5" cy="18.5" r="1.5"/>
                            <circle cx="17.5" cy="18.5" r="1.5"/>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-black hover:no-underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-black hover:no-underline">Register</a>
                    @endif
                @endauth
            @endif


        </div>
    </div>
</nav>

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

<footer class="footer bg-white pt-1 border-b-2 border-grey-700">
    <div class="container mx-auto px-6">
        <div class="flex flex-col items-center">
            <div class="sm:w-2/3 text-center py-6">
                <p class="text-sm text-grey-700 font-bold mb-2">
                    © 2020 by Mirislomov Mirjalol
                </p>
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
