<?php

namespace App\Models;

use App\Enums\WorkerStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Worker extends BaseModel
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

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function workerReview()
    {
        return $this->hasOne(WorkerReview::class);
    }

    public function reservationReviews()
    {
        return $this->hasMany(ReservationReview::class);
    }

    public function album()
    {
        return $this->morphMany(Album::class, 'album');
    }

    public function workingTime()
    {
        return $this->hasMany(WorkingTime::class);
    }

    public function scopeOnlyActive($query)
    {
        return $query->where('status', WorkerStatus::ACTIVE);
    }

    public function getAvatarUrlAttribute()
    {
        $isSocialAvatar = substr($this->avatar, 0, 4) === 'http';

        return $this->avatar ? ($isSocialAvatar ? $this->avatar : asset(Storage::disk()->url($this->avatar))) : null;
    }

    public function getCovidEvidenceUrlAttribute()
    {
        return asset(Storage::disk()->url($this->covid_evidence));
    }

    public function getDailyHourFromFormatAttribute()
    {
        return $this->daily_hour_from ? Carbon::parse($this->daily_hour_from)->format('H:i') : null;
    }

    public function getDailyHourToFormatAttribute()
    {
        return $this->daily_hour_to ? Carbon::parse($this->daily_hour_to)->format('H:i') : null;
    }
}
