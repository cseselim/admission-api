<?php

namespace App\Http\Controllers\API;

use App\Models\Version;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Version\VersionResource;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  VersionResource::collection(Version::get());
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

        Version::create($validated);

        return response()->json(['message' => __('Version create successfully')], 201);
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
        return  Version::where('id',$id)->first();
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

        $data = Version::find($id);
        if (!$data) {
            throw new CustomException(__('Version not found'),404);
        }
        $data->update($validated);

        return response()->json(['message' => __('Version updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Version::find($id);

        if ($data) {
            $data->delete();
            return response()->json(['message' => __('Version deleted successfully')]);
        }

        throw new CustomException(__('Version not found to delete'));
    }
}
