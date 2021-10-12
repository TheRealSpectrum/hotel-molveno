<?php

namespace App\Http\Controllers\Admin;
use App\Models\Reservation;
use App\Http\Controllers\Controller;

class CheckInOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $reservation = Reservation::find($id);
        return view("booking.checkin");
        // if ($reservation->check_in_status == 0) {
        //     //tussenstap formulier invullen en documenten opslaan
        //     $reservation->update(["check_in_status" => 1]);
        //     $reservation->save();
        //     return redirect()->back();
        // } elseif ($reservation->check_out_status == 0) {
        //     $reservation->update(["check_out_status" => 1]);
        //     $reservation->save();
        //     return redirect()->back();
        // }
    }
    public function checkin()
    {
        return view("booking.checkin");
    }
}
