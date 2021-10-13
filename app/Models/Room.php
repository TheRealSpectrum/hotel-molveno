<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "room_number",
        "is_clean",
        "available",
        "maximum_guests",
        "roomtype_id",
        "notes",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "is_clean" => "boolean",
        "maximum_adults" => "integer",
        "maximum_children" => "integer",
        "roomtype_id" => "integer",
        "notes" => "string",
    ];

    public function roomtype()
    {
        return $this->belongsTo(\App\Models\Roomtype::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(\App\Models\Reservation::class);
    }

    protected static function getAvailableRooms($data)
    {
        $availableRooms = collect();
        $roomsRooms = Room::with("reservations")
            ->where("available", true)
            ->get();

        foreach ($roomsRooms as $room) {
            $available = true;
            foreach ($room->reservations as $reservation) {
                if (
                    ($reservation->check_in->gte(
                        Carbon::createFromFormat(
                            "Y-m-d H:i:s",
                            $data["check_in"]
                        )
                    ) &&
                        $reservation->check_in->lte(
                            Carbon::createFromFormat(
                                "Y-m-d H:i:s",
                                $data["check_out"]
                            )
                        )) ||
                    ($reservation->check_out->gte(
                        Carbon::createFromFormat(
                            "Y-m-d H:i:s",
                            $data["check_in"]
                        )
                    ) &&
                        $reservation->check_out->lte(
                            Carbon::createFromFormat(
                                "Y-m-d H:i:s",
                                $data["check_out"]
                            )
                        ))
                ) {
                    $available = false;
                }
            }
            if ($available) {
                $availableRooms->push($room);
            }
        }

        return $availableRooms;
    }
}
