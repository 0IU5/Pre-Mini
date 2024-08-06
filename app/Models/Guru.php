<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model.
     *
     * @var string
     */
    protected $table = 'guru';

    /**
     * Kunci primer tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id_guru';

    /**
     * Atribut yang dapat diisi massal.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'id_mapel',
        'umur',
        'foto',
        'pendidikan_terakhir',
    ];

    /**
     * Menyembunyikan atribut dari array atau JSON output.
     *
     * @var array
     */
    protected $hidden = [
        // Jika ada atribut yang ingin disembunyikan dari JSON output
    ];

    /**
     * Menentukan apakah model harus menggunakan timestamp Eloquent.
     *
     * @var bool
     */
    public $timestamps = true;
    
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id_jadwal');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
    }
    
    
}
