<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;

class FindRoomController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input("q");

        // NOTE: this is a Backpack helper that parses your form input into an usable array.
        $form = backpack_form_input("form");

        // if no check in/out has been selected, show no options
        if (!$form["check_in"] || !$form["check_out"]) {
            return [];
        }

        // if a check in/out has been selected, only show rooms available
        if ($form["check_in"] && $form["check_out"]) {
            $check_in = $form["check_in"];
            $check_out = $form["check_out"];
            $roomType = $form["roomtype_id"];
            $adults = $form["adults"];
            $children = $form["children"];

            $availableRooms = Room::with("reservations")
                ->whereHas("reservations", function ($q) use (
                    $check_in,
                    $check_out,
                    $roomType,
                    $adults,
                    $children
                ) {
                    $q->whereNotBetween("check_in", [$check_in, $check_out])
                        ->orWhere("check_in", "=", $check_out)
                        ->WhereNotBetween("check_out", [$check_in, $check_out])
                        ->orWhere("check_out", "=", $check_in)
                        ->where("is_clean", true)
                        ->where("available", true)
                        ->where("maximum_adults", "<=", $adults)
                        ->where("maximum_children", "<=", $children)
                        ->where("roomtype_id", $roomType)
                        ->orderBy("room_number", "asc");
                })
                ->orWhereDoesntHave("reservations")
                ->where("roomtype_id", $roomType)
                ->where("is_clean", true)
                ->where("available", true)
                ->where("maximum_adults", "<=", $adults)
                ->where("maximum_children", "<=", $children)
                ->orderBy("room_number", "asc");
        }

        if ($search_term) {
            $results = $availableRooms
                ->where("room_number", "LIKE", "%" . $search_term . "%")
                ->paginate(10);
        } else {
            $results = $availableRooms->paginate(10);
        }

        return $results;
    }

    public function show($id)
    {
        return Room::find($id);
    }
}
