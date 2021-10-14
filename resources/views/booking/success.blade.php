@extends('layouts.app')
@section('title', 'Reservation success - Molveno Resort')
@section('content')

<div class="flex-grow">
    <div class="grid grid-rows-6">
        <div class="flex justify-center mt-5">
            <h1 class="text-5xl font-bold">
               Thank You.
            </h1>   
        </div>
        <div class="flex justify-center">
            <p class="text-xl">Your reservation was completed succesfully</p>
        </div>
        <div class="flex justify-center row-span-2">
            <img class="w-40" src="{{ asset("images/Logo Molveno Resort Black.svg") }}" alt="">
        </div>
        <div class="flex justify-center">
            <p class="text-lg italic">An email receipt including the details about your reservation has been sent to the email provided.</p>
        </div>
    </div>
</div>

@endsection