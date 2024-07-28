<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ApplicantStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentApplicationController extends Controller
{

    public function index(Request $request)
    {
        $data = DB::table('applicant_students')
            ->select('applicant_students.id', 'applicant_students.admission_number', 'applicant_students.session', 'student_profiles.student_name', 'student_profiles.father_name', 'student_profiles.profile_image', 'schools.name as school_name',
                'classes.name as class_name', 'shifts.name as shift_name', 'versions.name as version_name')
            ->join('student_profiles', 'student_profiles.id', '=', 'applicant_students.student_id')
            ->join('schools', 'schools.id', '=', 'applicant_students.school_id')
            ->join('classes', 'classes.id', '=', 'applicant_students.class_id')
            ->join('shifts', 'shifts.id', '=', 'applicant_students.shift_id')
            ->join('versions', 'versions.id', '=', 'applicant_students.version_id')
            ->where('applicant_students.status', 1)
            ->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'required',
            'student_id' => 'required',
            'school_id' => 'required',
            'class_id' => 'required',
            'version_id' => 'required',
            'shift_id' => 'required',
            'admission_number' => 'required',
            'student_age' => 'nullable',
            'session' => 'nullable',
            'transaction_id' => 'required',
            'payment_status' => 'nullable',
            'status' => 'required',
        ]);

        ApplicantStudent::create($validated);

        return response()->json(['message' => __('Student profile create successfully')], 201);
    }

    public function show($id)
    {
        $data = DB::table('applicant_students')
            ->select('applicant_students.id', 'applicant_students.admission_number', 'applicant_students.session',
                'student_profiles.student_name', 'student_profiles.father_name', 'student_profiles.profile_image', 'schools.name as school_name',
                'classes.name as class_name', 'shifts.name as shift_name', 'versions.name as version_name', 'student_profiles.date_of_birth', 'student_profiles.student_sex',
                'student_profiles.religion', 'student_profiles.blood_group', 'student_profiles.father_nid_no', 'student_profiles.father_occupation', 'student_profiles.father_contact',
                'student_profiles.occupation_category', 'student_profiles.unit', 'student_profiles.rank', 'student_profiles.permanent_address', 'student_profiles.legal_guardian_name', 'student_profiles.relation_with_guardian'
                , 'student_profiles.guardian_occupation', 'student_profiles.guardian_income')
            ->join('student_profiles', 'student_profiles.id', '=', 'applicant_students.student_id')
            ->join('schools', 'schools.id', '=', 'applicant_students.school_id')
            ->join('classes', 'classes.id', '=', 'applicant_students.class_id')
            ->join('shifts', 'shifts.id', '=', 'applicant_students.shift_id')
            ->join('versions', 'versions.id', '=', 'applicant_students.version_id')
            ->where('applicant_students.id', '=', $id)
            ->first();
        return $data;
    }

    public function paymentPendingStudents()
    {
        $applicantStudent = DB::table('student_profiles')
            ->distinct()
            ->select('student_profiles.id')
            ->join('applicant_students', 'applicant_students.student_id', '=', 'student_profiles.id')
            ->get()->pluck('id');
        $data = DB::table('student_profiles')
            ->distinct()
            ->select('student_profiles.id', 'student_profiles.student_name', 'student_profiles.father_name', 'student_profiles.profile_image', 'student_profiles.date_of_birth', 'student_profiles.student_sex',
                'student_profiles.religion', 'student_profiles.blood_group', 'student_profiles.father_nid_no', 'student_profiles.father_occupation', 'student_profiles.father_contact',
                'student_profiles.occupation_category', 'student_profiles.unit', 'student_profiles.rank', 'student_profiles.permanent_address', 'student_profiles.legal_guardian_name', 'student_profiles.relation_with_guardian'
                , 'student_profiles.guardian_occupation', 'student_profiles.guardian_income')
            ->whereNotIn('id', $applicantStudent)
            ->get();
        return $data;
    }

    public function applicantStudentApprove($id)
    {
        ApplicantStudent::where('id', $id)->update(['status' => 5]);
        return response()->json(['message' => __('Student status is updated successfully')],200);
    }

    public function selectedStudent()
    {
        $data = DB::table('applicant_students')
            ->select('applicant_students.id', 'applicant_students.admission_number', 'applicant_students.session', 'student_profiles.student_name', 'student_profiles.father_name', 'student_profiles.profile_image', 'schools.name as school_name',
                'classes.name as class_name', 'shifts.name as shift_name', 'versions.name as version_name')
            ->join('student_profiles', 'student_profiles.id', '=', 'applicant_students.student_id')
            ->join('schools', 'schools.id', '=', 'applicant_students.school_id')
            ->join('classes', 'classes.id', '=', 'applicant_students.class_id')
            ->join('shifts', 'shifts.id', '=', 'applicant_students.shift_id')
            ->join('versions', 'versions.id', '=', 'applicant_students.version_id')
            ->where('applicant_students.status', 5)
            ->get();
        return $data;
    }

    public function applicantStudentDisapprove($id)
    {
        ApplicantStudent::where('id', $id)->update(['status' => 1]);
        return response()->json(['message' => __('Student status is updated successfully')],200);
    }
}
