@extends('layouts.app')
@section('title', 'Choose your room type(s) - Molveno Resort')
@section('content')
<h1 class="text-2xl font-medium flex justify-center pt-4">Select a room type:</h1>
	<div class="flex justify-center p-4 border-b-2">
		<form action="{{ route("booking.step3") }}" method="get">			
			@csrf	
			@foreach ( $roomTypes as $roomType )	
				<div class="flex justify-evenly bg-gray-100 rounded">
					<img class="w-40 h-30 rounded" src="{{ url($roomType->image) }}">
					<p class="font-medium leading-loose">{{ $roomType->name }}</p>
					<p class="font-medium leading-loose">&euro;{{ $roomType->price }}</p>
					<p class="font-medium leading-loose">{{ $roomType->room_surface}}m²</p>				
				</div>			
				<input class=" w-full border-2 rounded mb-4" type="number" name="room_type{{ $roomType->id }}" min="0">
			@endforeach
			<input type="submit" value="Finish reservation" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 w-full lg:mt-0">
		</form>
	</div>
@endsection