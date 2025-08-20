<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgSubresource extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'code',
        'name',
        'lg_budget_id',
        'quantity',
        'measure',
        'price',
        'clasification',
        'g_subcertificate_id',
        'g_activity_id',
        'lg_product_id',
        'g_certificate_id',
        'g_phase_id'
    ];

    public function lgBudget()
    {
        return $this->belongsTo(lgBudget::class);
    }

    public function gSubcertificate()
    {
        return $this->belongsTo(GSubcertificate::class);
    }
    public function gActivity()
    {
        return $this->belongsTo(GActivity::class);
    }

    public function gCertificate()
    {
        return $this->belongsTo(GCertificate::class);
    }
    public function gPhase()
    {
        return $this->belongsTo(GPhase::class);
    }
    
}
