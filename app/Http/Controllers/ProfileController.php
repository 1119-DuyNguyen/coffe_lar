<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use App\Traits\ProfileHandlerTrait;
use File;

class ProfileController extends Controller
{
    use ProfileHandlerTrait;
    public function index()
    {
        $user= auth()->user();
//        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.profile',compact('user'));
    }

}
