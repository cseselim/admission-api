<?php

namespace App\Http\Controllers\API;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Shift\ShiftResource;

class shiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  ShiftResource::collection(Shift::get());
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
            'name' => 'required|unique:shifts',
            'code' => 'required|unique:shifts,code',
            'status' => 'nullable',
        ]);

        Shift::create($validated);

        return response()->json(['message' => __('Shift create successfully')], 201);
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
        return  Shift::where('id',$id)->first();
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
        $validated = $this->validate(
            $request,
            [
                'name' => 'required|unique:shifts,name,'.$id,
                'code' => 'required|unique:shifts,code,'.$id,
                'status' => 'nullable',
            ]
        );

        $shift = Shift::find($id);
        if (!$shift) {
            throw new CustomException(__('Shift not found'),404);
        }
        $shift->update($validated);

        return response()->json(['message' => __('Shift updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::find($id);

        if ($shift) {
            $shift->delete();
            return response()->json(['message' => __('Shift deleted successfully')]);
        }

        throw new CustomException(__('Shift not found to delete'));
    }
}
