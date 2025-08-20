<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetRecordFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'fleet_record_id',
        'code',
        'description',
        'file',
        'file_name'
    ];

    public function fleetRecord()
    {
        return $this->belongsTo(FleetRecord::class);
    }
}
