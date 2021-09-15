<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "address",
        "phone",
        "fullname",
        "user_id",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
    ];

    public function getFullnameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function setFullnameAttribute($value)
    {
        $this->attributes["fullname"] = $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
