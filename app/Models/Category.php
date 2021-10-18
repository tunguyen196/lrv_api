<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'options',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}
