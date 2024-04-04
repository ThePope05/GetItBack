<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'street',
        'house_number',
        'postal_code',
        'city',
        'country',
        'phone_number',
        'kvk_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
