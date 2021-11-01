@extends('layouts.app')
@section('title', 'Choose your room type - Molveno Resort')
@section('content')
<main>
    <div class="w-full flex justify-center">
		<div class="w-full m-4 pb-32 md:pb-40 md:pt-12">

			<div class="grid grid-cols-4 w-full md:max-w-4xl m-auto mt-4 mb-4">
				<div class="border-t-4 border-blue-500 pt-4">
					{{-- <a href="{{ url()->previous() }}"> --}}
					<p class="uppercase text-blue-500 font-bold">Step 1</p>
					<p class="font-semibold">Booking information</p>
					{{-- </a> --}}
				</div>
				<div class="border-t-4 border-blue-500 pt-4">
					<p class="uppercase text-blue-500 font-bold">Step 2</p>
					<p class="font-semibold">Options</p>
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

			<div class="flex flex-col m-auto md:max-w-7xl">

				@if (\Session::has("error"))
				<div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
					<p>
						{{ Session::get("error") }}
					</p>
				</div>
				@endif

				<div class="shadow overflow-hidden w-full md:mt-8 sm:rounded-md">
					<div class="w-full p-4 md:px-16 md:py-5 md:p-16 bg-white">
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
									<div class="w-full bg-gray-200 rounded-md overflow-hidden group-hover:opacity-75">
										<img src="{{ url($roomType->image ?? 'https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg') }}" 
										alt="Room type" class="w-full object-center object-fill">
									</div>
									<div class="mt-4 flex justify-between">
										<div>
											<h3 class="text-sm text-gray-700">
												<span aria-hidden="true" class="absolute"></span>
												{{ $roomType->name }}
											</h3>
											<p class="mt-1 text-sm text-gray-500">{{ $roomType->room_surface }}m²</p>
										</div>
										<p class="text-sm font-medium text-gray-900">{{ "€" . $roomType->price }} per night</p>
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
							<h2 class="text-2xl font-extrabold tracking-tight text-gray-900 mt-6">Add to your stay</h2>
							@foreach ( $packages as $package )
							<div class="group relative">
								<div class="mt-4 flex">
									<div>
										<h3 class="text-sm text-gray-700">
											<span aria-hidden="true" class="absolute"></span>
											{{ $package->name }} {{ ($package->price !== 0) ? "€" . $package->price : "Free of charge" }}
										</h3>
									</div>
								</div>
								<input type="checkbox" name="package{{ $package->id }}" id="" value="{{ $package->id }}">
							</div>
							@endforeach
							<div class="flex justify-end">
								<input type="submit" value="Personal information" class="inline-block text-sm px-8 py-3 md:mb-4 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-4 cursor-pointer">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection