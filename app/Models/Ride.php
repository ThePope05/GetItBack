<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'destination',
        'status',
        'completed_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
