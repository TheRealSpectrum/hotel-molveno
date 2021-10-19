<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Links  -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Scripts -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/146730865b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="min-h-screen">
    <header class="lg:sticky lg:top-0 lg:z-50">
        <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
            <div x-data="{ open: false }" class="flex flex-col max-w-full px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="md:mr-6 flex flex-row items-center justify-between">
                    <a href="{{ url("home") }}">
                        <img src="{{ asset("images/Logo Molveno Resort Black.svg") }}" alt="Molveno Resort Logo" class="fill-current h-20 w-20">
                    </a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:flex-row lg:show">
                    <a href="{{ url('home/#rooms') }}" class="text-blue-500 my-2 lg:mx-2">
                        Rooms
                    </a>
                    <a href="{{ url('home/#facilities') }}" class="text-blue-500 my-2 lg:mx-2">
                        Facilities
                    </a>
                    <a href="{{ url('home/#gallery') }}" class="text-blue-500 my-2 lg:mx-2">
                        Gallery
                    </a>
                    <a href="{{ url('home/#restaurant') }}" class="text-blue-500 my-2 lg:mx-2">
                        Restaurant
                    </a>
                    <a href="{{ url('home/#location') }}" class="text-blue-500 my-2 lg:mx-2">
                        Location
                    </a>
                    <a href="{{ url('home/#contact') }}" class="text-blue-500 my-2 lg:mx-2">
                        Contact
                    </a>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow p-4 z-50 md:p-0 md:pb-0 hidden md:flex md:flex-row md:items-center md:justify-between">
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="lg:hidden flex flex-row items-center justify-center w-full px-4 py-2 mt-2 text-sm font-semibold text-center bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Navigation</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a href="{{ url('home/#rooms') }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                Rooms
                                </a>
                                <a href="{{ url('home/#facilities') }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                Facilities
                                </a>
                                <a href="{{ url('home/#gallery') }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                Gallery
                                </a>
                                <a href="{{ url('home/#restaurant') }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                Restaurant
                                </a>
                                <a href="{{ url('home/#location') }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                Location
                                </a>
                                <a href="{{ url('home/#contact') }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                Contact
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center md:justify-end">
                        <a href="{{ route("booking.index") }}" class="px-6 py-3 my-4 md:mx-4 text-2xl bg-blue-500 leading-none border rounded-lg font-bold text-white text-center border-blue-500">Book now</a>
                        @if (auth()->user())
                        <a href="{{ route("account.index") }}" class="px-6 py-2 my-2 md:mx-2 text-sm bg-blue-500 leading-none border rounded-lg text-white text-center border-blue-500">Account</a>
                        <a href="{{ route("logout") }}" class="px-6 py-2 text-sm leading-none border rounded-lg text-blue text-center border-blue-500">Sign out</a>
                        @else
                        <a href="{{ route("login") }}" class="px-6 py-2 my-2 md:my-0 md:mx-2 text-sm leading-none border rounded-lg text-blue text-center border-blue-500">Sign in</a>
                        <a href="{{ route("register") }}" class="px-6 py-2 md:my-0 text-sm bg-blue-500 leading-none border rounded-lg text-white text-center border-blue-500">Register</a>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </header>
   
    @yield('content')

    <footer>
        <div class="flex flex-col items-center border-b-2 border-t-2 lg:grid lg:grid-cols-2 py-4 px-4 lg:px-12">
            <div class="flex justify-center my-4 h-80 w-full lg:flex-row md:max-w-xl lg:mx-4">
                <div id="map" class="h-full w-full rounded-md"></div>
            </div>
            <div class="flex flex-col lg:flex-row lg:justify-end lg:items-center px-12 lg:h-96">
                <div class="py-8 lg:h-2/3 lg:ml-12">
                    <h3 class="text-sm font-bold pb-4">Marketing/work</h3>
                    <ul>
                        <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">Advertising</a></li>
                        <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">Vacancies</a></li>
                    </ul>
                </div>
                <div class="py-8 lg:h-2/3 lg:ml-12">
                    <h3 class="text-sm font-bold pb-4">Privacy</h3>
                    <ul>
                        <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">Cookies</a></li>
                        <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">Terms and conditions</a></li>
                    </ul>
                </div>
                <div class="py-8 lg:h-2/3 lg:ml-12">
                    <h3 class="text-sm font-bold pb-4">Molveno resort</h3>
                    <ul>
                        <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                            Contact
                        </a></li>
                        <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                            About us
                        </a></li>
                        <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                            Location
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-row flex-grow justify-between px-16 py-4">
            <div class="flex flex-col justify-center">
                <p>© Molveno Resort,  2021</p>
            </div>
            <div class="flex flex-col items-center">
                <p>Follow us:</p>
                <div class="flex flex-row">
                    <a href="http://www.facebook.com" target="_blank"><i class="lab la-facebook text-5xl"></i></a>
                    <a href="http://www.twitter.com" target="_blank"><i class="lab la-twitter text-5xl"></i></a>
                    <a href="http://www.instagram.com" target="_blank"><i class="lab la-instagram text-5xl"></i></a>
                </div>
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i id="scroll-top-icon" class="las la-chevron-circle-up"></i></button>
    </footer>

    <!-- Styles -->
    <style>
        #myBtn {
            background-color: black;
            display: none; 
            position: fixed; 
            bottom: 15px; 
            right: 15px; 
            z-index: 99; 
            border: none; 
            outline: none; 
            color: white; 
            cursor: pointer; 
            width: 50px;
            height: 50px; 
            border-radius: 10px; 
            font-size: 18px; 
            opacity: 0.5;
        }

        #myBtn:hover {
        background-color: #555; 
        }

        #scroll-top-icon {
            font-size: 50px;
        }
    </style>
    <style>
    #sortbox:checked ~ #sortboxmenu {
        opacity: 1;
    }
    </style>
    <!-- Scripts -->
    <script>

        mybutton = document.getElementById("myBtn");

        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
            }
        }


        function topFunction() {
            document.body.scrollTop = 0; 
            document.documentElement.scrollTop = 0; 
        }
    </script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Molveno Resort
            const molvenoResort = { lat: 46.133471, lng: 10.9687150 };
            // The map, centered at Molveno Resort
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: molvenoResort,
            });
            // The marker, positioned at Molveno Resort
            const marker = new google.maps.Marker({
                position: molvenoResort,
                map: map,
            });
            if (typeof addressAutoComplete == 'function') {
            addressAutoComplete()
            };
        }
    </script>
</body>
<script async src="https://maps.googleapis.com/maps/api/js?key={{ env("GOOGLE_MAP_KEY") }}&libraries=places&callback=initMap"></script>
</html>

