<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrClasification extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name'];

    public function prLines()
    {
        return $this->hasMany(PrLine::class);
    }
}
