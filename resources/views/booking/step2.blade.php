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
	<div class="grid grid-cols-4 gap-4 w-3/4 m-auto">
		<div class="border-t-4 border-blue-500 pt-4">
			<a href="{{ url()->previous() }}">
				<p class="uppercase text-blue-500 font-bold">Step 1</p>
				<p class="font-semibold">Booking information</p>
			</a>
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

	<div class="flex justify-center p-4 border-b-2">
    <form action="{{ route("booking.step3") }}" method="get">
		<input type="hidden" name="check_in" value="{{ $data["check_in"] }}">
		<input type="hidden" name="check_out" value="{{ $data["check_out"] }}">
		<input type="hidden" name="adults" value="{{ $data["adults"] }}">
		<input type="hidden" name="children" value="{{ $data["children"] }}">
		<input type="hidden" name="room_amount" value="{{ $data["room_amount"] }}">	
		@csrf	
		@foreach ( $roomTypes as $roomType )
		<div class="flex justify-evenly bg-gray-100 rounded mb-4">
			<div class="">
				<p class="font-medium leading-loose ml-2">{{ $roomType->name }}</p>
				<p class="font-medium leading-loose ml-2">&euro;{{ $roomType->price }}</p>
				<p class="font-medium leading-loose ml-2">{{ $roomType->room_surface}}m²</p>	
				<select class="rounded mt-4" name="room_type{{ $roomType->id }}" id="">
					<option value="0">0</option>
					@for ($i=1; $i <= $data['room_amount']; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
					@endfor
				</select>	
			</div>
			@if ($roomType->image)	
			<img class="w-80 h-40" src="{{ url($roomType->image) }}">	
			@endif		
		</div>	
		
		@endforeach
		<input type="submit" value="Finish reservation" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 w-full lg:mt-0">
    </form>
</div>
</main>
    

@endsection