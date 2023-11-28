<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    use HasFactory;

    protected $fillable = [
        'moder_fish',
        'moder_slug_number',
        'moder_small_info',
        'moder_status',
        'professor_id',
        'file_id'
    ];

    public function files()
    {
        return $this->hasMany('App\Models\Files');
    }
}
