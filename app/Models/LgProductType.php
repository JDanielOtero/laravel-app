<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgProductType extends Model
{
    use HasFactory;
    protected $fillable = ['status','name'];
    
    public function lgProducts(){
        return $this->hasMany(LgProduct::class)->orderBy('id', 'desc');
    }
}
