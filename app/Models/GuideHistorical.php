<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideHistorical extends Model
{
    use HasFactory;
    protected $fillable = ['guide_detail_id', 'user_id', 'status', 'note','quantity','guide_status','file_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function guideDetail()
    {
        return $this->belongsTo(GuideDetail::class);
    }
}
