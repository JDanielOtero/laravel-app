<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobprofileCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_salary',
        'max_salary',
        'min_salary_deyfor',
        'max_salary_deyfor',
        'increase_percentage',
        'family_assignation'
    ];
}
