<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'location',
        'departure_date', 'duration',
        'type', 'price'
    ];
}
