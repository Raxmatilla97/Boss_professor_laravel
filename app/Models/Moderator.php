<?php

namespace App\Models;
use App\Models\TemporaryFile;

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
        'file_id',
        'moder_image'
    ];

    // public function files()
    // {
    //     return $this->hasMany('App\Models\Files');
    // }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

    public function operator()
    {
        return $this->hasMany('App\Models\Operator');
    }

    public function files()
    {
        return $this->hasMany(TemporaryFile::class, 'moderator_id');
    }

}
