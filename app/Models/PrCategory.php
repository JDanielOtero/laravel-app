<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrCategory extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'pr_line_id'];
    public function prLine()
    {
        return $this->belongsTo(PrLine::class);
    }
    public function prSubcategories()
    {
        return $this->hasMany(PrSubcategory::class);
    }
}
