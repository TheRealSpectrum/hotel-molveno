<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\UpdateGuestAccountRequest;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Roomtype;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view("booking.step1");
    }

    public function step2(BookingRequest $request)
    {
        $data = [
            "check_in" => $request->get("check_in"),
            "check_out" => $request->get("check_out"),
            "adults" => $request->get("adults"),
            "children" => $request->get("children"),
            "room_amount" => $request->get("room_amount"),
        ];
        $rooms = Room::getAvailableRooms($data);
        $roomTypes = Roomtype::all();
        $packages = Package::all();
        if ($data["room_amount"] > $rooms->count()) {
            return redirect()
                ->back()
                ->with(
                    "error",
                    "There are not enough rooms available on this date."
                );
        } else {
            return view(
                "booking.step2",
                compact("rooms", "roomTypes", "data", "packages")
            );
        }
    }

    public function step3(Request $request)
    {
        $data = [
            "check_in" => $request->get("check_in"),
            "check_out" => $request->get("check_out"),
            "adults" => $request->get("adults"),
            "children" => $request->get("children"),
            "room_amount" => $request->get("room_amount"),
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

        $packages = [];
        $packagesCount = Package::max("id");

        for ($j = 1; $j <= $packagesCount; $j++) {
            if ($request->get("package" . $j) != null) {
                array_push(
                    $packages,
                    Package::find($request->get("package" . $j))
                );
            }
        }

        $rooms = Room::getAvailableRooms($data);
        $rooms1 = collect($rooms);
        $rooms2 = collect();
        $amountRooms = 0;
        $totalGuests = $data["adults"] + $data["children"];

        foreach ($roomTypesKeyValue as $key => $value) {
            $amountRooms += $value;
            if ($value == 1) {
                $rooms2->push(
                    $rooms1
                        ->where("maximum_guests", ">=", $totalGuests)
                        ->where("roomtype_id", $key)
                        ->take($value)
                );
            } elseif ($value > 1) {
                $rooms2->push(
                    $rooms1->where("roomtype_id", $key)->take($value)
                );
            }
        }

        $roomIDsToBook = [];
        $roomsCapacity = [];
        foreach ($rooms2 as $room2) {
            foreach ($room2 as $room) {
                array_push($roomIDsToBook, $room->id);
                array_push($roomsCapacity, $room->maximum_guests);
            }
        }

        $roomsToBook = Room::whereIn("id", $roomIDsToBook)->get();

        // Calculate total price
        $totalPrice = 0;
        $totalDays = (int) ceil(
            Carbon::parse($data["check_in"])->floatDiffInDays(
                Carbon::parse($data["check_out"])
            )
        );

        foreach ($roomsToBook as $roomToBook) {
            $totalPrice += $roomToBook->roomtype->price * $totalDays;
        }

        foreach ($packages as $package) {
            $totalPrice += $package->price;
        }

        // Error checks
        if ($amountRooms < $data["room_amount"]) {
            return redirect()
                ->back()
                ->with(
                    "error",
                    "Please select " .
                        $data["room_amount"] -
                        $amountRooms .
                        " more room(s)."
                );
        } elseif ($amountRooms > $data["room_amount"]) {
            return redirect()
                ->back()
                ->with("error", "You have selected too many rooms.");
        } elseif (array_sum($roomsCapacity) < $totalGuests) {
            return redirect()
                ->back()
                ->with(
                    "error",
                    "There is not enough capacity in " .
                        $data["room_amount"] .
                        " room(s) for this reservation, please try again with different room type(s) or select more rooms."
                );
        } elseif (count($roomsToBook) < $data["room_amount"]) {
            return redirect()
                ->back()
                ->with(
                    "error",
                    "There are not enough rooms of this room type available on the selected dates, please try again with different room types."
                );
        } else {
            return view(
                "booking.step3",
                compact("data", "roomsToBook", "totalPrice", "packages")
            );
        }
    }

    public function personalInfo(UpdateGuestAccountRequest $request)
    {
        if (!Auth::user()) {
            $guest = Guest::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "address" => $request->address,
                "phone" => $request->phone,
                "user_id" => null,
            ]);
            // } elseif (Auth::user() && !Auth::user()->guest) {
            //     $guest = Guest::create([
            //         "first_name" => $request->first_name,
            //         "last_name" => $request->last_name,
            //         "email" => $request->email,
            //         "address" => $request->address,
            //         "phone" => $request->phone,
            //         "user_id" => auth()->user()->id,
            //     ]);
        } else {
            $guest = Guest::where("user_id", auth()->user()->id)->firstOrFail();
        }

        $data = [
            "check_in" => $request->input("check_in"),
            "check_out" => $request->input("check_out"),
            "adults" => $request->input("adults"),
            "children" => $request->input("children"),
            "room_amount" => $request->input("room_amount"),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "address" => $request->address,
            "phone" => $request->phone,
            "user_id" => auth()->user()->id ?? null,
            "roomtypes" => $request->roomtypes,
            "total_price" => $request->input("total_price"),
            "room_id" => $request->room_id,
            "guest_id" => $guest->id,
            "packages" => $request->packages,
            "package_id" => $request->package_id,
        ];

        $roomTypeNames = array_count_values($data["roomtypes"]);
        if (isset($data["packages"])) {
            $packageNames = array_count_values($data["packages"]);
        } else {
            $packageNames = ["none"];
        }

        return view(
            "booking.step4",
            compact("data", "roomTypeNames", "packageNames")
        );
    }

    public function confirmBooking(Request $request)
    {
        $roomIDsToBook = $request->room_id;
        $packageIDsToBook = $request->package_id ?? [];

        $reservation = Reservation::create([
            "check_in" => $request->check_in,
            "check_out" => $request->check_out,
            "adults" => $request->adults,
            "children" => $request->children,
            "roomtype_id" => 1,
            "guest_id" => $request->guest_id,
            "total_price" => $request->total_price,
        ]);

        foreach ($roomIDsToBook as $roomIDToBook) {
            $reservation->rooms()->attach($roomIDToBook);
        }

        foreach ($packageIDsToBook as $packageIDsToBook) {
            $reservation->packages()->attach($packageIDsToBook);
        }

        return redirect()
            ->back()
            ->with("success", "Reservation successful");
    }
}
