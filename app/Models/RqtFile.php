<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RqtFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'created_by',
        'rqt_id',
        'description',
        'file'
    ];
    public function rqt()
    {
        return $this->belongsTo(Rqt::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
