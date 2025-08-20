<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companydata extends Model
{
    use HasFactory;
    protected $fillable = ['ruc', 'name', 'logo', 'description', 'phone', 'email'];
}
