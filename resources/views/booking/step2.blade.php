@extends('layouts.app')
@section('title', 'Choose your room type - Molveno Resort')
@section('content')

    Please choose your preferred type of rooms to finish your reservation:
    <form action="{{ route("booking.step3") }}" method="get">
		<input type="hidden" name="check_in" value="{{ $data["check_in"] }}">
		<input type="hidden" name="check_out" value="{{ $data["check_out"] }}">
		<input type="hidden" name="adults" value="{{ $data["adults"] }}">
		<input type="hidden" name="children" value="{{ $data["children"] }}">
		<input type="hidden" name="room_amount" value="{{ $data["room_amount"] }}">	
		<label>Select a room type:</label>
		@csrf	
		@foreach ( $roomTypes as $roomType )
			<p>{{ $roomType->name }}</p>
			<p>&euro;{{ $roomType->price }}</p>
			<p>{{ $roomType->room_surface}}m²</p>	
			@if ($roomType->image)	
			<img src="{{ url($roomType->image) }}">	
			@endif			
			<input type="number" name="room_type{{ $roomType->id }}" min="0">
		@endforeach
		<input type="submit" value="Reservation">
    </form>

@endsection