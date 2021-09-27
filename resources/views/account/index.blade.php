@extends("layouts.app")
@section("title", "Molveno Resort - My Account")

@section("content")
<main class="flex md:w-full h-full justify-center p-12">
    @if (auth()->user()->guest)
<div id="account-create-container" class="w-2/6">
    <form class="flex flex-col justify-evenly" id="update-acc-form" action="{{ route("account.update") }}" method="post">
        @method("patch")
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

        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="" value="{{ auth()->user()->guest->first_name }}" class="flex rounded-md mb-6 @error("first_name") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror">

        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="" value="{{ auth()->user()->guest->last_name }}" class="flex rounded-md mb-6 @error("last_name") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror">

        <label for="email">Email</label>
        <input type="email" name="email" id="" value="{{ auth()->user()->guest->email }}" class="flex rounded-md mb-6 @error("email") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror">

        <label for="address">Address</label>
        <input class="flex rounded-md mb-6 @error("email") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror" type="text" name="address" id="autocomplete" value="{{ auth()->user()->guest->address }}">

        <label for="phone">Phone number</label>
        <input type="text" name="phone" id="" value="{{ auth()->user()->guest->phone }}" class="flex rounded-md mb-6 @error("phone") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror">
        
        <input type="submit" value="Update profile" class="w-1/2 self-center cursor-pointer inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg 
        text-white border-blue hover:border-transparent hover:text-teal-500 
        hover:bg-gray-400 mt-8 lg:mt-0 font-bold">
    </form>
</div>
        @else
<div class="w-2/6" id="account-update-container">
    <h1 class="text-center align-center font-bold text-4xl mb-6">Update your account</h1>
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

        @error("first_name")
        <div class="text-red-700">{{ $message }}</div>
        @enderror
        <label for="first_name">First name</label>
        <input class="flex rounded-md mb-6 @error("first_name") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror" type="text" name="first_name" id="">

        @error("last_name")
        <div class="text-red-700">{{ $message }}</div>
        @enderror
        <label for="last_name">Last name</label>
        <input class="flex rounded-md mb-6 @error("last_name") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror" type="text" name="last_name" id="">

        @error("email")
        <div class="text-red-700">{{ $message }}</div>
        @enderror
        <label for="email">Email</label>
        <input class="flex rounded-md mb-6 @error("email") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror" type="email" name="email" id="">

        @error("address")
        <div class="text-red-700">{{ $message }}</div>
        @enderror
            <label for="address">Address</label>
            <input class="flex rounded-md mb-6 @error("email") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror" type="text" name="address" id="autocomplete" placeholder="Choose Location">
     
        @error("phone")
        <div class="text-red-700">{{ $message }}</div>
        @enderror
        <label for="phone">Phone number</label>
        <input class="flex rounded-md mb-6 @error("phone") bg-red-100 border border-red-400 text-red-700 px-4 py-3 @enderror" type="text" name="phone" id="">

        <input class="w-1/2 self-center cursor-pointer inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg 
        text-white border-blue hover:border-transparent hover:text-teal-500 
        hover:bg-gray-400 mt-8 lg:mt-0 font-bold" type="submit" value="Update profile">
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