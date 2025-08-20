<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmUserActivity extends Model
{
    use HasFactory;
    
    protected $fillable = ['status', 'points','gm_activity_id','user_register_id','user_id',
    'user_revision_id','description','file_url','type','cap_time','range',
    'project','user','material_file','register_date','role','participants','updatedBy'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userRevision()
    {
        return $this->belongsTo(User::class,'user_revision_id');
    }
    public function userRegister()
    {
        return $this->belongsTo(User::class,'user_register_id');
    }

    public function userUpdatedBy()
    {
        return $this->belongsTo(User::class,'updatedBy');
    }

    public function gmActivity()
    {
        return $this->belongsTo(GmActivity::class);
    }
}
