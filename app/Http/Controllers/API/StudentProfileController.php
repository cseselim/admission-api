<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Student\StudentProfileResource;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  StudentProfileResource::collection(StudentProfile::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'student_name' => 'required',
            'father_name' => 'required',
            'father_nid_no' => 'required',
            'father_occupation' => 'required',
            'father_contact' => 'required',
            'occupation_category' => 'required',
            'unit' => 'nullable',
            'rank' => 'nullable',
            'mother_name' => 'required',
            'mother_contact' => 'nullable',
            'permanent_address' => 'required',
            'date_of_birth' => 'required',
            'birth_registration_no' => 'nullable',
            'student_sex' => 'required',
            'religion' => 'required',
            'last_school_name' => 'nullable',
            'last_exam' => 'nullable',
            'last_exam_roll' => 'nullable',
            'last_exam_result' => 'nullable',
            'blood_group' => 'nullable',
            'height' => 'nullable',
            'legal_guardian_name' => 'nullable',
            'relation_with_guardian' => 'nullable',
            'guardian_occupation' => 'nullable',
            'guardian_income' => 'required|numeric',
            'skill' => 'nullable',
            'profile_image' => 'required',
            'birth_certificate' => 'nullable',
            'unit_certificate' => 'nullable',
            'status' => 'required',
        ]);

        StudentProfile::create($validated);

        return response()->json(['message' => __('Student profile create successfully')], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  response()->json(['data' => StudentProfile::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'student_name' => 'required',
            'father_name' => 'required',
            'father_nid_no' => 'required',
            'father_occupation' => 'required',
            'father_contact' => 'required',
            'occupation_category' => 'required',
            'unit' => 'nullable',
            'rank' => 'nullable',
            'mother_name' => 'required',
            'mother_contact' => 'nullable',
            'permanent_address' => 'required',
            'date_of_birth' => 'required',
            'birth_registration_no' => 'nullable',
            'student_sex' => 'required',
            'religion' => 'required',
            'last_school_name' => 'nullable',
            'last_exam' => 'nullable',
            'last_exam_roll' => 'nullable',
            'last_exam_result' => 'nullable',
            'blood_group' => 'nullable',
            'height' => 'nullable',
            'legal_guardian_name' => 'nullable',
            'relation_with_guardian' => 'nullable',
            'guardian_occupation' => 'nullable',
            'guardian_income' => 'required|numeric',
            'skill' => 'nullable',
            'profile_image' => 'required',
            'birth_certificate' => 'nullable',
            'unit_certificate' => 'nullable',
            'status' => 'required',
        ]);

        $data = StudentProfile::find($id);
        if (!$data) {
            throw new CustomException(__('Student profile not found'),404);
        }
        $data->update($validated);

        return response()->json(['message' => __('Student profile updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StudentProfile::find($id);

        if ($data) {
            $data->delete();
            return response()->json(['message' => __('Student profile deleted successfully')]);
        }

        throw new CustomException(__('Student profile not found to delete'));
    }
}
