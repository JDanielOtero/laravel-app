<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedTsAmount extends Model
{
    use HasFactory;

    protected $fillable = [
        'closed_ts_member_id',
        'salary',
        'month_days',
        'daily_amount',
        'worked_amount',
        'rest_amount',
        'vacation_amount',
        'holi_amount',
        'disability_amount',
        'medical_amount',
        'paternity_amount',
        'maternity_amount',
        'compensated_amount',
        'other_licence_amount',
        'holi_worked_amount',
        'all_worked_amount',
        'family_assignation',
        'total_amount',
        'pension_type',
        'pension_mandatory',
        'pension_comission',
        'pension_seg',
        'neto_amount',
        'essalud_amount',
        'refund_amount',
        'compensated_vacation_amount',
        'truncate_vacations_amount',
        'gratification_amount',
        'bonus_amount',
        'cts_amount',
        'aurum_amount',
        'profit_amount',
        'judical_discount',
        'other_discount',
        'category5_amount',
        'rpc_discount',
        'vidaley_amount',
    ];


    public function closedTsMember()
    {
        return $this->belongsTo(ClosedTsMember::class);
    }
}
