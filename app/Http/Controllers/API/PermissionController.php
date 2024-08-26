<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }

    public function store(Request $request)
    {
        $permission = Permission::create(['name' => $request->name,'guard_name' => $request->guard_name,'display_name' => $request->display_name]);
        return response()->json($permission, 201);
    }

    public function show($id)
    {
        return Permission::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $request->name,'guard_name' => $request->guard_name,'display_name' => $request->display_name]);
        return response()->json($permission);
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
