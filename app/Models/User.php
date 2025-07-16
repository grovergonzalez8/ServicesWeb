<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ci';
    public $incrementing = false;
    protected $ketType = 'integer';

    protected $fillable = [
        'ci',
        'nombre',
        'pasword',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function inventoryEntries()
    {
        return $this->hasMany(InventoryEntry::class, 'user_ci', 'ci');
    }

    public function inventoryOutputs()
    {
        return $this->hasMany(InventoryOutput::class, 'user_ci', 'ci');
    }

    public function sealNumbers()
    {
        return $this->hasMany(SealNumber::class, 'user_ci', 'ci');
    }

    public function letterNumbers()
    {
        return $this->hasMany(LetterNumber::class, 'user_ci', 'ci');
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class, 'user_ci', 'ci');
    }
}