<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\SettingService;
use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
//        $settings = GeneralSetting::first();
//        $emailSettings = EmailConfiguration::first();
//        $logoSetting = LogoSetting::first();
        return view('admin.setting.index');
    }


    public function generalSettingUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'site_name' => ['required', 'max:200'],
            'layout' => ['required', 'max:200'],
            'contact_email' => ['required', 'max:200'],
            'currency_name' => ['required', 'max:200'],
            'time_zone' => ['required', 'max:200'],
            'currency_icon' => ['required', 'max:200'],
        ]);
        SettingService::updateGeneralSetting($request->all());

        toast()->success('Updated successfully!');

        return redirect()->back();

    }

//    public function emailConfigSettingUpdate(Request $request)
//    {
//        $request->validate([
//            'email' => ['required', 'email'],
//            'host' => ['required', 'max:200'],
//            'username' => ['required', 'max:200'],
//            'password' => ['required', 'max:200'],
//            'port' => ['required', 'max:200'],
//            'encryption' => ['required', 'max:200'],
//        ]);
//
//         EmailConfiguration::updateOrCreate(
//            ['id' => 1],
//            [
//                'email' => $request->email,
//                'host' => $request->host,
//                'username' => $request->username,
//                'password' => $request->password,
//                'port' => $request->port,
//                'encryption' => $request->encryption,
//            ]
//        );
//        toast()->success('Updated successfully!');
//
//
//
//        return redirect()->back();
//    }

    public function logoSettingUpdate(Request $request)
    {
        $request->validate([
            'logo' => ['image', 'max:3000'],
            'favicon' => ['image', 'max:3000'],
        ]);
        $data=$request->all();

        $data['logo'] = $this->updateImage($request, 'logo', 'uploads', $request->input('old_logo'));
        $data['favicon'] = $this->updateImage($request, 'favicon', 'uploads', $request->input('old_favicon'));
        SettingService::updateLogoSetting($data);

        toast()->success('Updated successfully!');


        return redirect()->back();
    }
}
