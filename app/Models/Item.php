<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['codigo', 'nombre', 'stock', 'unidad'];

    public function inventoryEntries()
    {
        return $this->hasMany(InventoryEntry::class, 'item_codigo', 'codigo');
    }

    public function inventoryOutputs()
    {
        return $this->hasMany(InventoryOutput::class, 'item_codigo', 'codigo');
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class, 'item_codigo', 'codigo');
    }
}