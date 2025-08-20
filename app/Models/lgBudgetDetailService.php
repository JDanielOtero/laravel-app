<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgBudgetDetailService extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'lg_budget_id', 'lg_service_id', 'quantity', 'remaining', 'note', 'user_id', 'price','quantity_months','lg_budget_item_id'];

    public function lgService()
    {
        return $this->belongsTo(lgService::class);
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
