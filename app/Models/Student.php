<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = ['user_id','class_id','date_of_birth','rollnumber','gender','phone','adress','parent_name',
     'parent_phone','parent_email'];

     public function schoolclass(){
        return $this->belongsTo(SchoolClass::class);
    }
     public function user(){
        return $this->belongsTo(User::class);
    }
    public function mark(){
        return $this->hasMany(Mark::class);
    }
             public function fee(){
        return $this->hasMany(Fee::class,'class_id');
    }
          public function attendance(){
        return $this->hasMany(Attendance::class,'class_id');
    }
}
