<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable = [
        'paket',
        'deskripsi',
        'harga',
    ];

    public function payment()
    {
        return $this->hasMany(Payment::class,'id_payment');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id_jadwal');
    }
}
