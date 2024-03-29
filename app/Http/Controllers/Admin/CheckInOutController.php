<?php

namespace App\Http\Controllers\Admin;
use App\Models\Reservation;
use App\Models\Document;
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
        if ($reservation->check_in_status == 0) {
            $reservation->update(["check_in_status" => 1]);
            $reservation->save();
            return redirect(backpack_url("/reservation/{$id}/edit"));
        } elseif ($reservation->check_out_status == 0) {
            foreach ($reservation->rooms as $room) {
                $room->update(["is_clean" => 0]);
                $room->save();
            }
            $reservation->update(["check_out_status" => 1]);
            $reservation->save();
            return redirect()->back();
        }
    }

    public function documentUpdate($id)
    {
        return redirect(backpack_url("/reservation/{$id}/edit"));
    }
}
