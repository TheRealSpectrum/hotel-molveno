<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/146730865b.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="sticky top-0 z-50">
        <nav class="flex items-center justify-between flex-wrap bg-gray-100 pr-6 pl-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <a href="/">
                    <img src="images/Logo Molveno Resort Black.svg" alt="Molveno Resort Logo" class="fill-current h-20 w-20 mr-12 ml-4">
                </a>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                    <a href="{{ url('/#rooms') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Rooms
                    </a>
                    <a href="{{ url('/#facilities') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Facilities
                    </a>
                    <a href="{{ url('/#gallery') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Gallery
                    </a>
                    <a href="{{ url('/#restaurant') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Restaurant
                    </a>
                    <a href="{{ url('/#location') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
                        Location
                    </a>
                    <a href="{{ url('/#contact') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600">
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
      <div class="border-b-2 grid grid-cols-2 p-12">
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
      <div class="flex flex-row justify-between p-12 pb-24">
          <div>
            <p>© Molveno Resort,  2021</p>
          </div>
          <div class="flex flex-row">
              <p class="pr-4">Follow us:</p>
              <div style="background-image: url('images/facebook.png')" class="w-10 h-10 pr-4 bg-no-repeat bg-cover"></div>
              <div style="background-image: url('images/twitter.png')" class="w-10 h-10 pr-4 bg-no-repeat bg-cover"></div>
          </div>
      </div>
    </footer>
    
</body>
</html>

