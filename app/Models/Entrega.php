<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubicacion', 'tarea_id',
        'fecha_entrega', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }
}
