<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LgPrerequirementDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_requirement_id',
        'lg_product_id',
        'quantity',
        'status',
        'modified',
        'note',
        'product_name',
        'product_type',
        'product_size',
        'product_model',
        'product_color',
        'product_brand',
        'product_measure',
        'lg_productParent_id',
        'deadline',
        'input',
        'amount',
        'price',
        'priority',
        'g_activity_id',
        'old_lg_product_id',
        'lg_budget_item_id',
        'discipline',
        'lg_budget_activity_id'
    ];

    public function lgRequirement()
    {
        return $this->belongsTo(LgRequirement::class);
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }

    public function lgRequirementDetails()
    {
        return $this->hasMany(LgRequirementDetail::class);
    }

    public function lgPurchaseFiles()
    {
        return $this->hasMany(LgPurchaseFile::class);
    }
    
    private const PRIORITY_DAYS_MAP = [
        1 => 1, 2 => 3, 3 => 7, 4 => 10, 5 => 20, 6 => 21,
    ];

    public function getStatusHtmlAttribute(): string
    {
        $statusClasses = [
            'PRE' => 'bg-lightblue',
            'PREA' => 'bg-teal',
            'PRER' => 'bg-pink',
            'PREM' => 'bg-orange',
            'E' => 'bg-info',
            'A' => 'bg-success',
        ];

        $statusTexts = [
            'PRE' => 'PREREQUERIMIENTO',
            'PREA' => 'PRE - APROBADO',
            'PRER' => 'PRE - RECHAZADO',
            'PREM' => 'PRE - MODIFICAR',
            'E' => 'EN ESPERA',
            'A' => 'APROBADO',
        ];

        $class = $statusClasses[$this->status] ?? 'bg-danger';
        $text = $statusTexts[$this->status] ?? 'RECHAZADO';

        return '<span class="badge ' . $class . '">' . $text . '</span>';
    }

    public function getNeededDateAttribute()
    {
        $date = Carbon::parse($this->deadline);
        $daysToSubtract = self::PRIORITY_DAYS_MAP[$this->priority] ?? 0;
        
        $calculatedDate = $date->subDays($daysToSubtract);
        
        return $calculatedDate->isPast() ? Carbon::now() : $calculatedDate;
    }

    public function getApproximateArrivalDateAttribute()
    {
        $firstDetail = $this->lgRequirementDetails()->first();

        if (!$firstDetail) {
            return null;
        }

        $date = Carbon::parse($firstDetail->created_at);
        $daysToAdd = self::PRIORITY_DAYS_MAP[$this->priority] ?? 0;

        return $date->addDays($daysToAdd);
    }
}