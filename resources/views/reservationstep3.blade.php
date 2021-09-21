@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')

    @if (strlen($guest->first_name) > 0)
        Welcome {{ $guest->first_name . " " . $guest->last_name }}.
    @endif

    You have selected the following:
    <form action="{{ route("confirm") }}" method="get">
        @csrf
        <p>Room type(s): {{ $roomType->name }}</p>
        <p>Room price(s): &euro;{{ $roomType->price }}</p>
        <p>Check-in date: {{ $fillable->check_in }}</p>
        <p>Check-out date: {{ $fillable->check_out }}</p>
        <p>Number of adults: {{ $fillable->adults }}</p>
        <p>Number of children: {{ $fillable->children }}</p>
        <input type="submit" value="Finish Reservation" onclick="return confirm('Are you sure?')">
    </form>

    If you want to switch between room types, please click here:
    <button href="/roomtype" value="Change room type">

    If your reservation is incorrect, please return to the reservation form here:
    <button href="/book" value="Return to booking">
@endsection