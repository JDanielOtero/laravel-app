<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrSubcategory extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'pr_category_id'];
    public function prCategory()
    {
        return $this->belongsTo(PrCategory::class);
    }
}
