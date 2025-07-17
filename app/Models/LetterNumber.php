<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_carta',
        'user_ci',
        'observacion'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ci', 'ci');
    }
}