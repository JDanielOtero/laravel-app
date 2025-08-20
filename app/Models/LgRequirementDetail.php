<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgRequirementDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_requirement_id',
        'lg_product_id',
        'quantity',
        'price',
        'status',
        'referral_status',
        'location',
        'supplier_ruc',
        'bill_number',
        'bill_date',
        'supplier_name',
        'reason',
        'note',
        'payment_metoth',
        'prev_status',
        'new_quantity',
        'hours_delivery',
        'hours_transport',
        'hours_credit',
        'file',
        'guide_id',
        'supplier_guide',
        'certificate_file',
        'last_comment',
        'income_quantity',
        'lg_prerequirement_detail_id',
        'g_activity_id',
        'status_changed',
        'reference_id',
        'purchase_revision_id',
        'purchase_accept_id',
        'sales_price',
        'valorization',
        'old_lg_product_id',
        'igv',
        'reject_reason'
    ];

    public function lgPrerequirementDetail()
    {
        return $this->belongsTo(LgPrerequirementDetail::class);
    }
    public function lgRequirement()
    {
        return $this->belongsTo(LgRequirement::class);
    }

    public function LgRequirementHistoricals()
    {
        return $this->hasMany(LgRequirementHistorical::class);
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function lgPurchaseFiles()
    {
        return $this->hasMany(LgPurchaseFile::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class, 'supplier_ruc', 'document_number');
    }
    public function lgPayment()
    {
        return $this->hasOne(LgPayment::class);
    }

    public function coments()
    {
        return $this->morphMany(Coment::class, 'comentable');
    }

    public function purchaseRevision()
    {
        return $this->belongsTo(User::class, 'purchase_revision_id');
    }

    public function purchaseAccept()
    {
        return $this->belongsTo(User::class, 'purchase_accept_id');
    }

    public function guideDetail()
    {
        return $this->hasOne(GuideDetail::class);
    }
    public function qualityFiles()
    {
        return $this->hasMany(QualityFile::class);
    }
}
