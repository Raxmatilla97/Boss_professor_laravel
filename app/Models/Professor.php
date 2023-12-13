<?php

namespace App\Models;


use App\Models\Operator;
use App\Models\Moderator;
use App\Models\TemporaryFile;
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
        'small_info',
        'slug_number'
    ];

    public function moderator()
    {
        return $this->hasMany('App\Models\Moderator');
    }

    public function operators()
    {
        return $this->hasManyThrough(Operator::class, Moderator::class);
    }

    public function files()
    {
        return $this->hasMany(TemporaryFile::class, 'professor_id');
    }
}
