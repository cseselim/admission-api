<?php

namespace App\Http\Controllers\API;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Classes\ClassResource;

class ClassesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  ClassResource::collection(Classes::where('status',1)->get());
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
            'name' => 'required|unique:classes',
            'code' => 'required|unique:classes,code',
        ]);

        Classes::create($validated);

        return response()->json(['message' => __('Class create successfully')], 201);
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
        $validated = $this->validate(
            $request,
            [
                'name' => 'required|unique:classes,name,'.$id,
                'code' => 'required|unique:classes,code,'.$id,
            ]
        );

        $classes = Classes::find($id);
        if (!$classes) {
            throw new CustomException(__('Class not found'),404);
        }
        $classes->update($validated);

        return response()->json(['message' => __('Class updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classes = Classes::find($id);

        if ($classes) {
            $classes->delete();
            return response()->json(['message' => __('Class deleted successfully')]);
        }

        throw new CustomException(__('Class not found to delete'));
    }
}
