@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
        <p class="mt-1 text-sm text-gray-600">
          Please fill in the personal information form:
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{ route("booking.personalInfo") }}" method="GET">
        @csrf
        <input type="hidden" name="check_in" value="{{ $data["check_in"] }}">
        <input type="hidden" name="check_out" value="{{ $data["check_out"] }}">
        <input type="hidden" name="adults" value="{{ $data["adults"] }}">
        <input type="hidden" name="children" value="{{ $data["children"] }}">
        <input type="hidden" name="room_amount" value="{{ $data["room_amount"] }}">
        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
        @foreach ($roomsToBook as $roomToBook)
          <input type="hidden" name="roomtypes[]" value="{{ $roomToBook->roomtype->name }}">
          <input type="hidden" name="room_id[]" value="{{ $roomToBook->id }}">
        @endforeach
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" name="first_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->first_name : "" }}" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" name="last_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->last_name : "" }}" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="text" name="email" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->email : "" }}" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>       
                <input type="text" name="address" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->address : "" }}" id="autocomplete" placeholder="Choose Location" autocomplete="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="phone" class="block text-sm font-medium text-gray-700">Telephone number</label>
                <input type="tel" name="phone" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->phone : "" }}" id="telephone" autocomplete="telephone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Go to confirmation screen
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