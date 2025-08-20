<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GActivity extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name', 'g_subcertificate_id'];

    public function gSubcertificate()
    {
        return $this->belongsTo(GSubcertificate::class);
    }
    public function lgSubresrouces()
    {
        return $this->hasMany(LgSubresource::class);
    }
}
