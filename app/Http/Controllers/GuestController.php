<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
        return view("account.index");
    }

    public function create(Request $request)
    {
        Guest::firstOrcreate([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "address" => $request->address,
            "phone" => $request->phone,
            "user_id" => auth()->user()->id,
        ]);

        return view("account.index");
    }

    public function update(Request $request)
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

        return redirect()->route("account.index");
    }
}
