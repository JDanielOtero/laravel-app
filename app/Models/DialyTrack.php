<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialyTrack extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', // estado finalizado, en proceso, detenido
        'user_id', // usuario que crea el registro
        'date', // fecha del track
        'turn_type', // dia o noche
        'init_hour', // hora de inicio del track
        'supervisor_name', // nombre del supervisor
        'supervisor_dni', // dni del supervisor
        'area', //lista de areas
        'discipline', // lista de disciplinas
        'contractor', //lista de contratistas
        'incidents', // si se registraron incidentes true or false
        'incident_file', // archivo de incidentes
        'incident_desv', //tipo de desviacion
        'inspect_required', // total de inspecciones programadas
        'inspect_released', // total de inspecciones liberadas
        'inspect_rejected', // total de inspecciones rechazadas
        'inspect_not_released', // total de inspecciones no liberadas
        'comments',
        'reference_id',
        'version'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dialyTrackActivities()
    {
        return $this->hasMany(DialyTrackActivity::class);
    }
    public function scopeLastOfGroup($query)
    {
        return $query->where(function ($q) {
            // Es el primero (no tiene reference_id)
            $q->whereNull('reference_id');
        })->orWhere(function ($q) {
            // Es el último de su grupo (donde reference_id = id original)
            $q->whereIn('id', function ($sub) {
                $sub->selectRaw('MAX(id)')
                    ->from('dialy_tracks')
                    ->whereNotNull('reference_id')
                    ->groupBy('reference_id');
            });
        });
    }
}
