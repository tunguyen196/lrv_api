<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use App\Enums\ReservationStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\PaymentMethod;

class Reservation extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'worker_id',
        'customer_name',
        'status',
        'service_id',
        'memo',
    ];

    protected $dates = [
        'cancelled_at',
    ];

    protected $casts = [
        'cancelled_at' => 'datetime:Y-m-d',
    ];



    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function album()
    {
        return $this->morphOne(Album::class, 'album');
    }

    public function scopeStatusDone($query)
    {
        return $query->whereIn('status', [ReservationStatus::DONE]);
    }

    public function scopeStatusWaiting($query)
    {
        return $query->whereIn('status', [ReservationStatus::WAITING]);
    }
}
