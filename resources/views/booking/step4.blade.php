@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      @if (\Session::has("success"))
      <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
              <p>
                  {{ Session::get("success") }}
              </p>
      </div>
      @else
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Please check your reservation
       </h3>
       <p class="mt-1 max-w-2xl text-sm text-gray-500">
         Reservation details
       </p>
     </div>
  @endif
      
    <div class="border-t border-gray-200">
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
              Total Price
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ $data['total_price'] }}
            </dd>
          </div>
      </dl>
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
        

      @if (!\Session::has("success"))
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Make Reservation 
          </button>
        </div>
        @else 
          <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <a href="{{ route("home") }}">Back to home</a>
          </button>
      @endif
       
    </form>
  </div>
@endsection