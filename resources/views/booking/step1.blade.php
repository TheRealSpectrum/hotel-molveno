@extends('layouts.app')
@section('title', 'Make a reservation - Molveno Resort')
@section('content')
<h1 class="text-2xl font-medium flex justify-center pt-4">Please fill in the form to make a reservation:</h1> 
@if (\Session::has("error"))
    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
            <p>
                {{ Session::get("error") }}
            </p>
    </div>
@endif
<div class="flex justify-center p-4 border-b-2"> 
    <form class="flex flex-col w-2/4" action="{{ route("booking.step2") }}" method="get">
        @csrf
        <input type="text" name="daterange" /><br>
        <label class="font-medium" for="adults">How many adults?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="number" min="1" name="adults"><br>
        <label class="font-medium" for="children">How many children?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="number" min="0" name="children"><br>
        <label class="font-medium" for="room_amount">How many rooms?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="number" min="1" name="room_amount"><br>
        <input type="submit" value="Room selection(s)" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 w-full lg:mt-0"> 
    </form>
</div>

<script>

    
$(function() {
    $('input[name="daterange"]').daterangepicker({
    "startDate": moment(),
    "endDate": moment(),
    "minDate": new Date(),
    "opens": "center",
    locale: {
        firstDay: 0,
        default_date_format: 'D MMM YYYY',
        default_datetime_format: 'D MMM YYYY, HH:mm',
    }
    })
});
</script>
@endsection