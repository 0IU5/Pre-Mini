<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'hari',
        'start_time',
        'end_time',
        'id_paket',
        'id_mapel',
        'id_guru',
        'id_payment',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }
}
