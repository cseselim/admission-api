<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all();
        $data['permission'] = Permission::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name,'guard_name' => $request->guard_name]);
        return response()->json($role, 201);
    }

    public function show($id)
    {
        return Role::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $result = $role->syncPermissions($request->roles);
        return response()->json($role);
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
