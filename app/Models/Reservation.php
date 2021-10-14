<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;
use App\Models\Document;

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
        "roomtype_id",
        "check_in",
        "check_out",
        "adults",
        "children",
        "total_price",
        "check_in_status",
        "check_out_status",
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
        "roomtype_id" => "integer",
        "check_in" => "datetime",
        "check_out" => "datetime",
        "adults" => "integer",
        "children" => "integer",
        "check_in_status" => "boolean",
        "check_out_status" => "boolean",
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

    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function setDocuments()
    {
        dd("blabla");
    }

    public function setDocument()
    {
        dd("geen s");
    }
}
