@extends('layouts.app')
@section('title', 'Make a reservation - Molveno Resort')
@section('content')

<div class="flex-grow">
  @if (\Session::has("error"))
  <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
          <p>
              {{ Session::get("error") }}
          </p>
  </div>
@endif

<div class="grid grid-cols-4 gap-4 w-2/4 m-auto mt-4 mb-4">
  <div class="border-t-4 border-blue-500 pt-4">
    <p class="uppercase text-blue-500 font-bold">Step 1</p>
    <p class="font-semibold">Booking information</p>
  </div>
  <div class="border-t-4 border-gray-200 pt-4">
    <p class="uppercase text-gray-400 font-bold">Step 2</p>
    <p class="font-semibold">Room type(s)</p>
  </div>
  <div class="border-t-4 border-gray-200 pt-4">
    <p class="uppercase text-gray-400 font-bold">Step 3</p>
    <p class="font-semibold">Personal information</p>
  </div>
  <div class="border-t-4 border-gray-200 pt-4">
    <p class="uppercase text-gray-400 font-bold">Step 4</p>
    <p class="font-semibold">Preview</p>
  </div>
</div>

<div class="flex justify-center">
<div class="shadow overflow-hidden sm:rounded-md w-full">
  <div class="px-4 py-5 bg-white h-full sm:p-6">
    <div class="md:grid md:grid-cols-3 md:gap-6 justify-center"> 
      <div class="md:grid md:grid-cols-2 mt-5 md:mt-4 md:col-start-2">
        <form class="md:col-span-2" action="{{ route("booking.step2") }}" method="get">
            @csrf
            <input type="hidden" name="check_in" value="{{ old("check_in") }}">
            <input type="hidden" name="check_out" value="{{ old("check_out") }}">
            @error("check_in")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
              <p>
                  {{ $message }}
              </p>
            </div>
            @enderror
            @error("check_out")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
              <p>
                  {{ $message }}
              </p>
            </div>
            @enderror
            @error("adults")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
              <p>
                  {{ $message }}
              </p>
            </div>
            @enderror
            @error("children")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
              <p>
                  {{ $message }}
              </p>
            </div>
            @enderror
            @error("room_amount")
            <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
              <p>
                  {{ $message }}
              </p>
            </div>
            @enderror
            <div class="relative">
                <label for="daterange" class="pl-2 font-medium">Check in/out date <span class="text-red-500">*</span></label>
                <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autocomplete="off" type="text" name="daterange"/>
                <div class="absolute top-0 right-0 px-3 py-9">
                    <svg
                      class="h-6 w-6 text-gray-400"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                  </div>  
            </div>

            <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="">
                <label class="flex pl-2 font-medium" for="adults">Adults (12+) <span class="text-red-500">*</span></label>
                <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="number" name="adults" value="{{ old("adults") ?? "1" }}">
            </div>
            <div class="">
                <label class="flex pl-2 font-medium" for="children">Children <span class="text-red-500">*</span></label>
                <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="number" name="children" value="{{ old("children") ?? "0" }}">
            </div>            
            <div class="">
                <label class="flex pl-2 font-medium" for="room_amount">Rooms <span class="text-red-500">*</span></label>
                <input class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="number" name="room_amount" value="{{ old("room_amount") ?? "1" }}" >
            </div>
        </div>
            <input type="submit" value="Room selection(s)" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 w-full lg:mt-4 cursor-pointer"> 
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>



<script>  
$(function() {
    $('input[name="daterange"]').daterangepicker({
    "startDate": moment(),
    "endDate": moment().add(1, "days"),
    "minDate": new Date(),
    "autoApply": true,
    "opens": "center",
    "autoUpdateInput": false,
    locale: {
        firstDay: 0,
        default_date_format: 'D MMM YYYY',
        default_datetime_format: 'D MMM YYYY, HH:mm',
    }
    }, function (start, end, label) {
        $('input[name="daterange"]').val(start.format('DD-MM-YYYY') + " - " + end.format('DD-MM-YYYY'))
        $('input[name="check_in"]').val(start.format('YYYY-MM-DD 14:00:00'))
        $('input[name="check_out"]').val(end.format('YYYY-MM-DD 12:00:00'))
    })
});
</script>
@endsection