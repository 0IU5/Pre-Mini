<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';
    public $incrementing = true;
    protected $keyType = 'int'; 
    protected $fillable = [
        'mapel', 'deskripsi'
    ];

    // Tambahkan relasi ke model Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_mapel', 'id_mapel');
    }
}
