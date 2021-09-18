<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGuestAccountRequest;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
        return view("account.index");
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
