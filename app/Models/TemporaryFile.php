<?php

namespace App\Models;

use App\Models\Professor;
use App\Models\Moderator;
use App\Models\Operator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryFile extends Model
{
    use HasFactory;
    protected $fillable = ['folder', 'filename', 'category_name', 'points', 'is_active', 'professor_id', 'moderator_id', 'operator_id', 'site_url', 'ariza_holati', 'arizaga_javob', 'duch_kelingan_muommo'];

    public function filesProfessor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function filesModerator()
    {
        return $this->belongsTo(Moderator::class, 'moderator_id');
    }

    public function filesOperator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }
}


