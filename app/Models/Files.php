<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',        
        'category_name',
        'points',
        'is_active',
        'folder'
       
    ];


    public function moderator()
       {
           return $this->belongsTo('App\Models\Moderator');
       }

      

    
}
