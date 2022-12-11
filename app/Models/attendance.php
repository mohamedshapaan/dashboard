<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    protected $table="attendance";
    protected $fillable = [
        'id',
        'userid',
        'date',
        'signin',
        'signout',
        'userposition',
        'latetime',
        'created_at',
        'updated_at',
    ];
}
