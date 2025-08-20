<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhSo extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'name', 'table_type', 'table_id', 'register_date', 'file_url', 'weight', 'size', 'imc', 'pants_size', 'shirt_size', 'shoes_size', 'gloves_size'];

    public function table()
    {
        return $this->morphTo();
    }


    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class, 'table_id')->where('table_type', RhWorker::class);
    }
}
