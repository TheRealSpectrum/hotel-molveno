@extends('layouts.app')
@section('title', 'Molveno resort')
@section('content')
<main>
    <div class="main1">
      <div class="h-96 w-full bg-cover bg-no-repeat bg-center overflow-hidden"><img src="{{ $page->frontpage_image ?? asset("images/placeholder_header.jpg") }}" alt=""></div>
      <div class="grid grid-cols-3 bg-gray-100">
          <div class="m-10">
              <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_1_title !!}</h1>
              {!!  $page->box_1  !!}
          </div>
          <div class="m-10">
              <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_2_title !!}</h1>
              {!! $page->box_2 !!}
          </div>
          <div class="m-10">
              <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_3_title !!}</h1>
              {!! $page->box_3 !!}
              <div class="text-right mt-8">
                  <a href="{{ route("booking.index") }}" class="inline-block text-2xl px-10 py-4 bg-blue-500 leading-none border rounded-lg font-bold text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 mr-8 lg:mt-0">Book now</a>
              </div>
          </div>
      </div>
    </div>
    <div class="main2" id="rooms">
        <div class="flex justify-center">
          <div class="h-2/4 w-2/4">
              <h1 class="text-center m-10 font-medium capitalize text-4xl">Our rooms</h1>
              <h3 class="text-center font-medium">Room option 1</h3>
              <img src="{{ $page->room_image_1 ?? asset("images/placeholder_room.webp") }}" class="w-full">
          </div>
        </div>
        <div class="grid grid-cols-3 mr-16 ml-16 mb-16">
            <img class="p-5" src="{{ $page->room_image_2 ?? asset("images/placeholder_room.webp") }}">
            <img class="p-5" src="{{ $page->room_image_3 ?? asset("images/placeholder_room.webp") }}">
            <img class="p-5" src="{{ $page->room_image_4 ?? asset("images/placeholder_room.webp") }}">
        </div>
    </div>
    <div class="main3" id="facilities">
      <div class="relative">
        <img class=" w-full h-96 bg-cover bg-no-repeat bg-center overflow-hidden" src="{{ $page->facilities_image }}" alt="">
          <div class="absolute text-center w-full mt-10 top-0">
              <h1 class="text-white text-center font-bold text-4xl">Facilities</h1>
          </div>
          <div class="absolute top-0 flex flex-row w-full">
              <div class="p-12 w-full h-80 text-center mt-10">
                  <ul>
                      <?php
                      $facilities = json_decode($page->facilities, true);
                      foreach ($facilities as $facility => $value) {
                          echo "<li class='text-white font-medium text-xl'>" .
                              array_values($value)[0] .
                              "</li>";
                      }
                      ?> 
                  </ul>
              </div>
              <div class="p-12 w-full h-80 text-center mt-10">
                  {{-- <ul>
                      <li class="text-white font-medium text-xl">Wi-Fi</li>
                      <li class="text-white font-medium text-xl">Parking at the resort</li>
                      <li class="text-white font-medium text-xl">Airconditioning</li>
                      <li class="text-white font-medium text-xl">Swimming pool</li>
                      <li class="text-white font-medium text-xl">Sauna(VIP)</li>
                  </ul> --}}
              </div>
          </div>
      </div>
    </div>
    <div class="main4" id="location">
        <div class="p-12 pt-20 h-96 md:w-1/2">
          <h1 class="text-black font-bold text-4xl pb-4">The Environment</h1>
          {!! $page->environment_text_box !!}
        </div>
        <div class="grid grid-cols-3 pb-16">
          <div class="ml-12 mr-6 h-96 border-2 border-gray-300">
              <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_1 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_1"></div>
              <div class="p-8">
                  {!! $page->environment_text_1 !!}
              </div>
          </div>
          <div class="ml-6 mr-6 h-96 border-2 border-gray-300">
              <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_2 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_2"></div>
              <div class="p-8">
                  {!! $page->environment_text_2 !!}
              </div>
          </div>
          <div class="mr-12 ml-6 h-96 border-2 border-gray-300">
              <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_3 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_3"></div>
              <div class="p-8">
                  {!! $page->environment_text_3 !!}
              </div>
          </div>
        </div>
    </div>
    <div class="main5" id="restaurant">
        <div class="bg-gray-100 h-96 w-full grid grid-cols-2 p-12">
            <div class="mr-6">
              <h1 class="text-4xl pb-4">Restaurant</h1>
              <div class="pb-20">{!! $page->restaurant_text_box !!}</div>
              <h1 class="text-4xl"><i class="fas fa-phone-alt pr-1"></i>{{ $page->restaurant_phone }}</h1>
            </div>
            <div class="w-full bg-no-repeat bg-cover ml-6 overflow-hidden relative">
                <img src="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}" alt="restaurant_menu">
                <div class="absolute top-1/2 left-1/2">
                    <a href="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}" target="_blank" class="inline-block text-xl px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Menu</a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="main6" id="gallery">
        <div class="flex justify-center">
          <div class="h-2/4 w-2/4 p-12">
              <img src="{{ $page->gallery_image_1 ?? asset("images/placeholder_header.jpg") }}">
          </div>
        </div>
        <div class="grid grid-cols-3 mr-16 ml-16 mb-16">
            <img class="p-5" src="{{ $page->gallery_image_2 ?? asset("images/placeholder_header.jpg") }}">
            <img class="p-5" src="{{ $page->gallery_image_3 ?? asset("images/placeholder_header.jpg") }}">
            <img class="p-5" src="{{ $page->gallery_image_4 ?? asset("images/placeholder_header.jpg") }}">
        </div>
    </div>
    <div class="main7" id="contact">
        <div class="grid grid-flow-row grid-cols-2 bg-gray-100 h-96 place-items-center">
          <div>
              <h1 class="text-4xl pb-4">Molveno resort</h1>
          </div>
          <div>
              <a href="{{ route("booking.index") }}" class="inline-block text-2xl px-10 py-4 bg-blue-500 leading-none border rounded-lg text-white font-bold border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Book a room</a>
              <a href="#" class="inline-block text-2xl px-10 py-4 leading-none border rounded-lg text-blue border-blue-500 font-bold hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Contact us</a>
          </div>
        </div>
    </div>
</main>
@endsection