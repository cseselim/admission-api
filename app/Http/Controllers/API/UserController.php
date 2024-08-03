<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
}
