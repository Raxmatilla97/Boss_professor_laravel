<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'fish',
        'image',
        'status',
        'custom_ball',
        'small_info'
    ];
}
