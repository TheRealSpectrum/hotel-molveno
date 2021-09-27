@extends("layouts.app")
@section("title", "Molveno Resort - My Account")

@section("content")
<main class="flex md:w-full h-full justify-center p-12">
    @if (auth()->user()->guest)
<div id="account-create-container" class="w-2/6">
    @if(Session::has('success'))
            <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
            <p class="font-bold">
            Success
            </p>
            <p>
                {{ Session::get("success") }}
            </p>
        </div>
        @endif
        @error("first_name")
        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
          <p>
              {{ $message }}
          </p>
        </div>
        @enderror
        @error("last_name")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
                {{ $message }}
            </p>
            </div>
        @enderror
        @error("email")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
                {{ $message }}
            </p>
            </div>
        @enderror
        @error("address")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
                {{ $message }}
            </p>
            </div>
        @enderror
        @error("phone")
        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
                {{ $message }}
            </p>
        </div>
        @enderror
    <form class="flex flex-col justify-evenly" id="update-acc-form" action="{{ route("account.update") }}" method="post">
        @method("patch")
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name <span class="text-red-500">*</span></label>
                  <input type="text" name="first_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->first_name : old("first_name") }}" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name <span class="text-red-500">*</span></label>
                  <input type="text" name="last_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->last_name : old("last_name") }}" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6">
                  <label for="email-address" class="block text-sm font-medium text-gray-700">Email address <span class="text-red-500">*</span></label>
                  <input type="text" name="email" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->email : old("email") }}" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6">
                  <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>       
                  <input type="text" name="address" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->address : old("address") }}" id="autocomplete" placeholder="Choose Location" autocomplete="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6">
                  <label for="phone" class="block text-sm font-medium text-gray-700">Telephone number <span class="text-red-500">*</span></label>
                  <input type="tel" name="phone" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->phone : old("phone") }}" id="telephone" autocomplete="telephone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update account
              </button>
            </div>
          </div>
    </form>
</div>
        @else
<div class="w-2/6" id="account-update-container">
    <div class="container bg-blue-500 flex items-center text-white text-sm font-bold px-4 py-3 relative mb-2" role="alert">
        <svg width="20" height="20" fill="currentColor" class="w-4 h-4 mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
            <path d="M1216 1344v128q0 26-19 45t-45 19h-512q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64v-384h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h384q26 0 45 19t19 45v576h64q26 0 45 19t19 45zm-128-1152v192q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-192q0-26 19-45t45-19h256q26 0 45 19t19 45z">
            </path>
        </svg>
        <p>
            Please complete your account profile
        </p>
    </div>
    @if(Session::has('success'))
    <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
    <p class="font-bold">
    Success
    </p>
    <p>
        {{ Session::get("success") }}
    </p>
    </div>
    @endif

    @error("first_name")
    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
    <p>
        {{ $message }}
    </p>
    </div>
    @enderror
    @error("last_name")
        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
        <p>
            {{ $message }}
        </p>
        </div>
    @enderror
    @error("email")
        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
        <p>
            {{ $message }}
        </p>
        </div>
    @enderror
    @error("address")
        <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
        <p>
            {{ $message }}
        </p>
        </div>
    @enderror
    @error("phone")
    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
        <p>
            {{ $message }}
        </p>
    </div>
    @enderror

    <form class="flex flex-col justify-evenly" id="create-acc-form" action="{{ route("account.create") }}" method="post">
        @csrf
        @if(Session::has('success'))
            <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
            <p class="font-bold">
            Success
            </p>
            <p>
                {{ Session::get("success") }}
            </p>
        </div>
        @endif

        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name <span class="text-red-500">*</span></label>
                  <input type="text" name="first_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->first_name : old("first_name") }}" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name <span class="text-red-500">*</span></label>
                  <input type="text" name="last_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->last_name : old("last_name") }}" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6">
                  <label for="email-address" class="block text-sm font-medium text-gray-700">Email address <span class="text-red-500">*</span></label>
                  <input type="text" name="email" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->email : old("email") }}" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6">
                  <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>       
                  <input type="text" name="address" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->address : old("address") }}" id="autocomplete" placeholder="Choose Location" autocomplete="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6">
                  <label for="phone" class="block text-sm font-medium text-gray-700">Telephone number <span class="text-red-500">*</span></label>
                  <input type="tel" name="phone" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->phone : old("phone") }}" id="telephone" autocomplete="telephone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update account
              </button>
            </div>
          </div>
    </form>
</div>
        @endif

        @if (!empty($reservations[0]))
        <div class="w-2/6">
            <h1 class="text-center font-bold text-4xl mb-6">Your Reservations</h1>
            @foreach ($reservations as $reservation)
            <div class="flex flex-wrap">
                <div class="w-1/2">
                    <h2 class="text-center font-bold text-1xl mb-2">Check in</h2>
                    <p class="text-center mb-3">{{ $reservation->check_in->format("d-m-Y H:m")}}</p> 
                </div>
                <div class="w-1/2">
                    <h2 class="text-center font-bold text-1xl mb-2">Check out</h2>
                    <p class="text-center mb-3">{{ $reservation->check_out->format("d-m-Y H:m")}}</p> 
                </div>
                <div class="w-1/2">
                    <h2 class="text-center font-bold text-1xl mb-2">Adults</h2>
                    <p class="text-center mb-3">{{ $reservation->adults}}</p> 
                </div>
                <div class="w-1/2">
                    <h2 class="text-center font-bold text-1xl mb-2">Children</h2>
                    <p class="text-center mb-3">{{ $reservation->children}}</p> 
                </div>
            </div>
            @endforeach
        @endif
</div>

       
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>
<script>
    $(document).ready(function () {
        $("#latitudeArea").addClass("d-none");
        $("#longtitudeArea").addClass("d-none");
    });

</script>

<script>
    google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
            $("#latitudeArea").removeClass("d-none");
            $("#longtitudeArea").removeClass("d-none");
        });
    }
</script>
@endsection