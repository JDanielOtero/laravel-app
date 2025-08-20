<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'tr_vehicle_id',
        'status',
        'document_type',
        'document_number',
        'company',
        'init_date',
        'document_status',
        'amount',
        'currency',
        'user_id',
        'file',
        'url',
        'certificate_init_date',
        'itv_end_date',
        'tctm_end_date',
        'soat_end_date',
        'poliza_end_date',
        'msa_end_date',
    ];

    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
