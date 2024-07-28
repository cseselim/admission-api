<?php

namespace App\Http\Controllers\API;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Classes\ClassResource;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     public function applicantStudentCount(Request $request){
        $data = DB::table('classes')
            ->select('classes.name',DB::raw('count(applicant_students.class_id) as count'))
            ->join('applicant_students', 'classes.id', '=', 'applicant_students.class_id')
            ->groupBy('applicant_students.class_id')
            ->orderBy('applicant_students.class_id')
            ->get();
        return $data;
     }
}
