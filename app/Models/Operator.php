<?php

namespace App\Models;
use App\Models\TemporaryFile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'oper_fish',
        'oper_slug_number',
        'oper_small_info',
        'oper_small_info2',
        'oper_status',
        'moderator_id',
        'file_id',
        'oper_image',
        'oper_custom_ball'
    ];

    // public function files()
    // {
    //     return $this->hasMany('App\Models\Files');
    // }

    public function moderator()
    {
        return $this->belongsTo('App\Models\Moderator');
    }

    public function files()
    {
        return $this->hasMany(TemporaryFile::class, 'operator_id');
    }
}
