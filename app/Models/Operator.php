<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'oper_fish',
        'oper_slug_number',
        'oper_small_info',
        'oper_status',
        'moderator_id',
        'file_id'
    ];

    public function files()
    {
        return $this->hasMany('App\Models\Files');
    }

    public function moderator()
    {
        return $this->belongsTo('App\Models\Moderator');
    }
}
