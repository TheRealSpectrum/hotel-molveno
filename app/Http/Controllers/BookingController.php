<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Roomtype;

class BookingController extends Controller
{
    public function index()
    {
        return view("booking.step1");
    }

    public function step2()
    {
        $data = [
            "check_in" => request()->get("check_in"),
            "check_out" => request()->get("check_out"),
            "adults" => request()->get("adults"),
            "children" => request()->get("children"),
            "room_amount" => request()->get("room_amount"),
        ];
        $roomTypes = Roomtype::all();
        return view("booking.step2", compact("roomTypes", "data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function step3(Request $request)
    {
        $data = [
            "check_in" => request()->get("check_in"),
            "check_out" => request()->get("check_out"),
            "adults" => request()->get("adults"),
            "children" => request()->get("children"),
            "room_amount" => request()->get("room_amount"),
        ];

        $roomTypes = Roomtype::all();
        $i = 1;
        $roomTypesArr = [];
        $roomTypeKeys = [];
        foreach ($roomTypes as $roomTypeAmount) {
            array_push($roomTypeKeys, $i);
            array_push($roomTypesArr, request()->get("room_type" . $i++));
        }
        $roomTypesKeyValue = array_combine($roomTypeKeys, $roomTypesArr);

        $rooms = Room::with("reservations")
            ->whereHas("reservations", function ($q) use ($data) {
                $q->whereNotBetween("check_in", [
                    $data["check_in"],
                    $data["check_out"],
                ])
                    ->WhereNotBetween("check_out", [
                        $data["check_in"],
                        $data["check_out"],
                    ])
                    ->where("available", true);
                // ->where("maximum_adults", ">=", $adults)
                // ->where("maximum_children", ">=", $children)
                // ->where("roomtype_id", 1)
                // ->orderBy("room_number", "asc");
            })
            ->orWhereDoesntHave("reservations")
            // ->where("roomtype_id", 1)
            ->where("available", true);
        // ->where("maximum_adults", ">=", $adults)
        // ->where("maximum_children", ">=", $children)
        // ->orderBy("room_number", "asc");

        $rooms1 = collect($rooms->get());
        $rooms2 = collect();

        foreach ($roomTypesKeyValue as $key => $value) {
            if ($value > 0) {
                $rooms2->push(
                    $rooms1->where("roomtype_id", $key)->take($value)
                );
            }
        }

        // $newArray = array_merge($rooms2->toArray()[0], $rooms2->toArray()[1]);
        $roomIDsToBook = [];
        foreach ($rooms2 as $room2) {
            foreach ($room2 as $room) {
                array_push($roomIDsToBook, $room->id);
            }

            // array_push($roomIDsToBook, $room2->id);
        }

        $roomsToBook = Room::whereIn("id", $roomIDsToBook)->get();

        dd($roomsToBook);

        return view("booking.step3", compact("data"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
