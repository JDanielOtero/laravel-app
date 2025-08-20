<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LgRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'lg_budget_id',
        'user_id',
        'user_revision_id',
        'user_complete_id',
        'date',
        'lg_costcenter_id',
        'priority',
        'note',
        'reason',
        'location',
        'lg_place_id',
        'discipline_type',
        'specialty_type',
        'revision_date',
        'sustento_file',
        'g_order_id',
        'lg_service_requirement_id',
        'mp_id',
        'user_finish_id',
        'lg_kardex_worker_id'
    ];

    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }

    public function gOrder()
    {
        return $this->belongsTo(GOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_revision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function user_complete()
    {
        return $this->belongsTo(User::class, 'user_complete_id');
    }

    public function details()
    {
        return $this->hasMany(LgRequirementDetail::class)->orderBy('id', 'desc');
    }

    public function preDetails()
    {
        return $this->hasMany(LgPrerequirementDetail::class)->orderBy('id', 'desc');
    }

    public function LgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }

    public function LgMp()
    {
        return $this->belongsTo(LgCostcenter::class, 'mp_id');
    }

    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }

    public function lgKardexes()
    {
        return $this->hasMany(lgKardex::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    
    private const PRIORITY_HOURS_ATTENTION = [
        1 => 24, 2 => 72, 3 => 170, 4 => 240, 5 => 480, 6 => 600,
    ];

    private const PRIORITY_HOURS_RELEASE = [
        1 => 1, 2 => 5, 3 => 24, 4 => 72, 5 => 120, 6 => 144,
    ];

    public function getDeadlineDateAttribute()
    {
        if (!$this->revision_date) {
            return 'Pendiente';
        }
        $hours = self::PRIORITY_HOURS_ATTENTION[$this->priority] ?? 600;
        return Carbon::parse($this->revision_date)->addHours($hours)->format('Y-m-d H:i:s');
    }

    public function getReleaseDeadlineDateAttribute()
    {
        $hours = self::PRIORITY_HOURS_RELEASE[$this->priority] ?? 144;
        return Carbon::parse($this->created_at)->addHours($hours)->format('Y-m-d H:i:s');
    }
    
    public function getLatestAttentionDateAttribute()
    {
        return $this->details->first()->created_at ?? 'Pendiente';
    }

    public function getLeadTimeAttribute()
    {
        return self::calculateDateDifference(
            $this->revision_date,
            $this->getLatestAttentionDateAttribute()
        );
    }
    
    public function getReleaseTimeAttribute()
    {
        return self::calculateDateDifference($this->created_at, $this->revision_date);
    }

    private static function calculateDateDifference($start, $end): string
    {
        if (!$start || !$end || $end === 'Pendiente') {
            return 'Pendiente';
        }

        $startDate = Carbon::parse($start);
        $endDate = Carbon::parse($end);
        $diff = $startDate->diff($endDate);

        return "{$diff->days} días {$diff->h} horas";
    }
}