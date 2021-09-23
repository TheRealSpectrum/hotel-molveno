@extends('layouts.app')
@section('title', 'Choose your room type - Molveno Resort')
@section('content')

    Please choose your preferred type of rooms to finish your reservation:
    <form action="{{ route("booking.step3") }}" method="get">	
		<label>Select a room type:</label>
		@csrf	
		@foreach ( $roomTypes as $roomType )
			<p>{{ $roomType->name }}</p>
			<p>&euro;{{ $roomType->price }}</p>
			<p>{{ $roomType->room_surface}}m²</p>				
			<img src="{{ url($roomType->image) }}">				
			<input type="number" name="room_type{{ $roomType->id }}" min="0">
		@endforeach
		<input type="submit" value="Reservation">
    </form>

@endsection