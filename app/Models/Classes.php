<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    public function AdmissionNumber(){
        return $this->hasMany(AdmissionNumber::class);
    }
}
