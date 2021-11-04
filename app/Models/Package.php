<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $fillable = ["name", "price", "is_task", "name_price"];

    public function getNamePriceAttribute()
    {
        return $this->name . " €" . $this->price;
    }

    public function setNamePriceAttribute($value)
    {
        $this->attributes["name_price"] = $value;
    }

    public function packages()
    {
        return $this->hasMany(\App\Models\Package::class);
    }
}
