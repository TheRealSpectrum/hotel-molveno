@extends('layouts.app')
@section('title', 'Make a reservation - Molveno Resort')
@section('content')
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

<div class="md:grid md:grid-cols-3 md:gap-6"> 
    <div class="md:grid md:grid-cols-2 mt-5 md:mt-4 md:col-start-2">
    <form class="md:col-span-2" action="{{ route("booking.step2") }}" method="get">
        @csrf
        <input type="hidden" name="check_in" value="">
        <input type="hidden" name="check_out" value="">
        <div class="relative">
            <label for="daterange" class="pl-2 font-medium">Check in/out date</label>
            <input class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" type="text" name="daterange"/>
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
            <label class="pl-2 font-medium w-full" for="adults">Adults (12+)</label>
            <input class="w-full pl-4 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" type="number" min="1" name="adults">
        </div>
        <div class="">
            <label class="pl-2 font-medium" for="children">Children</label>
            <input class="pl-4 py-3 w-full leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" type="number" min="0" name="children">
        </div>
        
        <div class="">
            <label class="pl-2 font-medium" for="room_amount">Amount rooms</label>
            <input class="pl-4 py-3 w-full leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" type="number" min="1" name="room_amount">
        </div>
    </div>
        <input type="submit" value="Room selection(s)" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 w-full lg:mt-4 cursor-pointer"> 
    </form>
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
    locale: {
        firstDay: 0,
        default_date_format: 'D MMM YYYY',
        default_datetime_format: 'D MMM YYYY, HH:mm',
    }
    }, function (start, end, label) {
        $('input[name="check_in"]').val(start.format('YYYY-MM-DD 14:00:00'))
        $('input[name="check_out"]').val(end.format('YYYY-MM-DD 12:00:00'))
    })
});
</script>
@endsection