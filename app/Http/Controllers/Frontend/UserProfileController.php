<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ProfileHandlerTrait;

class UserProfileController extends Controller
{
    use ProfileHandlerTrait;
    public function index()
    {
        $user=auth()->user();
        return view('frontend.dashboard.profile',compact('user'));
    }


}
