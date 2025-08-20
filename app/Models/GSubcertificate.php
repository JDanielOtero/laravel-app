<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GSubcertificate extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name', 'g_certificate_id'];

    public function gCertificate()
    {
        return $this->belongsTo(GCertificate::class);
    }


    public function gActivities()
    {
        return $this->hasMany(GActivity::class);
    }

    public function lgSubresrouces()
    {
        return $this->hasMany(LgSubresource::class);
    }

    public function total()
    {
        $total = $this->lgSubresrouces()->sum(DB::raw('price * quantity'));
        return round($total, 5);
    }

}
