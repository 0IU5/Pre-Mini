<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    protected $primaryKey = 'id_payment';
    public $incrementing = true; 
    protected $keyType = 'int';     
    protected $fillable = [
        'metode_pembayaran',
        'bukti_transaksi',
        'id', 
        'id_paket', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}
