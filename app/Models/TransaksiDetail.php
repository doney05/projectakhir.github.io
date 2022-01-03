<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiDetail extends Model
{
    use SoftDeletes;

    protected $table = 'transaction_details';
    protected $fillable = [
        'transactions_id', 'username', 'nationality', 'is_visa', 'doe_passport'
    ];
    
    protected $hidden= [

    ];
    //table relasi

    public function transaction(){
        return $this->belongsTo(Transaksi::class, 'transactions_id', 'id');
    }
    use HasFactory;
}