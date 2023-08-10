<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProfileUpdateRequest;
use App\Models\UserAddress;
use App\Traits\ProfileHandlerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    use ProfileHandlerTrait;
    public function index()
    {
        $user= auth()->user();
//        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        return view('admin.profile.index',compact('user'));
    }

}
