<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrLine extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'pr_clasification_id'];
    public function prClasification()
    {
        return $this->belongsTo(PrClasification::class);
    }
    public function prCategories()
    {
        return $this->hasMany(PrCategory::class);
    }
}
