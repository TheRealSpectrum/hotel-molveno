@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')
    You have selected the following:
    <form action="" method="get">
        @csrf
        <p>Room type(s):</p>
        <p>Room price(s):&euro;</p>
        <p>Check-in date:</p>
        <p>Check-out date:</p>
        <p>Number of adults:</p>
        <p>Number of children:</p>
        <input type="submit" value="Finish Reservation" onclick="return confirm('Are you sure?')">
    </form>

    If you want to switch between room types, please click here:
    <button href="/roomtype" value="Change room type">

    If your reservation is incorrect, please return to the reservation form here:
    <button href="/book" value="Return to booking">
@endsection