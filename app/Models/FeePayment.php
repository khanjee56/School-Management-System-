<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'fee_id',
        'amount_paid',
        'payment_date',
        'status',
    ];

    // A Fee Payment belongs to one Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // A Fee Payment belongs to one Fee
    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}