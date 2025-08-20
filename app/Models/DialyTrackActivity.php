<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialyTrackActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'dialy_track_id', // id del daily track
        'status', // estado finalizado, en proceso, detenido
        'note', // descripcion de la actividad
        'percentage', // porcentaje de avance
        'assigned_workers', // numero de trabajadores asignados
        'file', // archivo de la actividad
        'comments',
        'reference_id',
    ];
    public function dialyTrack()
    {
        return $this->belongsTo(DialyTrack::class);
    }
}
