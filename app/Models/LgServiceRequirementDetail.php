<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgServiceRequirementDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'type',
        'lg_service_requirement_id',
        'lg_service_id',
        'quantity',
        'price',
        'note',
        'lg_supplier_id',
        'purchase_revision_id',
        'purchase_accept_id',
        'file_url'
    ];
    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    public function lgService()
    {
        return $this->belongsTo(lgService::class);
    }
    public function lgSupplier()
    {
        return $this->belongsTo(lgSupplier::class);
    }
    public function purchaseRevision()
    {
        return $this->belongsTo(User::class, 'purchase_revision_id');
    }
    public function purchaseAccept()
    {
        return $this->belongsTo(User::class, 'purchase_accept_id');
    }
}
