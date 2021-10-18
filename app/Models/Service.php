<?php

namespace App\Models;

use App\Enums\ServiceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
    ];


    public function reservations($query)
    {
        return $this->hasMany(Reservation::class);
    }
}
