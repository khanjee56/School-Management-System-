<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'day',
        'start_time',
        'end_time',
    ];

    // A Timetable belongs to one Class
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    // A Timetable belongs to one Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // A Timetable belongs to one Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}