<?php

namespace App\Http\Controllers\API;

use App\Models\School;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\School\SchoolResource;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  SchoolResource::collection(School::get());
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
            'name' => 'required',
            'code' => 'required|numeric',
            'logo' => 'nullable',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required',
            'has_shift' => 'nullable',
            'has_version' => 'nullable',
            'has_section' => 'nullable',
            'status' => 'required|numeric'
        ]);

        School::create($validated);

        return response()->json(['message' => __('School create successfully')], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  response()->json(['data' => School::find($id)]);
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
            'name' => 'required',
            'code' => 'required|numeric',
            'logo' => 'nullable',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required',
            'has_shift' => 'nullable',
            'has_version' => 'nullable',
            'has_section' => 'nullable',
            'status' => 'required|numeric'
        ]);

        $data = School::find($id);
        if (!$data) {
            throw new CustomException(__('School not found'),404);
        }
        $data->update($validated);

        return response()->json(['message' => __('School updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = School::find($id);

        if ($data) {
            $data->delete();
            return response()->json(['message' => __('School deleted successfully')]);
        }

        throw new CustomException(__('School not found to delete'));
    }
}
