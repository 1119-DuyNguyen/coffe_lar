<?php

namespace App\Traits;

use App\Http\Requests\Backend\ProfileUpdateRequest;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

trait ProfileHandlerTrait {


    public function updateProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "/uploads/".$imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
//        toast(__('admin.Updated Successfully'),'success')->width('400');

        toast()->success('Profile Updated Successfully!');
        return redirect()->back();
    }

    /** Update Password */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required','confirmed', 'min:8']
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toast()->success('Profile Password Updated Successfully!');

        return redirect()->back();
    }
}

