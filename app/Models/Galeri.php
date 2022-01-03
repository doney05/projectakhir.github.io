<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeri extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id',  'image',
    ];
    protected $hidden= [

    ];
    //table relasi
    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
    use HasFactory;
}
