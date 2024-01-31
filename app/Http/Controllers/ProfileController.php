<?php

namespace App\Http\Controllers;

use App\Traits\ProfileHandlerTrait;

class ProfileController extends Controller
{
    use ProfileHandlerTrait;
    public function index()
    {
        $user = auth()->user();
        //        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        return "404";
        // return view('frontend.pages.profile', compact('user'));
    }
}
