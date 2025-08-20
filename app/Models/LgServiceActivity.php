<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgServiceActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'name',
        'time',
        'created_by',
        'lg_service_id',
        'lg_budget_item_id'
    ];

    public function lgService()
    {
        return $this->belongsTo(lgService::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function lgBudgetItem()
    {
        return $this->belongsTo(lgBudgetItem::class);
    }
}
