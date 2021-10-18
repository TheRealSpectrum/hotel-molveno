@extends('layouts.app')
@section('title', 'Molveno resort')
@section('content')
<main>
    <div class="main1">
        <div>
            <div class="md:h-80">
                <img class="object-cover md:h-80 w-full" src="{{ $page->frontpage_image ?? asset("images/placeholder_header.jpg") }}" alt="Molveno resort banner">
            </div>
            <div class="flex flex-col lg:grid lg:grid-cols-3 bg-gray-100">
                <div class="py-8 px-4 md:px-12">
                    <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_1_title !!}</h1>
                    {!!  $page->box_1  !!}
                </div>
                <div class="py-8 px-4 md:px-12">
                    <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_2_title !!}</h1>
                    {!! $page->box_2 !!}
                </div>
                <div class="py-8 px-4 md:px-12">
                    <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_3_title !!}</h1>
                    {!! $page->box_3 !!}
                    <div class="mt-12 flex justify-end text-center">
                        <a href="{{ route("booking.index") }}" class="inline-block w-48 text-2xl px-6 py-3 bg-blue-500 leading-none border rounded-lg font-bold text-white text-center">Book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main2" id="rooms">
        <div class="py-4">
            <h1 class="text-center mt-4 mb-2 font-medium capitalize text-4xl">Our rooms</h1>
            <div class="flex justify-center">
                <div class="w-full p-4 md:w-3/5">
                    <div class="slider slider-for" id="slider-rooms">
                        <img src="{{ $page->room_image_1 ?? asset("images/placeholder_room.webp") }}">
                        <img src="{{ $page->room_image_2 ?? asset("images/placeholder_room.webp") }}">
                        <img src="{{ $page->room_image_3 ?? asset("images/placeholder_room.webp") }}">
                        <img src="{{ $page->room_image_4 ?? asset("images/placeholder_room.webp") }}">
                    </div>
                    <div class="slider slider-nav" id="slider-rooms-nav">
                        <img class="my-4" src="{{ $page->room_image_1 ?? asset("images/placeholder_room.webp") }}">
                        <img class="m-4" src="{{ $page->room_image_2 ?? asset("images/placeholder_room.webp") }}">
                        <img class="m-4" src="{{ $page->room_image_3 ?? asset("images/placeholder_room.webp") }}">
                        <img class="my-4" src="{{ $page->room_image_4 ?? asset("images/placeholder_room.webp") }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main3" id="facilities">
        <div class="w-full">
            <div class="md:h-96 md:relative overflow-hidden flex justify-center">
                <img class="object-cover md:h-96 w-full" src="{{ $page->facilities_image ?? asset("images/placeholder_facilities.jpg") }}" alt="facilities">
                <div class="absolute w-full flex justify-center p-4 md:p-12">
                    <h1 class="text-white font-bold text-xl">Facilities</h1>
                </div>
                <ul class="absolute flex flex-col flex-wrap w-full text-center h-56 md:h-96 md:w-3/5 py-12 mt-4 px-4 md:py-32 md:mt-6">
                    <?php
                    $facilities = json_decode($page->facilities, true) ?? [];
                    foreach ($facilities as $facility => $value) {
                        echo "<li class='w-1/2 text-white font-small text-small'>" .
                            array_values($value)[0] .
                            "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main4" id="location">
        <div class="m-4">
            <div class="my-6 md:w-2/4">
                <h1 class="text-black font-medium text-4xl pb-4">The Environment</h1>
                {!! $page->environment_text_box !!}
            </div>
            <div class="flex flex-col lg:grid lg:grid-cols-3">
                <div class="my-4 border-2 border-gray-300 md:my-4 md:mr-4">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_1 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_1"></div>
                    <div class="p-4">
                        {!! $page->environment_text_1 !!}
                    </div>
                </div>
                <div class="my-4 border-2 border-gray-300 md:mx-4 md:my-4">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_2 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_2"></div>
                    <div class="p-4">
                        {!! $page->environment_text_2 !!}
                    </div>
                </div>
                <div class="my-4 border-2 border-gray-300 md:my-4 md:ml-4">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_3 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_3"></div>
                    <div class="p-4">
                        {!! $page->environment_text_3 !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main5" id="restaurant">
        <div class="flex flex-col items-center bg-gray-100 w-full md:grid md:grid-cols-2 p-4">
            <div class="my-6 md:m-6">
                <h1 class="text-4xl pb-4 font-medium text-black">Restaurant</h1>
                <div>{!! $page->restaurant_text_box !!}</div>
                <h1 class="text-4xl my-4"><i class="fas fa-phone-alt pr-1"></i>{{ $page->restaurant_phone }}</h1>
            </div>
            <div class="flex justify-center">
                <a href="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}">
                    <img class="md:h-96" src="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}" alt="restaurant_menu">
                </a>
            </div>
        </div>
    </div>
    <div class="main6" id="gallery">
        <div class="flex justify-center pt-8">
            <div class="w-full p-4 md:w-3/5">
                <div class="slider slider-gallery" id="slider-gallery">
                    <img src="{{ $page->gallery_image_1 ?? asset("images/placeholder_header.jpg") }}">
                    <img src="{{ $page->gallery_image_2 ?? asset("images/placeholder_header.jpg") }}">
                    <img src="{{ $page->gallery_image_3 ?? asset("images/placeholder_header.jpg") }}">
                    <img src="{{ $page->gallery_image_4 ?? asset("images/placeholder_header.jpg") }}">
                </div>
                <div class="slider slider-gallery-nav" id="slider-gallery-nav">
                    <img class="my-4" src="{{ $page->gallery_image_1 ?? asset("images/placeholder_header.jpg") }}">
                    <img class="m-3" src="{{ $page->gallery_image_2 ?? asset("images/placeholder_header.jpg") }}">
                    <img class="m-3" src="{{ $page->gallery_image_3 ?? asset("images/placeholder_header.jpg") }}">
                    <img class="my-3" src="{{ $page->gallery_image_4 ?? asset("images/placeholder_header.jpg") }}">
                </div>
            </div>
        </div>
    </div>
    <div class="main7" id="contact">
        <div class="flex flex-col py-8 md:py-0 md:grid md:grid-flow-row md:grid-cols-2 md:place-items-center bg-gray-100 md:h-80 items-center">
          <div>
              <h1 class="text-4xl pb-4">Molveno resort</h1>
          </div>
          <div class="flex flex-col md:flex-row">
              <a href="{{ route("booking.index") }}" class="inline-block text-2xl px-10 py-4 md:mr-4 bg-blue-500 leading-none border rounded-lg text-white font-bold border-blue-500 hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0 lg:mr-0">Book now</a>
              <a href="#" class="inline-block text-2xl px-10 py-4 leading-none border rounded-lg text-blue border-blue-500 font-bold hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Contact us</a>
          </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(document).ready(function(){
      $('#slider-rooms').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '#slider-rooms-nav'
      });
        $('#slider-rooms-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            centerMode: false,
            focusOnSelect: true,
            variableWidth: true,
            infinite: false,
            asNavFor: '#slider-rooms',
        });
      $('.slider-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-gallery-nav'
      });
        $('.slider-gallery-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            centerMode: false,
            focusOnSelect: true,
            variableWidth: true,
            infinite: false,
            asNavFor: '.slider-gallery',
        });
    });
</script>
<style>
    .slider-gallery-nav > .slick-list > .slick-track > .slick-slide, .slider-nav > .slick-list > .slick-track > .slick-slide  {
        width: 170px;
        height: 100px;
        opacity: 50%;
    }
    .slider-gallery-nav > .slick-list > .slick-track > .slick-current, .slider-nav > .slick-list > .slick-track > .slick-current {
        opacity: 100%;
    }
</style>
@endsection