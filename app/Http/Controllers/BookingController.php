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
    public function step3()
    {
        dd(typeof(request()->get("room_type1")));
        $data = [
            "check_in" => request()->get("check_in"),
            "check_out" => request()->get("check_out"),
            "adults" => request()->get("adults"),
            "children" => request()->get("children"),
            "room_amount" => request()->get("room_amount"),
            "room_type" => [""],
        ];

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
                    ->where("available", true)
                    // ->where("maximum_adults", ">=", $adults)
                    // ->where("maximum_children", ">=", $children)
                    ->where("roomtype_id", $roomType)
                    ->orderBy("room_number", "asc");
            })
            ->orWhereDoesntHave("reservations")
            ->where("roomtype_id", $roomType)
            ->where("available", true)
            // ->where("maximum_adults", ">=", $adults)
            // ->where("maximum_children", ">=", $children)
            ->orderBy("room_number", "asc");
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
