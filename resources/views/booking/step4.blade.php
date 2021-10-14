@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow sm:rounded-lg pb-8">
    <div class="sm:px-6">
      @if (\Session::has("success"))
      <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
              <p>
                  {{ Session::get("success") }}
              </p>
      </div>
      @else 
      <div class="sm:mt-0">
        <div class="grid grid-cols-4 gap-4 w-2/4 m-auto mt-4 mb-4">
          <div class="border-t-4 border-blue-500 pt-4">
            {{-- <a href="{{ route("booking.index") }}"> --}}
              <p class="uppercase text-blue-500 font-bold">Step 1</p>
              <p class="font-semibold">Booking information</p>	
            {{-- </a> --}}
          </div>
          <div class="border-t-4 border-blue-500 pt-4">
            {{-- <a href="{{ url()->previous() }}"> --}}
              <p class="uppercase text-blue-500 font-bold">Step 2</p>
              <p class="font-semibold">Room type(s)</p>
            {{-- </a> --}}
          </div>
          <div class="border-t-4 border-blue-500 pt-4">
            {{-- <a href="{{ url()->previous() }}"> --}}
              <p class="uppercase text-blue-500 font-bold">Step 3</p>
              <p class="font-semibold">Personal information</p>
            {{-- </a> --}}
          </div>
          <div class="border-t-4 border-blue-500 pt-4">
          <p class="uppercase text-blue-500 font-bold">Step 4</p>
          <p class="font-semibold">Preview</p>
          </div>
      </div>
  @endif
  <div class="flex justify-center">
    <div class="border-t border-r border-l  border-gray-200 w-2/3">
      <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            First name
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
           {{ $data["first_name"] }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Last name
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ $data["last_name"] }}
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Email address
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ $data["email"] }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Address
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ $data["address"] }}
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Phone number
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ $data["phone"] }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Check in
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $data['check_in'] }}
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Check out
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $data['check_out'] }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Adults
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $data['adults'] }}
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Children
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $data['children'] }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          
          <dt class="text-sm font-medium text-gray-500">
            Room(s)
          </dt>
          @foreach ($roomTypeNames as $roomType => $amount)
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 right-0">
                {{ $amount . ' ' . $roomType . ' Room(s)'}}
          </dd>
          <dt class="text-sm font-medium text-gray-500">
            
          </dt>
          @endforeach
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          
          <dt class="text-sm font-medium text-gray-500">
            Package(s)
          </dt>
          @if (isset($packageNames))
            @foreach ($packageNames as $packages => $amount)
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ $packages }}
              </dd>
              <dt class="text-sm font-medium text-gray-500">
    
              </dt>
            @endforeach
          @endif
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Total Price
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              &euro; {{ $data['total_price'] }},00
            </dd>
        </div>
      </dl>
    </div>
  </div>
    <form action="{{ route("booking.confirm") }}" method="POST">
    @csrf
        <input type="hidden" name="check_in" value="{{ $data["check_in"] }}">
        <input type="hidden" name="check_out" value="{{ $data["check_out"] }}">
        <input type="hidden" name="adults" value="{{ $data["adults"] }}">
        <input type="hidden" name="children" value="{{ $data["children"] }}">
        <input type="hidden" name="room_amount" value="{{ $data["room_amount"] }}">
        <input type="hidden" name="total_price" value="{{ $data["total_price"] }}">
        <input type="hidden" name="guest_id" value="{{ $data["guest_id"] }}">

        @foreach ($data["room_id"] as $room_id)
        <input type="hidden" name="room_id[]" value="{{ $room_id }}">
        @endforeach
        @if( isset($data["packages"]))
          @foreach ($data["package_id"] as $package_id)
          <input type="hidden" name="package_id[]" value="{{ $package_id }}">
          @endforeach
        @endif
        

      @if (!\Session::has("success"))
      <div class="flex justify-center">
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 w-2/3 border border-gray-200">
          <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Make Reservation 
          </button>
        </div>
      </div>
        @else 
          <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <a href="{{ url("home") }}">Back to home</a>
          </button>
      @endif
       
    </form>
  </div>
  </div>
</div>
@endsection