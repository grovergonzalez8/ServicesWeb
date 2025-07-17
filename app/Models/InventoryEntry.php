<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_codigo',
        'cantida',
        'user_ci',
        'fecha',
        'observacion'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function item()
    {
        return $this->belogsTo(Item::class, 'item_codigo', 'codigo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ci', 'ci');
    }
}