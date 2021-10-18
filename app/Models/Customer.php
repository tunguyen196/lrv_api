<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Customer extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // public function getAvatarUrlAttribute()
    // {
    //     $isSocialAvatar = substr($this->avatar, 0, 4) === 'http';

    //     return $this->avatar ? ($isSocialAvatar ? $this->avatar : asset(Storage::disk()->url($this->avatar))) : null;
    // }
}
