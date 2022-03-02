<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function car() {
        return $this->belongsTo(Car::class);
    }
}
