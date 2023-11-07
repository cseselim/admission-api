<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\AdmissionNumber;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdmissoinNumber\AdmissionNumberResource;

class AdmissionNumberController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  AdmissionNumberResource::collection(AdmissionNumber::with(['school','classes'])->where('status',1)->get());
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
            'school_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'admission_number' => 'required',
        ]);

        AdmissionNumber::create($validated);

        return response()->json(['message' => __('Admission number create successfully')], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'school_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'admission_number' => 'required',
        ]);

        $data = AdmissionNumber::find($id);
        if (!$data) {
            throw new CustomException(__('Admission mumber not found'),404);
        }
        $data->update($validated);

        return response()->json(['message' => __('Admission number updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AdmissionNumber::find($id);

        if ($data) {
            $data->delete();
            return response()->json(['message' => __('Admission number deleted successfully')]);
        }

        throw new CustomException(__('Admission number not found to delete'));
    }
}
