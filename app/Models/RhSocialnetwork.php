<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhSocialnetwork extends Model
{
    use HasFactory;
    protected $fillable = ['status','name', 'table_type', 'table_id', 'url'];
    
    public function table(){
        return $this->morphTo();
    }
}
