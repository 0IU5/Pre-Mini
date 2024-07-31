<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'id_student';
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable = [
        'no_hp',
        'alamat',
        'kelas',
        'tanggal_lahir',
        'id', 
        'photo_profil',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
