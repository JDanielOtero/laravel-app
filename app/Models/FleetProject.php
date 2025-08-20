<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'hire_date',
        'admin_date',
        'project_date',
        'mode',
        'project',
        'lg_costcenter_id',
        'supervisor_id',
        'drivers',
        'category_id',
        'note',
        'tr_vehicle_id',
        'file'
    ];
    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
