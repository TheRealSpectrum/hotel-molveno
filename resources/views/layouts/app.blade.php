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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body class="flex flex-col h-screen">
    <header class="sticky top-0 z-50">
        <nav class="flex items-center justify-between flex-wrap bg-gray-100 pr-6 pl-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <a href="{{ url("home") }}">
                    <img src="{{ asset("images/Logo Molveno Resort Black.svg") }}" alt="Molveno Resort Logo" class="fill-current h-20 w-20 mr-12 ml-4">
                </a>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                    <a href="{{ url('home/#rooms') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Rooms
                    </a>
                    <a href="{{ url('home/#facilities') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Facilities
                    </a>
                    <a href="{{ url('home/#gallery') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Gallery
                    </a>
                    <a href="{{ url('home/#restaurant') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Restaurant
                    </a>
                    <a href="{{ url('home/#location') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Location
                    </a>
                    <a href="{{ url('home/#contact') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600">
                        Contact
                    </a>
                </div>
                <div>
                    <a href="{{ route("booking.index") }}" class="inline-block text-2xl px-10 py-4 bg-blue-500 leading-none border rounded-lg font-bold text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 mr-8 lg:mt-0">Book now</a>
                    @if (auth()->user())
                    <a href="{{ route("account.index") }}" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Account</a>
                    <a href="{{ route("logout") }}" class="inline-block text-sm px-8 py-3 leading-none border rounded-lg text-blue border-blue-500 hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Sign out</a>
                    @else
                    <a href="{{ route("login") }}" class="inline-block text-sm px-8 py-3 leading-none border rounded-lg text-blue border-blue-500 hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Sign in</a>
                    <a href="{{ route("register") }}" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Register</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
   
    @yield('content')

    <footer>
      <div class="border-b-2 grid grid-cols-2 p-0">
          <div></div>
          <div class="flex flex-row">
            <div class="pr-12 p-12">
                <h3 class="text-sm font-bold pb-4">Marketing/work</h3>
                <ul>
                    <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Advertising
                    </a></li>
                    <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Vacancies
                    </a></li>
                </ul>
            </div>
            <div class="pr-12 p-12">
                <h3 class="text-sm font-bold pb-4">Privacy</h3>
                <ul>
                    <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Cookies
                    </a></li>
                    <li><a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Terms and conditions
                    </a></li>
                </ul>
            </div>
            <div class="p-12">
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
      <div class="flex flex-row justify-between px-12 py-4">
          <div class="flex flex-col justify-center">
            <p>© Molveno Resort,  2021</p>
          </div>
          <div class="flex flex-col items-center">
              <p class="pr-4">Follow us:</p>
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
</body>
</html>

