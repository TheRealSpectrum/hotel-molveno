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
            $availableRooms = Room::getAvailableRooms($form);

            $arrAvailableRoomIds = [];
            foreach ($availableRooms as $availableRoom) {
                array_push($arrAvailableRoomIds, $availableRoom->id);
            }

            $availableRoomsQuery = Room::whereIn("id", $arrAvailableRoomIds);

            if ($search_term) {
                $results = $availableRoomsQuery
                    ->where("room_number", "LIKE", "%" . $search_term . "%")
                    ->paginate(10);
            } else {
                $results = $availableRoomsQuery->paginate(10);
            }

            return $results;
        }
    }
    public function show($id)
    {
        return Room::find($id);
    }
}
