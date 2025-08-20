<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsFifthTax extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'status',
        'user_id',
        'init_date',
        'init_month',
        'month_amount',
        'grat_july_amount',
        'grat_dec_amount',
        'bon_july_amount',
        'bon_dec_amount',
        'total_historical',
        'total_fifth_historical',
        'total_amount',
        'eight_percent_fee',
        'fourteen_percent_fee',
        'seventeen_percent_fee',
        'total_fee',
        'total_payed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
