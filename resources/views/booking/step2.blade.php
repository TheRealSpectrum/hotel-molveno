@extends('layouts.app')
@section('title', 'Choose your room type - Molveno Resort')
@section('content')

<main>
	@if (\Session::has("error"))
    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
            <p>
                {{ Session::get("error") }}
            </p>
    </div>
	@endif
	<div class="grid grid-cols-4 gap-4 w-2/4 m-auto mt-4 mb-4">
		<div class="border-t-4 border-blue-500 pt-4">
			{{-- <a href="{{ url()->previous() }}"> --}}
				<p class="uppercase text-blue-500 font-bold">Step 1</p>
				<p class="font-semibold">Booking information</p>
			{{-- </a> --}}
		</div>
		<div class="border-t-4 border-blue-500 pt-4">
		<p class="uppercase text-blue-500 font-bold">Step 2</p>
		<p class="font-semibold">Room type(s)</p>
		</div>
		<div class="border-t-4 border-gray-200 pt-4">
		<p class="uppercase text-gray-400 font-bold">Step 3</p>
		<p class="font-semibold">Personal information</p>
		</div>
		<div class="border-t-4 border-gray-200 pt-4">
		<p class="uppercase text-gray-400 font-bold">Step 4</p>
		<p class="font-semibold">Preview</p>
		</div>
	</div>

<div class="bg-white flex justify-center">
<div class="shadow overflow-hidden w-2/3 sm:rounded-md">
  <div class="max-w-2xl mx-auto py-2 px-4 sm:py-6 sm:px-2 lg:max-w-7xl lg:px-8">
  	<h2 class="text-2xl font-extrabold tracking-tight text-gray-900 text-center">Available rooms</h2>
    <form action="{{ route("booking.step3") }}" method="get">
		<input type="hidden" name="check_in" value="{{ $data["check_in"] }}">
		<input type="hidden" name="check_out" value="{{ $data["check_out"] }}">
		<input type="hidden" name="adults" value="{{ $data["adults"] }}">
		<input type="hidden" name="children" value="{{ $data["children"] }}">
		<input type="hidden" name="room_amount" value="{{ $data["room_amount"] }}">
		<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
			@csrf	
			@foreach ( $roomTypes as $roomType )
			<div class="group relative">
				<div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
					<img src="{{ url($roomType->image) }}" alt="Room image" class="w-full h-full object-center object-fill lg:w-full lg:h-full">
				</div>
				<div class="mt-4 flex justify-between">
					<div>
						<h3 class="text-sm text-gray-700">
							<span aria-hidden="true" class="absolute"></span>
							{{ $roomType->name }}
						</h3>
						<p class="mt-1 text-sm text-gray-500">{{ $roomType->room_surface }}m²</p>
					</div>
					<p class="text-sm font-medium text-gray-900">&euro;{{ $roomType->price }} per night</p>
				</div>
				<select class="rounded mt-4" name="room_type{{ $roomType->id }}" id="">
					<option value="0">0</option>
					@for ($i=1; $i <= $data['room_amount']; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
					@endfor
				</select>
			</div>
			@endforeach
		</div>
		<div class="flex justify-end">
			<div class="py-6">
				<input type="submit" value="Personal information" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-0">
			</div>
		</div>
    </form>
  </div>
</div>
</div>
</main>
@endsection