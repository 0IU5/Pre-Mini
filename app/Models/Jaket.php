<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaket extends Model
{
    use HasFactory;

    protected $table = 'jaket';
    protected $primaryKey = 'id_jaket';

    protected $fillable = [
        'hari',
        'id_paket',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');  
    }
}
