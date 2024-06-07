<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'student_id',
        'school_id',
        'class_id',
        'version_id',
        'shift_id',
        'admission_number',
        'student_age',
        'session',
        'transaction_id',
        'payment_status',
    ];
}
