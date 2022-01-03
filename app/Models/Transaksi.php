<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;

    protected $table ='transactions';
    protected $fillable = [
        'travel_packages_id','pembeli', 'additional_visa',
        'transaction_total', 'transaction_status'
    ];
    protected $hidden= [

    ];
    //table relasi
    public function details(){
        return $this->hasMany(TransaksiDetail::class, 'transactions_id', 'id');
    }

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
    use HasFactory;
}
