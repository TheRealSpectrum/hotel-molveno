<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;
use App\Models\Room;

class Reservation extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "guest_id",
        "room_id",
        "check_in",
        "check_out",
        "amount",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "guest_id" => "integer",
        "room_id" => "integer",
        "check_in" => "date",
        "check_out" => "date",
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(
            \App\Models\Room::class,
            "reservation_room"
        );
    }
}
