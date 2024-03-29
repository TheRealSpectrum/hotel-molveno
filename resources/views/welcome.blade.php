@extends('layouts.app')
@section('title', 'Molveno resort')
@section('content')
  <main>
      <div class="main1">
        <div style="background-image: url('images/Hero1.jpg')" class="h-96 w-full bg-cover bg-no-repeat bg-center"></div>
        <div class="grid grid-cols-3 bg-gray-100">
            <div class="m-10">
                <h1 class="mb-10 font-medium capitalize text-4xl">Molveno resort</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ac turpis egestas sed tempus urna. Proin libero nunc consequat interdum. Lectus quam id leo in vitae turpis massa. Morbi tincidunt augue interdum velit euismod in pellentesque massa. Interdum varius sit amet mattis. In eu mi bibendum neque egestas. Tincidunt eget nullam non nisi est sit. Vestibulum lorem sed risus ultricies tristique nulla aliquet enim. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Fames ac turpis egestas sed tempus. Volutpat lacus laoreet non curabitur gravida. Orci sagittis eu </p>
            </div>
            <div class="m-10">
                <h1 class="mb-10 font-medium capitalize text-4xl">Environment</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ac turpis egestas sed tempus urna. Proin libero nunc consequat interdum. Lectus quam id leo in vitae turpis massa. Morbi tincidunt augue interdum velit euismod in pellentesque massa. Interdum varius sit amet mattis. In eu mi bibendum neque egestas. Tincidunt eget nullam non nisi est sit. Vestibulum lorem sed risus ultricies tristique nulla aliquet enim. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Fames ac turpis egestas sed tempus. Volutpat lacus laoreet non curabitur gravida. Orci sagittis eu </p>
            </div>
            <div class="m-10">
                <h1 class="mb-10 font-medium capitalize text-4xl">Activities</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ac turpis egestas sed tempus urna. Proin libero nunc consequat interdum. Lectus quam id leo in vitae turpis massa. Morbi tincidunt augue interdum velit euismod in pellentesque massa. Interdum varius sit amet mattis. In eu mi bibendum neque egestas. Tincidunt eget nullam non nisi est sit. Vestibulum lorem sed risus ultricies tristique nulla aliquet enim. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Fames ac turpis egestas sed tempus. Volutpat lacus laoreet non curabitur gravida. Orci sagittis eu </p>
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
                <img src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
            </div>
          </div>
          <div class="grid grid-cols-3 mr-16 ml-16 mb-16">
              <img class="p-5" src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
              <img class="p-5" src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
              <img class="p-5" src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
          </div>
      </div>
      <div class="main3" id="facilities">
        <div style="background-image: url('images/Hero2-xl.webp')" class="relative w-full h-96 bg-cover bg-no-repeat bg-center">
            <div class="absolute text-center w-full mt-10">
                <h1 class="text-white text-center font-bold text-4xl">Facilities</h1>
            </div>
            <div class="absolute flex flex-row w-full">
                <div class="p-12 w-full h-80 text-center mt-10">
                    <ul>
                        <li class="text-white font-medium text-xl">Wi-Fi</li>
                        <li class="text-white font-medium text-xl">Parking at the resort</li>
                        <li class="text-white font-medium text-xl">Airconditioning</li>
                        <li class="text-white font-medium text-xl">Swimming pool</li>
                        <li class="text-white font-medium text-xl">Sauna(VIP)</li>
                    </ul>
                </div>
                <div class="p-12 w-full h-80 text-center mt-10">
                    <ul>
                        <li class="text-white font-medium text-xl">Wi-Fi</li>
                        <li class="text-white font-medium text-xl">Parking at the resort</li>
                        <li class="text-white font-medium text-xl">Airconditioning</li>
                        <li class="text-white font-medium text-xl">Swimming pool</li>
                        <li class="text-white font-medium text-xl">Sauna(VIP)</li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
      <div class="main4" id="location">
          <div class="p-12 pt-20 h-96 md:w-1/2">
            <h1 class="text-black font-bold text-4xl pb-4">The environment</h1>
            <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga deleniti hic quae labore facilis perspiciatis voluptas ab? Dicta delectus quas sed expedita quibusdam. Voluptatibus unde quidem nulla labore laboriosam aperiam fugiat dicta ab saepe ea impedit iure pariatur facere alias ratione praesentium dolorem qui harum, aliquid sit accusantium repellendus. Nulla ratione error, architecto doloribus qui, reprehenderit impedit neque perspiciatis corporis id voluptatum corrupti voluptatibus natus similique consectetur dolorum sunt illum vero dignissimos atque suscipit. Quaerat aliquam id, earum molestias assumenda, veritatis reiciendis.</p>
          </div>
          <div class="grid grid-cols-3 pb-16">
            <div class="ml-12 mr-6 h-96 border-2 border-gray-300">
                <div style="background-image: url('images/Hero1.jpg')" class="w-full h-40 bg-no-repeat bg-cover"></div>
                <div class="p-8">
                    <h2>Location</h2>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                </div>
            </div>
            <div class="ml-6 mr-6 h-96 border-2 border-gray-300">
                <div style="background-image: url('images/Hero1.jpg')" class="w-full h-40 bg-no-repeat bg-cover"></div>
                <div class="p-8">
                    <h2>Nature</h2>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                </div>
            </div>
            <div class="mr-12 ml-6 h-96 border-2 border-gray-300">
                <div style="background-image: url('images/Hero1.jpg')" class="w-full h-40 bg-no-repeat bg-cover"></div>
                <div class="p-8">
                    <h2>Relaxation</h2>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                </div>
            </div>
          </div>
      </div>
      <div class="main5" id="restaurant">
          <div class="bg-gray-100 h-96 w-full grid grid-cols-2 p-12">
              <div class="mr-6">
                <h1 class="text-4xl pb-4">Restaurant</h1>
                <p class="pb-20">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem.</p>
                <h1 class="text-4xl"><i class="fas fa-phone-alt pr-1"></i>0039 – 934 4444 32</h1>
              </div>
              <div style="background-image: url('images/Menukaart.jpg')" class="w-full bg-no-repeat bg-cover ml-6">
                <div class="grid place-items-center h-full">
                    <a href="{{ url("images/Menukaart.jpg") }}" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Menu</a>
                </div>
              </div>
          </div>
      </div>
      <div class="main6" id="gallery">
          <div class="flex justify-center">
            <div class="h-2/4 w-2/4 p-12">
                <img src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
            </div>
          </div>
          <div class="grid grid-cols-3 mr-16 ml-16 mb-16">
              <img class="p-5" src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
              <img class="p-5" src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
              <img class="p-5" src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg">
          </div>
      </div>
      <div class="main7" id="contact">
          <div class="grid grid-flow-row grid-cols-2 bg-gray-100 h-96 place-items-center">
            <div>
                <h1 class="text-4xl pb-4">Molveno Resort</h1>
            </div>
            <div>
                <a href="{{ route("booking.index") }}" class="inline-block text-2xl px-10 py-4 bg-blue-500 leading-none border rounded-lg text-white font-bold border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Book now</a>
                <a href="#" class="inline-block text-2xl px-10 py-4 leading-none border rounded-lg text-blue border-blue-500 font-bold hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">Contact us</a>
            </div>
          </div>
      </div>
  </main>
@endsection