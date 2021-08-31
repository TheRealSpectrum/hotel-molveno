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
        "max_guests",
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
        "roomtype_id" => "integer",
    ];

    public function roomtype()
    {
        return $this->belongsTo(\App\Models\Roomtype::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class, "room_id");
    }
}
