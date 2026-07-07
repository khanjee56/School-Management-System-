<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['name','class_id','exam_date','total_marks'];

      public function schoolclass(){
        return $this->belongsTo(SchoolClass::class);
    }
      public function mark(){
        return $this->hasMany(Mark::class);
    }
}
