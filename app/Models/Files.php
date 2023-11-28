<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'category_name',
        'points',
        'is_active'
       
    ];


    public function moderator()
       {
           return $this->belongsTo('App\Models\Moderator');
       }

      

    
}
