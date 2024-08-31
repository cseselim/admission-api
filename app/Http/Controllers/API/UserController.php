<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public  function index(Request $request){
        $data['users'] = User::all();
        $data['roles'] = Role::all();
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function changePasswordSave(Request $request)
    {
        $user =  User::find($request->user_id);
        $validated = $request->validate([
            'current_password' => ['required', function ($attr, $password, $validation) use ($user) {
                if (!\Hash::check($password, $user->password)) {
                    return $validation(__('The current password is incorrect.'));
                }
            }],
            'new_password' => 'required|min:8|confirmed|different:current_password'
        ]);


        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return response()->json(['message' => __('New Password cannot be same as your current password.')], 422);
        }

        $user->password =  Hash::make($request->new_password);
        $user->save();
        return response()->json(['message' => __('Password Changed Successfully')]);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password =  Hash::make($request->new_password);
        $user->is_active=$request->is_active;
        $user->user_type=$request->user_type;
        $user->role_id=$request->role_id;
        $result = $user->save();
        if ($result){
            return response()->json(['message' => __('User create Successfully')],200);
        }else{
            return response()->json(['message' => __('User Update Failed')],422);
        }
    }

    public  function edit(Request $request,$id){
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::all();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if (isset($request->password)){
            $user->password =  Hash::make($request->new_password);
        }
        $user->is_active=$request->is_active;
        $user->user_type=$request->user_type;
        $user->role_id=$request->role_id;
        $result = $user->save();
        if ($result){
            return response()->json(['message' => __('User Updated Successfully')],200);
        }else{
            return response()->json(['message' => __('User Update Failed')],422);
        }
    }

/*
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function destroy($id)
    {
        $data = User::find($id);

        if ($data) {
            $data->delete();
            return response()->json(['message' => __('User deleted successfully')]);
        }

        throw new CustomException(__('User not found to delete'));
    }
}
