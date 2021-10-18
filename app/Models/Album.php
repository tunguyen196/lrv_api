<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'albumable_type',
        'albumable_id',
        'url',
        'description',
    ];

    public function albumable()
    {
        return $this->morphTo();
    }

    // public function getFullUrlAttribute()
    // {
    //     return asset(Storage::disk()->url($this->url));
    // }
}
