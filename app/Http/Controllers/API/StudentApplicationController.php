<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ApplicantStudent;
use Illuminate\Http\Request;

class StudentApplicationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
}
