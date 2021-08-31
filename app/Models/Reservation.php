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
<<<<<<< HEAD
    protected $fillable = ["check_in", "check_out", "guest_id", "amount"];
=======
    protected $fillable = ["guest_id", "room_id", "check_in", "check_out"];
>>>>>>> 23a3fc87dca09a0f4edfa1642e3f4422438ee3ec

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
        return $this->belongsToMany(Room::class, "reservation_room");
    }
}
