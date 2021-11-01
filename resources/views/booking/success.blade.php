@extends('layouts.app')
@section('title', 'Reservation success - Molveno Resort')
@section('content')
<main>
    <div class="flex-grow my-24 mx-4">
        <div class="grid grid-rows-7">
            <div class="text-center mt-10">
                <h1 class="text-5xl font-bold">
                Thank You.
                </h1>   
            </div>
            <div class="flex justify-center mb-10">
                <p class="text-xl text-center">Your reservation was completed succesfully</p>
            </div>
            <div class="flex justify-center row-span-3">
                <img class="max-w-xs" src="{{$page->hotel_logo ?? asset("images/Logo Molveno Resort Black.svg") }}" alt="hotel logo">
            </div>
            <div class="text-center">
                <p class="text-lg italic">An email receipt including the details about your reservation has been sent to the email provided.</p>
            </div>
            <div class="text-center mt-10">
                <a href="{{ route("home") }}" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg font-bold text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400">Return to home</a>
            </div>
        </div>
    </div>
</main>
@endsection