<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhMemberships extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'table_type', 'table_id', 'gth_phase', 'rit_url', 'rss_url', 'etical_code_url', 'entry_record_url', 'general_induction_url', 'specific_induction_url', 'cifhs_url', 'risso_url'];


    public function table()
    {
        return $this->morphTo();
    }

}
