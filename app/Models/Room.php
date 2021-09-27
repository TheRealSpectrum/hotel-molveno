<?php

namespace App\Models;

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
        return Room::with("reservations")
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
            })
            ->orWhereDoesntHave("reservations")
            ->where("available", true);
    }
}
