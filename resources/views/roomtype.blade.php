@extends('layouts.app')
@section('title', 'Choose your room type - Molveno Resort')
@section('content')

    Please choose your preferred type of rooms to finish your reservation:
    <form>
		
		<div>
		<label>Select a room type:</label>
			@foreach ( $roomTypes as $roomType )
				<p>{{ $roomType->name }}</p>
				<p>&euro;{{ $roomType->price }}</p>
				<p>{{ $roomType->room_surface}}m²</p>
				<img src="{{ url($roomType->image) }}">
				<input type="number" min="0">
			@endforeach
		</div>
    </form>

@endsection