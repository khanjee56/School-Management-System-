<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
      protected $fillable = [
        'tite',
        'content',
        'posted_by',
        'role'
        
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    }
