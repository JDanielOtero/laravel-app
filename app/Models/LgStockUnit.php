<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgStockUnit extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function lgProducts(){
        return $this->belongsToMany(LgProduct::class);
    }
}
