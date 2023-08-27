<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Profile()
    {
        $Profile = Auth::user();
        return view('admin.profile', ['page_title' => 'Profile', 'Profile' => $Profile]);
    }

    public function SaveProfile(Request $request)
    {
        $Profile = Auth::user();

        $validator = \Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {

            $profile = Admin::find($Profile->id);
            $profile->first_name = $request->input('first_name');
            $profile->last_name = $request->input('last_name');
            $profile->name = $request->input('first_name') . " " . $request->input('last_name');
            $profile->password = bcrypt($request->input('password'));

            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $path = $file->store('pictures', 'public');
                if ($path) {
                    $profile->picture = $path;
                }
            }

            if ($profile->save()) {
                return 'true';
            } else {
                return 'false';
            }
        }
    }
}
