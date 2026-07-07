<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = ['name','section','capacity'];

          public function student(){
        return $this->hasMany(Student::class,'class_id');
    }
          public function subject(){
        return $this->hasMany(Subject::class,'class_id');
    }
          public function fee(){
        return $this->hasMany(Fee::class,'class_id');
    }
          public function attendance(){
        return $this->hasMany(Attendance::class,'class_id');
    }
    
          public function timetable(){
        return $this->hasMany(Timetable::class,'class_id');
    }
          public function exam(){
        return $this->hasMany(Exam::class,'class_id');
    }
    
    
}
