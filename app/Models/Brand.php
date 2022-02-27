<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
    ];

    public function cars() {
        return $this->hasMany(Car::class);
    }
}
