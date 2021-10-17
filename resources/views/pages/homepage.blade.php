@extends('layouts.app')
@section('title', 'Molveno resort')
@section('content')
<main>
    <div class="main1">
        <div class="w-full overflow-hidden lg:relative lg:h-96"><img class="lg:absolute lg:-top-full" src="{{ $page->frontpage_image ?? asset("images/placeholder_header.jpg") }}" alt="Molveno resort banner"></div>
        <div class="flex flex-col lg:grid lg:grid-cols-3 lg:place-items-center lg:justify-center lg:gap-0 bg-gray-100">
            <div class="m-4 lg:w-3/5">
                <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_1_title !!}</h1>
                {!!  $page->box_1  !!}
            </div>
            <div class="m-4 lg:w-3/5">
                <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_2_title !!}</h1>
                {!! $page->box_2 !!}
            </div>
            <div class="m-4 lg:w-3/5">
                <h1 class="mb-10 font-medium capitalize text-4xl">{!! $page->box_3_title !!}</h1>
                {!! $page->box_3 !!}
                <div class="text-right mt-8">
                    <a href="{{ route("booking.index") }}" class="inline-block w-48 text-2xl px-8 py-4 bg-blue-500 leading-none border rounded-lg font-bold text-white my-4 lg:mr-12">Book now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main2" id="rooms">
        <div class="py-4">
            <h1 class="text-center mt-4 mb-2 font-medium capitalize text-4xl">Our rooms</h1>
            <div class="flex justify-center">
                <div class="w-full px-6">
                    <div class="slider slider-for" id="slider-rooms">
                        <img style="height: 360px" src="{{ $page->room_image_1 ?? asset("images/placeholder_room.webp") }}">
                        <img style="height: 360px" src="{{ $page->room_image_2 ?? asset("images/placeholder_room.webp") }}">
                        <img style="height: 360px" src="{{ $page->room_image_3 ?? asset("images/placeholder_room.webp") }}">
                        <img style="height: 360px" src="{{ $page->room_image_4 ?? asset("images/placeholder_room.webp") }}">
                    </div>
                    <div class="slider slider-nav" id="slider-rooms-nav">
                        <img style="height: 120px" class="my-4" src="{{ $page->room_image_1 ?? asset("images/placeholder_room.webp") }}">
                        <img style="height: 120px" class="m-4" src="{{ $page->room_image_2 ?? asset("images/placeholder_room.webp") }}">
                        <img style="height: 120px" class="m-4" src="{{ $page->room_image_3 ?? asset("images/placeholder_room.webp") }}">
                        <img style="height: 120px" class="my-4" src="{{ $page->room_image_4 ?? asset("images/placeholder_room.webp") }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main3" id="facilities">
        <div class="relative">
            <img class="w-full bg-cover bg-no-repeat bg-center overflow-hidden" src="{{ $page->facilities_image ?? asset("images/placeholder_facilities.jpg") }}" alt="facilities_image">
            <div class="absolute text-center w-full mt-4 top-0">
                <h1 class="text-white text-center font-bold text-xl">Facilities</h1>
            </div>
            <div class="absolute top-0 flex flex-row w-full">
                <div class="w-full py-14 h-80 text-center mt-4">
                    <ul>
                        <?php
                        $facilities =
                            json_decode($page->facilities, true) ?? [];
                        foreach ($facilities as $facility => $value) {
                            echo "<li class='text-white font-medium text-medium'>" .
                                array_values($value)[0] .
                                "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main4" id="location">
        <div class="m-4">
            <div class="my-6">
                <h1 class="text-black font-medium text-4xl pb-4">The Environment</h1>
                {!! $page->environment_text_box !!}
            </div>
            <div class="flex flex-col lg:grid lg:grid-cols-3">
                <div class="my-4 border-2 border-gray-300">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_1 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_1"></div>
                    <div class="p-8">
                        {!! $page->environment_text_1 !!}
                    </div>
                </div>
                <div class="my-4 border-2 border-gray-300">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_2 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_2"></div>
                    <div class="p-8">
                        {!! $page->environment_text_2 !!}
                    </div>
                </div>
                <div class="my-4 border-2 border-gray-300">
                    <div class="w-full h-40 bg-no-repeat bg-cover overflow-hidden"><img src="{{ $page->environment_image_3 ?? asset("images/placeholder_header.jpg") }}" alt="environment_image_3"></div>
                    <div class="p-8">
                        {!! $page->environment_text_3 !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main5" id="restaurant">
        <div class="flex flex-col items-center bg-gray-100 w-full lg:grid lg:grid-cols-2 p-4">
            <div class="my-6">
                <h1 class="text-4xl pb-4 font-medium text-black">Restaurant</h1>
                <div>{!! $page->restaurant_text_box !!}</div>
            </div>
            <h1 class="text-4xl my-4"><i class="fas fa-phone-alt pr-1"></i>{{ $page->restaurant_phone }}</h1>
            <div class="w-full my-4">
                <img class="inline-block text-xl px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue" src="{{ $page->restaurant_image ?? asset("images/placeholder_menu.jpg") }}" alt="restaurant_menu">
            </div>
        </div>
    </div>
    <div class="main6" id="gallery">
        <div class="flex justify-center pt-8">
            <div class="w-full">
                <div class="slider slider-gallery" id="slider-gallery">
                    <img style="height: 360px" src="{{ $page->gallery_image_1 ?? asset("images/placeholder_header.jpg") }}">
                    <img style="height: 360px" src="{{ $page->gallery_image_2 ?? asset("images/placeholder_header.jpg") }}">
                    <img style="height: 360px" src="{{ $page->gallery_image_3 ?? asset("images/placeholder_header.jpg") }}">
                    <img style="height: 360px" src="{{ $page->gallery_image_4 ?? asset("images/placeholder_header.jpg") }}">
                </div>
                <div class="slider slider-gallery-nav" id="slider-gallery-nav">
                    <img style="height: 120px" class="p-3" src="{{ $page->gallery_image_1 ?? asset("images/placeholder_header.jpg") }}">
                    <img style="height: 120px" class="p-3" src="{{ $page->gallery_image_2 ?? asset("images/placeholder_header.jpg") }}">
                    <img style="height: 120px" class="p-3" src="{{ $page->gallery_image_3 ?? asset("images/placeholder_header.jpg") }}">
                    <img style="height: 120px" class="p-3" src="{{ $page->gallery_image_4 ?? asset("images/placeholder_header.jpg") }}">
                </div>
            </div>
        </div>
    </div>
    <div class="main7" id="contact">
        <div class="grid grid-flow-row grid-cols-2 bg-gray-100 h-96 place-items-center">
          <div>
              <h1 class="text-4xl pb-4">Molveno resort</h1>
          </div>
          <div>
              <a href="{{ route("booking.index") }}" class="inline-block text-2xl px-10 py-4 bg-blue-500 leading-none border rounded-lg text-white font-bold border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Book now</a>
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