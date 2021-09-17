@extends("layouts.app")
@section("title", "Molveno Resort - My Account")

@section("content")

<main>
    @if (auth()->user()->guest)
    <form action="{{ route("account.update") }}" method="post">
        @method("patch")
        @csrf
        <label for="first_name">first name</label>
        <input type="text" name="first_name" id="" value="{{ auth()->user()->guest->first_name }}">

        <label for="last_name">last name</label>
        <input type="text" name="last_name" id="" value="{{ auth()->user()->guest->last_name }}">

        <label for="email">email</label>
        <input type="email" name="email" id="" value="{{ auth()->user()->guest->email }}">

        <label for="address">address</label>
        <input type="text" name="address" id="" value="{{ auth()->user()->guest->address }}">

        <label for="phone">phone number</label>
        <input type="text" name="phone" id="" value="{{ auth()->user()->guest->phone }}">
        <input type="submit" value="Update profile">
    </form>
        @else
    <form action="{{ route("account.create") }}" method="post">
        @csrf
        <label for="first_name">first name</label>
        <input type="text" name="first_name" id="" >

        <label for="last_name">last name</label>
        <input type="text" name="last_name" id="">

        <label for="email">email</label>
        <input type="email" name="email" id="">

        <label for="address">address</label>
        <input type="text" name="address" id="">

        <label for="phone">phone number</label>
        <input type="text" name="phone" id="">

        <input type="submit" value="Update profile">
    </form>
        @endif
</main>
@endsection