<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ProfileHandlerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class UserProfileController extends Controller
{
    use ProfileHandlerTrait;
    public function index()
    {
        $user=auth()->user();
        return view('frontend.dashboard.profile',compact('user'));
    }


}
