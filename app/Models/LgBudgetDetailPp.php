<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgBudgetDetailPp extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'lg_budget_id', 'job_profile_id', 'quantity', 'remaining', 'note', 'user_id', 'price','quantity_months','lg_budget_item_id'];

    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lgBudgetItem()
    {
        return $this->belongsTo(LgBudgetItem::class);
    }
}
