<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'kvk_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
