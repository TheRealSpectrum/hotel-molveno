@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')
<div class="mt-10 sm:mt-0">
  <div class="grid grid-cols-4 gap-4 w-2/4 m-auto mt-4 mb-4">
		<div class="border-t-4 border-blue-500 pt-4">
      {{-- <a href="{{ route("booking.index") }}"> --}}
				<p class="uppercase text-blue-500 font-bold">Step 1</p>
				<p class="font-semibold">Booking information</p>	
      {{-- </a> --}}
		</div>
		<div class="border-t-4 border-blue-500 pt-4">
      {{-- <a href="{{ url()->previous() }}"> --}}
        <p class="uppercase text-blue-500 font-bold">Step 2</p>
        <p class="font-semibold">Options</p>
      {{-- </a> --}}
		</div>
		<div class="border-t-4 border-blue-500 pt-4">
		<p class="uppercase text-blue-500 font-bold">Step 3</p>
		<p class="font-semibold">Personal information</p>
		</div>
		<div class="border-t-4 border-blue-200 pt-4">
		<p class="uppercase text-gray-400 font-bold">Step 4</p>
		<p class="font-semibold">Preview</p>
		</div>
</div>

  <div class="md:grid md:grid-cols-3 md:gap-6 ">
    <div class="mt-5 md:mt-4 md:col-start-2">
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
      <form action="{{ route("booking.personalInfo") }}" method="GET">
        @csrf
        <input type="hidden" name="check_in" value="{{ $data["check_in"] }}">
        <input type="hidden" name="check_out" value="{{ $data["check_out"] }}">
        <input type="hidden" name="adults" value="{{ $data["adults"] }}">
        <input type="hidden" name="children" value="{{ $data["children"] }}">
        <input type="hidden" name="room_amount" value="{{ $data["room_amount"] }}">
        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
        @foreach ($packages as $package)
          <input type="hidden" name="packages[]" value="{{ $package->name }}">
          <input type="hidden" name="package_id[]" value="{{ $package->id }}">
        @endforeach
        @foreach ($roomsToBook as $roomToBook)
          <input type="hidden" name="roomtypes[]" value="{{ $roomToBook->roomtype->name }}">
          <input type="hidden" name="room_id[]" value="{{ $roomToBook->id }}">
        @endforeach
        <div class="shadow overflow-hidden sm:rounded-md w-full">
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
                <input type="text" name="email" value="{{ Auth::user()->email ?? ""}}" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>       
                <input type="text" name="address" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->address : old("address") }}" id="autocomplete" placeholder="Choose Location" autocomplete="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="phone" class="block text-sm font-medium text-gray-700">Telephone number <span class="text-red-500">*</span></label>
                <input type="tel" name="phone" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->phone : old("phone") }}" id="telephone" autocomplete="telephone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <div class="block p-4 m-1 border-2 border-gray-300 bg-gray-100 max-w-full">
                  <style>
                    a#privacy-terms, a#terms-conditions {
                      color: blue;
                    }

                    a#privacy-terms:visited, a#terms-conditions:visited {
                      color: purple;
                    }
                  </style>
                  <input id="checkbox" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please confirm that you agree with our privacy statement')" type="checkbox" class="align-middle h-8 w-8 rounded-md mr-4">
                  <label id="checkbox" for="checkbox">
                     I agree with the <a href="https://www.booking.com/content/terms.nl.html?aid=397594;label=gog235jc-1FCAEoggI46AdIHFgDaKkBiAEBmAEcuAEXyAEM2AEB6AEB-AECiAIBqAIDuAKJgPGKBsACAdICJDAzNmMyN2ZlLTBhY2MtNDc1YS1iYTE1LTUyZTc4ZTliNjg1ONgCBeACAQ;sid=c3a472f713ebd163b79e1c59a54f1172" target="_blank" id="terms-conditions">Terms & Conditions</a>
                     and with the <a href="https://www.booking.com/content/privacy.nl.html?aid=397594;label=gog235jc-1DCAEoggI46AdIHFgDaKkBiAEBmAEcuAEXyAEM2AED6AEB-AECiAIBqAIDuAKJgPGKBsACAdICJDAzNmMyN2ZlLTBhY2MtNDc1YS1iYTE1LTUyZTc4ZTliNjg1ONgCBOACAQ;sid=c3a472f713ebd163b79e1c59a54f1172" target="_blank" id="privacy-terms">privacy policy</a>
                     of Molveno Resort.
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Preview Booking
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

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