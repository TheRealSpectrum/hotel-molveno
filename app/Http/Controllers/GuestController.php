<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGuestAccountRequest;
use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where(
            "guest_id",
            auth()->user()->guest->id
        )->get();

        return view("account.index", compact("reservations"));
    }

    public function create(UpdateGuestAccountRequest $request)
    {
        Guest::firstOrcreate([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "address" => $request->address,
            "phone" => $request->phone,
            "user_id" => auth()->user()->id,
        ]);

        return redirect()
            ->route("account.index")
            ->with("success", "Updated Profile");
    }

    public function update(UpdateGuestAccountRequest $request)
    {
        $guest = guest::find(Auth::user()->guest->id);

        $guest->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "address" => $request->address,
            "phone" => $request->phone,
            "user_id" => auth()->user()->id,
        ]);

        return redirect()
            ->route("account.index")
            ->with("success", "Updated Profile");
    }
}
