<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'type',
        'note',
        'user_revision_id',
        'file_url',
        'type_input',
        'lg_place_id',
        'motive',
        'lg_from_place_id',
        'lg_requirement_id',
        'init_date',
        'final_date',
        'lg_costcenter_id',
        'from_lg_costcenter_id',
        'guide_id',
        'rh_worker_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userRevision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
    public function stockHistoricals()
    {
        return $this->hasMany(StockHistorical::class);
    }
    public function lgRequirement()
    {
        return $this->belongsTo(LgRequirement::class);
    }
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}
