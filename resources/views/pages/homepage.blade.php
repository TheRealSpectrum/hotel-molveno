@extends('layouts.app')
@section('title', 'Molveno resort')
@section('content')
<main>
    <div class="main1">
        <div>
            <div class="md:h-80 w-full">
                <img class="md:h-80 w-full" src="{{ $page->frontpage_image ?? asset("images/placeholder_header.jpg") }}" alt="Molveno resort banner">
            </div>
            <div class="flex flex-col lg:grid lg:grid-cols-3 bg-gray-100">
                <div class="py-8 px-4 md:px-12">
                    <h1 class="mb-4 font-medium capitalize text-4xl">{!! $page->box_1_title !!}</h1>
                    {!!  $page->box_1  !!}
                </div>
                <div class="py-8 px-4 md:px-12">
                    <h1 class="mb-4 font-medium capitalize text-4xl">{!! $page->box_2_title !!}</h1>
                    {!! $page->box_2 !!}
                </div>
                <div class="py-8 px-4 md:px-12">
                    <h1 class="mb-4 font-medium capitalize text-4xl">{!! $page->box_3_title !!}</h1>
                    {!! $page->box_3 !!}
                    <div class="mt-12 flex justify-end text-center">
                        <a href="{{ route("booking.index") }}" class="px-6 py-3 my-4 md:mx-4 text-2xl bg-blue-500 leading-none border rounded-lg font-bold text-white text-center border-blue-500">Book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main2" id="rooms">
        <div class="py-4">
            <h1 class="text-center mt-4 mb-2 font-medium capitalize text-4xl">{{ $page->rooms_title ?? "Our rooms" }}</h1>
            <div class="flex justify-center">
                <div class="w-full p-4 md:w-3/5">
                    <div class="slider slider-for" id="slider-rooms">
                        <img src="{{ $page->room_image_1 ?? asset("images/placeholder_room.jpg") }}">
                        <img src="{{ $page->room_image_2 ?? asset("images/placeholder_room.jpg") }}">
                        <img src="{{ $page->room_image_3 ?? asset("images/placeholder_room.jpg") }}">
                        <img src="{{ $page->room_image_4 ?? asset("images/placeholder_room.jpg") }}">
                    </div>
                    <div class="slider slider-nav" id="slider-rooms-nav">
                        <img class="my-4" src="{{ $page->room_image_1 ?? asset("images/placeholder_room.jpg") }}">
                        <img class="m-4" src="{{ $page->room_image_2 ?? asset("images/placeholder_room.jpg") }}">
                        <img class="m-4" src="{{ $page->room_image_3 ?? asset("images/placeholder_room.jpg") }}">
                        <img class="my-4" src="{{ $page->room_image_4 ?? asset("images/placeholder_room.jpg") }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main3" id="facilities">
        <div class="w-full">
            <div class="md:h-96 md:relative overflow-hidden flex justify-center">
                <img class="object-fill md:h-96 w-full" src="{{ $page->facilities_image ?? asset("images/placeholder_facilities.jpg") }}" alt="facilities">
                <div class="absolute w-full flex justify-center p-4 md:p-12">
                    <h1 class="text-white font-bold text-xl lg:text-4xl">{{ $page->facilities_title ?? "Facilities" }}</h1>
                </div>
                <ul class="absolute flex flex-col flex-wrap w-full text-center h-56 md:h-96 md:w-3/5 py-12 mt-4 px-4 md:py-32 md:mt-6">
                    <?php
                    $facilities = json_decode($page->facilities, true) ?? [];
                    foreach ($facilities as $facility => $value) {
                        echo "<li class='w-1/2 text-white font-small text-small font-bold'>" .
                            array_values($value)[0] .
                            "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main4" id="location">
        <div class="m-4 md:m-12">
            <div class="my-6 md:w-2/4">
                <h1 class="text-black font-medium text-4xl pb-4">{{ $page->environmentbox_head ?? "The environment" }}</h1>
                {!! $page->environment_text_box !!}
            </div>
            <div class="flex flex-col lg:grid lg:grid-cols-3">
                <div class="border-2 border-gray-300 my-4 lg:mr-4">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_1 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_1"></div>
                    <div class="p-4">
                        <h1 class="mb-4 font-medium capitalize text-2xl">{!! $page->environmentbox_title_1 !!}</h1>
                        {!! $page->environmentbox_content_1 !!}
                    </div>
                </div>
                <div class="border-2 border-gray-300 my-4 lg:mx-4">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_2 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_2"></div>
                    <div class="p-4">
                        <h1 class="mb-4 font-medium capitalize text-2xl">{!! $page->environmentbox_title_2 !!}</h1>
                        {!! $page->environmentbox_content_2 !!}
                    </div>
                </div>
                <div class="border-2 border-gray-300 my-4 lg:ml-4">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_3 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_3"></div>
                    <div class="p-4">
                        <h1 class="mb-4 font-medium capitalize text-2xl">{!! $page->environmentbox_title_3 !!}</h1>
                        {!! $page->environmentbox_content_3 !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main5" id="restaurant">
        <div class="flex flex-col items-center bg-gray-100 w-full md:grid md:grid-cols-2 p-4">
            <div class="my-6 md:m-6">
                <h1 class="text-4xl pb-4 font-medium text-black">{{ $page->restaurant_title ?? "Our restaurant" }}</h1>
                <div>{!! $page->restaurant_text_box !!}</div>
                <h1 class="text-4xl my-4"><i class="fas fa-phone-alt pr-1"></i>{!! $page->restaurant_phonenumber !!}</h1>
            </div>
            <div class="grid place-items-center relative">
                <a href="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}">
                    <img class="h-96" src="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}" alt="restaurant menu">
                </a>
                <a href="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}" class="absolute object-center text-2xl px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue-500">
                    Menu
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
              <h1 class="text-4xl pb-4">{{ $page->hotel_name ?? "Molveno resort" }}</h1>
          </div>
          <div class="flex flex-col md:flex-row">
              <a href="{{ route("booking.index") }}" class="px-6 py-3 my-4 md:mx-4 text-2xl bg-blue-500 leading-none border rounded-lg font-bold text-white text-center border-blue-500">Book now</a>
              <a href="#" class="px-6 py-3 my-4 md:mx-4 text-2xl bg-none leading-none border rounded-lg font-bold text-black text-center border-blue-500">Contact us</a>
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