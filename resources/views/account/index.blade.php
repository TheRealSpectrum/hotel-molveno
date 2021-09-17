@extends("layouts.app")
@section("title", "Molveno Resort - My Account")

@section("content")
<main class="flex md:w-full h-full justify-center p-12">
    @if(Session::has('success'))
    <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
        <p class="font-bold">
            Success
        </p>
        <p>
            {{ Session::get("success") }}
        </p>
    </div>
    @endif

    @if (auth()->user()->guest)
<div id="account-create-container">
    <form class="" id="update-acc-form" action="{{ route("account.update") }}" method="post">
        @method("patch")
        @csrf
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="" value="{{ auth()->user()->guest->first_name }}">

        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="" value="{{ auth()->user()->guest->last_name }}">

        <label for="email">Email</label>
        <input type="email" name="email" id="" value="{{ auth()->user()->guest->email }}">

        <label for="address">Address</label>
        <input type="text" name="address" id="" value="{{ auth()->user()->guest->address }}">

        <label for="phone">Phone number</label>
        <input type="text" name="phone" id="" value="{{ auth()->user()->guest->phone }}">
        <input type="submit" value="Update profile">
    </form>
</div>
        @else
<div class="w-2/6" id="account-update-container">
    <h1 class="text-center align-center font-bold text-4xl mb-6">Update your account</h1>
    <form class="flex flex-col justify-evenly" id="create-acc-form" action="{{ route("account.create") }}" method="post">
        @csrf
        <label for="first_name">First name</label>
        <input class="flex rounded-md mb-6" type="text" name="first_name" id="" >

        <label for="last_name">Last name</label>
        <input class="flex rounded-md mb-6" type="text" name="last_name" id="">

        <label for="email">Email</label>
        <input class="flex rounded-md mb-6" type="email" name="email" id="">

        <label for="address">Address</label>
        <input class="flex rounded-md mb-6" type="text" name="address" id="">

        <label for="phone">Phone number</label>
        <input class="flex rounded-md mb-6" type="text" name="phone" id="">

        <input class="w-1/2 self-center cursor-pointer inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg 
        text-white border-blue hover:border-transparent hover:text-teal-500 
        hover:bg-gray-400 mt-8 lg:mt-0 font-bold" type="submit" value="Update profile">
    </form>
</div>
        @endif
</main>
@endsection