@extends('layouts.app')
@section('title', 'Choose your room type - Molveno Resort')
@section('content')

    You have selected <?php $_POST["rooms"]; ?> rooms.
    Please choose your preferred type of rooms to finish your reservation:
    <form>
		<label>Select a room type:</label><br>
		<div class="room-normal">
			<label>Normal</label><br>
			<input type="number" min="0"><br>
		</div>
		<div class="room-deluxe">
			<label>Deluxe</label><br>
			<input type="number" min="0"><br>
		</div>
    </form>

@endsection