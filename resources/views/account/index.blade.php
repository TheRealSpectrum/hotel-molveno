@include("partials.header")

<main>
    <form action="{{ route("account.store") }}" method="post">
        @csrf
        @if (auth()->user()->guest)
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
        @else
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
        @endif
     <input type="submit" value="Update profile">
    </form>
</main>


@include("partials.footer")