<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmsBase extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name', 'lg_place_id'];

    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
}
