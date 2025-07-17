<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOutput extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_codigo',
        'cantidad',
        'user_ci',
        'departamento_id',
        'fecha',
        'observacion'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_codigo', 'codigo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ci', 'ci');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}