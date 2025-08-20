<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GCertificate extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name', 'g_phase_id'];

    public function gPhase()
    {
        return $this->belongsTo(GPhase::class);
    }

    public function gSubcertificates()
    {
        return $this->hasMany(GSubcertificate::class);
    }
    public function lgSubresrouces()
    {
        return $this->hasMany(LgSubresource::class);
    }

    public function total()
    {
        return $this->gSubcertificates->sum(function ($subcertificate) {
            return $subcertificate->total();
        }) +  $this->lgSubresrouces()->sum(DB::raw('price * quantity'));
    }
}
