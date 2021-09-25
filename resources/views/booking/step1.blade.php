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

<div class="grid grid-cols-4 gap-4 w-3/4 m-auto">
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

<div class="flex justify-center p-4 border-b-2"> 
    <form class="flex flex-col w-2/4" action="{{ route("booking.step2") }}" method="get">
        @csrf
        <input type="hidden" name="check_in" value="">
        <input type="hidden" name="check_out" value="">
        <input class="bg-gray-100 w-full border-2 rounded cursor-pointer" type="text" name="daterange" /><br>
        <label class="font-medium" for="adults">How many adults?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="number" min="1" name="adults"><br>
        <label class="font-medium" for="children">How many children?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="number" min="0" name="children"><br>
        <label class="font-medium" for="room_amount">How many rooms?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="number" min="1" name="room_amount"><br>
        <input type="submit" value="Room selection(s)" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 w-full lg:mt-0 cursor-pointer"> 
    </form>
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