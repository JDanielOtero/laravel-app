<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'cr_chapter_id',
        'status',
        'name',
        'file',
        'link',
        'order',
        'code',
        'type'
    ];
    public function crChapter()
    {
        return $this->belongsTo(CrChapter::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
