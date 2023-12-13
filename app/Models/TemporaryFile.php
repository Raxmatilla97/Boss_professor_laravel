<?php

namespace App\Models;
use App\Professor;
use App\Moderator;
use App\Operator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryFile extends Model
{
    use HasFactory;
    protected $fillable = ['folder', 'filename', 'category_name', 'points', 'is_active', 'professor_id', 'moderator_id', 'operator_id'];

    public function filesProfessor()
    {
        return $this->belongsToMany(Professor::class, 'professor_id');
    }

    public function filesModerator()
    {
        return $this->belongsToMany(Moderator::class, 'moderator_id');
    }

    public function filesOperator()
    {
        return $this->belongsToMany(Operator::class, 'operator_id');
    }
}


