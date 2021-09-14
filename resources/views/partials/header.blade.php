<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Molveno resort</title>

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
        <a href="#rooms" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
            Rooms
        </a>
        <a href="#facilities" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
            Facilities
        </a>
        <a href="#gallery" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
            Gallery
        </a>
        <a href="#restaurant" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
            Restaurant
        </a>
        <a href="#location" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600 mr-4">
            Location
        </a>
        <a href="#contact" class="block mt-4 lg:inline-block lg:mt-0 text-blue-500 hover:text-gray-600">
            Contact
        </a>
        </div>
        <div>
            <a href="#" class="inline-block text-2xl px-10 py-4 bg-blue-500 leading-none border rounded-lg font-bold text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 mr-8 lg:mt-0">Book now</a>
        @if (auth()->user())
            <a href="{{ route("logout") }}" class="inline-block text-sm px-8 py-3 leading-none border rounded-lg text-blue border-blue-500 hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Sign out</a>
        @else
            <a href="{{ route("login") }}" class="inline-block text-sm px-8 py-3 leading-none border rounded-lg text-blue border-blue-500 hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Sign in</a>
            <a href="{{ route("register") }}" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Register</a>
        @endif
        </div>
    </div>
    </nav>
  </header>