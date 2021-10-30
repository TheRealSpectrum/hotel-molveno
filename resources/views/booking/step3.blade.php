@extends('layouts.app')
@section('title', 'Finish reservation - Molveno Resort')
@section('content')
<main>
  <div class="w-full flex justify-center">
    <div class="w-full m-4 pb-32 md:w-3/5 md:pb-40 md:pt-12">
      @if (\Session::has("error"))
      <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
        <p>
          {{ Session::get("error") }}
        </p>
      </div>
      @endif

      <div class="grid grid-cols-4 w-full md:max-w-4xl m-auto mt-4 mb-4">
        <div class="border-t-4 border-blue-500 pt-4">
          {{-- <a href="{{ route("booking.index") }}"> --}}
            <p class="uppercase text-blue-500 font-bold">Step 1</p>
            <p class="font-semibold">Booking information</p>	
          {{-- </a> --}}
        </div>
        <div class="border-t-4 border-blue-500 pt-4">
          {{-- <a href="{{ url()->previous() }}"> --}}
            <p class="uppercase text-blue-500 font-bold">Step 2</p>
            <p class="font-semibold">Options</p>
          {{-- </a> --}}
        </div>
        <div class="border-t-4 border-blue-500 pt-4">
          <p class="uppercase text-blue-500 font-bold">Step 3</p>
          <p class="font-semibold">Personal information</p>
        </div>
        <div class="border-t-4 border-blue-200 pt-4">
          <p class="uppercase text-gray-400 font-bold">Step 4</p>
          <p class="font-semibold">Preview</p>
        </div>
      </div>

      <div class="bg-white flex justify-center">
        <div class="md:col-start-2">
          @error("first_name")
          <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
              {{ $message }}
            </p>
          </div>
          @enderror
          @error("last_name")
          <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
              {{ $message }}
            </p>
          </div>
          @enderror
          @error("email")
          <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
              {{ $message }}
            </p>
          </div>
          @enderror
          @error("address")
          <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
              {{ $message }}
            </p>
          </div>
          @enderror
          @error("phone")
          <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mb-2" role="alert">
            <p>
              {{ $message }}
            </p>
          </div>
          @enderror
          <form action="{{ route("booking.personalInfo") }}" method="GET">
            @csrf
            <input type="hidden" name="check_in" value="{{ $data["check_in"] }}">
            <input type="hidden" name="check_out" value="{{ $data["check_out"] }}">
            <input type="hidden" name="adults" value="{{ $data["adults"] }}">
            <input type="hidden" name="children" value="{{ $data["children"] }}">
            <input type="hidden" name="room_amount" value="{{ $data["room_amount"] }}">
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            @foreach ($packages as $package)
              <input type="hidden" name="packages[]" value="{{ $package->name }}">
              <input type="hidden" name="package_id[]" value="{{ $package->id }}">
            @endforeach
            @foreach ($roomsToBook as $roomToBook)
              <input type="hidden" name="roomtypes[]" value="{{ $roomToBook->roomtype->name }}">
              <input type="hidden" name="room_id[]" value="{{ $roomToBook->id }}">
            @endforeach
            <div class="shadow overflow-hidden w-full md:max-w-xl md:mt-8 sm:rounded-md">
              <div class="w-full px-16 py-5 md:p-16 bg-white">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name <span class="text-red-500">*</span></label>
                    <input type="text" name="first_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->first_name : old("first_name") }}" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name <span class="text-red-500">*</span></label>
                    <input type="text" name="last_name" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->last_name : old("last_name") }}" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6">
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address <span class="text-red-500">*</span></label>
                    <input type="text" name="email" value="{{ Auth::user()->email ?? ""}}" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>       
                    <input type="text" name="address" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->address : old("address") }}" id="autocomplete" placeholder="Choose Location" autocomplete="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telephone number <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" value="{{ isset(Auth::user()->guest) ? Auth::user()->guest->phone : old("phone") }}" id="telephone" autocomplete="telephone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6">
                    <div class="block p-4 m-1 border-2 border-gray-300 bg-gray-100 max-w-full">
                      <style>
                        a#privacy-terms, a#terms-conditions {
                          color: blue;
                        }

                        a#privacy-terms:visited, a#terms-conditions:visited {
                          color: purple;
                        }
                      </style>
                      <input id="checkbox" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please confirm that you agree with our privacy statement')" type="checkbox" class="align-middle h-8 w-8 rounded-md mr-4">
                      <label id="checkbox" for="checkbox">
                        I agree with the <a href="https://www.booking.com/content/terms.nl.html?aid=397594;label=gog235jc-1FCAEoggI46AdIHFgDaKkBiAEBmAEcuAEXyAEM2AEB6AEB-AECiAIBqAIDuAKJgPGKBsACAdICJDAzNmMyN2ZlLTBhY2MtNDc1YS1iYTE1LTUyZTc4ZTliNjg1ONgCBeACAQ;sid=c3a472f713ebd163b79e1c59a54f1172" target="_blank" id="terms-conditions">Terms & Conditions</a>
                        and with the <a href="https://www.booking.com/content/privacy.nl.html?aid=397594;label=gog235jc-1DCAEoggI46AdIHFgDaKkBiAEBmAEcuAEXyAEM2AED6AEB-AECiAIBqAIDuAKJgPGKBsACAdICJDAzNmMyN2ZlLTBhY2MtNDc1YS1iYTE1LTUyZTc4ZTliNjg1ONgCBOACAQ;sid=c3a472f713ebd163b79e1c59a54f1172" target="_blank" id="privacy-terms">privacy policy</a>
                        of Molveno Resort.
                      </label>
                    </div>
                  </div>
                </div>
                <div class="flex justify-center md:justify-end md:mt-8">
                  <input type="submit" value="Preview Booking" class="inline-block text-sm px-8 py-3 md:mb-4 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 lg:mt-4 cursor-pointer">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection