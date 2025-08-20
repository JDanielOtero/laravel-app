<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class AcPaymentOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'order_status',
        'user_id',
        'user_revision_id',
        'user_complete_id',
        'currency',
        'fx_rate',
        'due_date',
        'rh_bank_id',
        'note',
        'payment_type',
        'payment_method',
        'supplier_ruc',
        'lg_costcenter_id',
        'amount',
        'bill_status',
        'check_guide',
        'check_guide_trans',
        'check_order',
        'check_quote',
        'check_deduction',
        'check_execution',
        'deduction_number',
        'deduction_operation',
        'expedient_check',
        'type',
        'rh_worker_id',
        'input_rq',
        'priority',
        'reference_id',
        'general_file',
        'final_date',
        'payment_reference',
        'revision_date',
        'check_fisical_docs',
        'lg_budget_detail_id',
        'g_order_id',
        'type_desk',
        'mark',
        'closed_amount',
        'payment_file',
        'small_desk_status',
        'small_desk_file',
        'small_desk_note',
        'small_desk_method',
        'lg_service_requirement_id',
        'closed_amount_reg',
        'ac_debt_id',
        'debt_code',
        'budget_type',
        'lg_budget_id',
        'payment_date',
        'vaucher_file',
        'vaucher_number',
        'pr_subcategory_id',
        'igv',
        'category_id',
        'reject_reason',
        'budget_status',
        'ac_projection_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userRevision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function user_complete()
    {
        return $this->belongsTo(User::class, 'user_complete_id');
    }
    public function rhBank()
    {
        return $this->belongsTo(RhBank::class);
    }
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function lgPayments()
    {
        return $this->hasMany(LgPayment::class);
    }
    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class, 'supplier_ruc', 'document_number');
    }

    public function LgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function acPaymentHistoricals()
    {
        return $this->hasMany(AcPaymentHistorical::class);
    }

    public function coments()
    {
        return $this->morphMany(Coment::class, 'comentable');
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function acPaymentOrder()
    {
        return $this->belongsTo(AcPaymentOrder::class, 'payment_reference');
    }
    public function rhFixedValue()
    {
        return $this->belongsTo(RhFixedvalue::class, 'reference_id');
    }
    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    public function acDebt()
    {
        return $this->belongsTo(AcDebt::class);
    }
    public function prSubcategory()
    {
        return $this->belongsTo(PrSubcategory::class);
    }
    public function acPaymentColaborators()
    {
        return $this->hasMany(AcPaymentColaborator::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function acHolding()
    {
        return $this->hasOne(AcHolding::class);
    }

    public function acProjection()
    {
        return $this->belongsTo(AcProjection::class);
    }
    public function uncles()
    {
        return $this->hasMany(AcPaymentOrder::class, 'payment_reference')
            ->where('type_desk', 'UNCLE');
    }

    public function children()
    {
        return $this->hasMany(AcPaymentOrder::class, 'payment_reference')
            ->where('type_desk', 'CHILD');
    }
}
