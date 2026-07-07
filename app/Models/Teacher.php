<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['user_id','employee_code','phone_number','adress','joining_date'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function timetable(){
        return $this->hasMany(Timetable::class);
    }
}
