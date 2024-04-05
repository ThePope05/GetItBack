<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'origin_id',
        'destination_id',
        'distance',
        'status',
        'completed_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function origin_address()
    {
        return $this->belongsTo(Address::class, 'origin_id');
    }

    public function destination_address()
    {
        return $this->belongsTo(Address::class, 'destination_id');
    }
}
