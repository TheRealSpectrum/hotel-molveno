<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="https://kit.fontawesome.com/146730865b.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0mMHuW9NsJxC81NBqIhSf1aWL7YZmb3c&callback=initMap"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body class="flex flex-col min-h-screen">
    <header class="md:sticky top-0 z-50">
        <nav class="flex flex-col flex-grow justify-between bg-gray-100 p-4 lg:flex-row lg:p-0 lg:px-4">
            <div class="flex items-center flex-shrink-0 lg:mr-12">
                <a href="{{ url("home") }}">
                    <img src="{{ asset("images/Logo Molveno Resort Black.svg") }}" alt="Molveno Resort Logo" class="fill-current h-20 w-20">
                </a>
            </div>
            <div class="py-4 lg:flex lg:flex-row lg:items-center lg:justify-between lg:w-full lg:py-0">
                <div class="flex flex-col py-4 lg:flex-row lg:py-0">
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
                <div class="flex flex-col py-4 text-center lg:flex-row lg:flex-grow lg:justify-end lg:items-center lg:py-0">
                    <a href="{{ route("booking.index") }}" class="inline-block w-48 text-2xl px-8 py-4 bg-blue-500 leading-none border rounded-lg font-bold text-white my-4 lg:mr-12">Book now</a>
                    @if (auth()->user())
                    <a href="{{ route("account.index") }}" class="inline-block w-32 text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue my-4 lg:h-10 lg:mr-2">Account</a>
                    <a href="{{ route("logout") }}" class="inline-block w-32 text-sm px-8 py-3 leading-none border rounded-lg text-blue border-blue-500 my-4 lg:h-10">Sign out</a>
                    @else
                    <a href="{{ route("login") }}" class="inline-block w-32 text-sm px-8 py-3 leading-none border rounded-lg text-blue border-blue-500 my-4 lg:h-10 lg:mr-2">Sign in</a>
                    <a href="{{ route("register") }}" class="inline-block w-32 text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue my-4 lg:h-10">Register</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
   
    @yield('content')

    <footer>
        <div class="flex flex-col items-center border-b-2 border-t-2 lg:grid lg:grid-cols-2 p-4 px-12 mt-20">
            <div class="flex justify-center w-full">
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

    <style>
        #myBtn {
            background-color: black;
            display: none; 
            position: fixed; 
            bottom: 20px; 
            right: 10px; 
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