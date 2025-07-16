<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function inventoryOutputs()
    {
        return $this->hasMany(InventoryOutput::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
}