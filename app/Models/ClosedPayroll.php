<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedPayroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'period',
        'closed_date',
        'closed_by'
    ];

    public function closedBy()
    {
        return $this->belongsTo(User::class, 'closed_by');
    }
    public function closedTsLists()
    {
        return $this->hasMany(ClosedTsList::class);
    }
}
