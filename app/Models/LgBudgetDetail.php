<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgBudgetDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'lg_budget_id',
        'description',
        'type',
        'lg_product_id',
        'lg_service_id',
        'job_profile_id',
        'measure',
        'quantity',
        'remaining',
        'note',
        'user_id',
        'price',
        'lg_resource_id',
        'old_lg_product_id',
        'lg_budget_item_id',
        'lg_budget_level_id'
    ];

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lgResource()
    {
        return $this->belongsTo(LgResource::class);
    }
    public function lgBudgetItem()
    {
        return $this->belongsTo(LgBudgetItem::class);
    }
    public function lgBudgetLevel()
    {
        return $this->belongsTo(LgBudgetLevel::class);
    }
    public function lgService()
    {
        return $this->belongsTo(lgService::class);
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
}
