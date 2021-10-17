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
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0mMHuW9NsJxC81NBqIhSf1aWL7YZmb3c&callback=initMap"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body class="min-h-screen">
    <header class="lg:sticky lg:top-0 lg:z-50">
        <nav class="p-4 flex flex-col justify-between bg-gray-100 lg:flex-row lg:px-4 lg:p-0">
            <div class="flex flex-shrink-0 items-center lg:mr-12">
                <a href="{{ url("home") }}">
                    <img src="{{ asset("images/Logo Molveno Resort Black.svg") }}" alt="Molveno Resort Logo" class="fill-current h-20 w-20">
                </a>
            </div>
            <div class="lg:flex lg:flex-row lg:items-center lg:justify-between lg:w-full lg:py-0">
                <div class="py-4 lg:hidden">
                    <div class="relative">
                        <input type="checkbox" id="sortbox" class="hidden absolute">
                        <label for="sortbox" class="flex items-center space-x-1 cursor-pointer">
                            <span class="py-3 px-8 w-3/5 text-xl flex flex-row justify-center bg-blue-500 leading-none border rounded-lg font-bold text-white text-center">
                                Menu
                                <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </label>

                        <div id="sortboxmenu" class="absolute mt-1 left-1 top-full min-w-max shadow rounded opacity-0 bg-gray-300 border border-gray-400 transition delay-75 ease-in-out z-10">
                            <ul class="block text-left text-white bg-blue-500">
                                <li><a href="{{ url('home/#rooms') }}" class="block px-3 py-2 hover:bg-gray-200">Rooms</a></li>
                                <li><a href="{{ url('home/#facilities') }}" class="block px-3 py-2 hover:bg-gray-200">Facilities</a></li>
                                <li><a href="{{ url('home/#gallery') }}" class="block px-3 py-2 hover:bg-gray-200">Gallery</a></li>
                                <li><a href="{{ url('home/#restaurant') }}" class="block px-3 py-2 hover:bg-gray-200">Restaurant</a></li>
                                <li><a href="{{ url('home/#location') }}" class="block px-3 py-2 hover:bg-gray-200">Location</a></li>
                                <li><a href="{{ url('home/#contact') }}" class="block px-3 py-2 hover:bg-gray-200">Contact</a></li>
                            </ul>
                        </div>
                    </div>
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
                <div class="flex flex-col w-3/5 my-4 lg:flex-row lg:justify-end lg:items-center lg:my-0">
                    <a href="{{ route("booking.index") }}" class="py-3 px-8 my-4 lg:my-0 text-2xl bg-blue-500 leading-none border-2 rounded-lg font-bold text-white text-center lg:mr-12 lg:w-42">Book now</a>
                    @if (auth()->user())
                    <a href="{{ route("account.index") }}" class="py-2 px-6 my-4 lg:my-0 text-sm bg-blue-500 leading-none border-2 rounded-lg text-white text-center border-blue lg:mr-4 lg:w-24">Account</a>
                    <a href="{{ route("logout") }}" class="py-2 px-6 my-4 lg:my-0 text-sm leading-none border-2 rounded-lg text-blue text-center border-blue-500 lg:mr-2 lg:w-24">Sign out</a>
                    @else
                    <a href="{{ route("login") }}" class="py-2 px-6 my-4 lg:my-0 text-sm leading-none border-2 rounded-lg text-blue text-center border-blue-500 lg:mr-2 lg:w-24">Sign in</a>
                    <a href="{{ route("register") }}" class="py-2 px-6 my-4 lg:my-0 text-sm bg-blue-500 leading-none border-2 rounded-lg text-white text-center border-blue lg:mr-4 lg:w-24">Register</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
   
    @yield('content')

    <footer>
        <div class="flex flex-col items-center border-b-2 border-t-2 lg:grid lg:grid-cols-2 p-4">
            <div class="flex justify-center my-4 h-96 w-full lg:flex-row lg:max-w-xl lg:mx-4">
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
            bottom: 20px; 
            right: 20px; 
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
        }
    </script>
</body>
</html>