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
        'id_paket', 
        'tanggal_transaksi',
        'nama',
        'no_hp'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id_jadwal');
    }
}
