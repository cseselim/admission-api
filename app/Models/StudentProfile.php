<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
      *
      *
     */
    protected $fillable = [
        'user_id',
        'student_name',
        'father_name',
        'father_nid_no',
        'father_occupation',
        'father_contact',
        'paymentGateway',
        'occupation_category',
        'unit',
        'rank',
        'mother_name',
        'mother_occupation',
        'permanent_address',
        'present_address',
        'email_address',
        'contact_number',
        'date_of_birth',
        'birth_registration_no',
        'student_sex',
        'religion',
        'last_school_name',
        'last_exam',
        'last_exam_roll',
        'last_exam_result',
        'blood_group',
        'height',
        'legal_guardian_name',
        'relation_with_guardian',
        'legal_guardian_occupation',
        'guardian_income',
        'skill',
        'profile_image',
        'birth_certificate',
        'unit_certificate',
        'status',
    ];
}
