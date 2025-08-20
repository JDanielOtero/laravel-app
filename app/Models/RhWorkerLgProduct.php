<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhWorkerLgProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'rh_worker_id', 'user_id', 'lg_product_id', 'type', 'date'
    ];
}
