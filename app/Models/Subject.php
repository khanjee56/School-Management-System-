<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name','code','class_id'];

        public function schoolclass(){
            return $this->belongsTo(SchoolClass::class);
        }
        public function mark(){
            return $this->hasMany(Mark::class,'class_id');
        }
        public function timetable(){
            return $this->hasMany(Timetable::class);
        }
}
