<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'table_type',
        'table_id',
        'relationship',
        'first_name',
        'middle_name',
        'last_name',
        'born_date',
        'gender',
        'cel_number',
        'email',
        'address',
        'work_place'
    ];


    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }


    public function table()
    {
        return $this->morphTo();
    }
}
