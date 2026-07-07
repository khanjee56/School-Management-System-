<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = ['class_id','amount','month','year','due_date'];

      public function schoolclass(){
        return $this->belongsTo(SchoolClass::class);
    }
      public function feepayment(){
        return $this->hasMany(FeePayment::class);
    }
}
