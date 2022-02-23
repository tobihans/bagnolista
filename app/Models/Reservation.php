<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     * @var array<int, string>
     */
    protected $fillable = [
        'duration',
        'starts_at',
        'total_amount',
    ];

    /**
     * Casted attributes
     * @var array<string, string>
     */
    protected $casts = [
        'starts_at' => 'datetime',
    ];
}
