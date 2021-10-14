<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Document extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        "full_name",
        "date_of_birth",
        "document_type",
        "document_number",
        "document_expiration_date",
        "reservation_id",
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
