<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'name',
        'model_code',
        'model_type',
        'level_type',
        'class_type',
        'code',
        'category_type',
        'discipline_type',
        'complementary_role',
        'lg_costcenter_id',
        'organizational_grade',
        'user_to_report',
        'specialty_type',
        'situation_type',
        'file_url',
        'created_by',
        'updated_by',
        'jobprofile_category_id',
        'mission'
    ];

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function ppOficios()
    {
        return $this->hasMany(PpOficio::class);
    }
    public function ppActivities()
    {
        return $this->hasMany(PpActivity::class);
    }
    public function ppMetrics()
    {
        return $this->hasMany(PpMetric::class);
    }
    public function ppCertificates()
    {
        return $this->hasMany(PpCertificate::class);
    }
    public function ppKnowledges()
    {
        return $this->hasMany(PpKnowledge::class);
    }
    public function jobprofileCategory()
    {
        return $this->belongsTo(JobprofileCategory::class);
    }
}
