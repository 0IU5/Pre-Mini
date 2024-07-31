<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $primaryKey = 'id_feedback';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id', 
        'feedback',
        'tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
