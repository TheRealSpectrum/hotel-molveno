<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["name", "price", "room_surface", "name_price"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
    ];

    public function rooms()
    {
        return $this->hasMany(\App\Models\Room::class);
    }

    public function getNamePriceAttribute()
    {
        return $this->name . " €" . $this->price . " per night";
    }

    public function setNamePriceAttribute($value)
    {
        $this->attributes["name_price"] = $value;
    }
}
