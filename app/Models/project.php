<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    
    use HasFactory;
    protected $table="project";
    protected $fillable = [
        'id',
        'name',
        'serviceid',
        'image',
        'link',
        'desc',
        'created_at',
        'updated_at',
    ];
}
