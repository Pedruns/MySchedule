<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion',
        'fecha_final', 'clase_id'
    ];

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }
    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }
}
