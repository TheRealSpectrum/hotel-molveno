@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')

    You have selected the following:
    @csrf
    <p>Room type(s): {{ $roomType->name }}</p>
    <p>Room price(s): &euro;{{ $roomType->price }}</p>
    <input type="submit" value="Finish Reservation">

@endsection