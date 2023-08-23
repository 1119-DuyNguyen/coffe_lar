<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Cache;

class SettingService
{
    public static function array_override( $default, $override )
    {
        if(is_array($override))
        {
            foreach( $default as $k=>$v )
            {
                if( isset( $override[$k] ) ) $default[$k] = $override[$k];
            }
        }
        return $default;
    }
    public static function initSetting()
    {

        Cache::rememberForever('generalSetting', function () {
            return [
                'site_name' => 'Shop',
                'layout' => 'LTR',
                'contact_email' => 'contact@gmail.com',
                'contact_phone' => '0123456789',
                'contact_address' => 'VietNam',
                'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1435090089785!2d90.42196781465853!3d23.81349539228068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fb95f16c1%3A0xb333248370356dee!2sJamuna%20Future%20Park!5e0!3m2!1sen!2sbd!4v1639724859199!5m2!1sen!2sbd',
                'currency_name' => 'USD',
//                'time_zone' => '2',
                'currency_icon' => '$'
            ];
        });
        Cache::rememberForever('logoSetting', function () {
            return ['logo' => 'uploads/media_64cd537af35c94.07800862.png', 'favicon' => 'uploads/media_645627dd34272.png'];
        });
        Cache::rememberForever('emailSetting', function () {
            return [
                'email' => 'thanhduy191103@gmail.com',
                'host' => '2',
                'username' => '2',
                'password' => '2',
                'port' => '2',
                'encryption' => '2'
            ];
        });
    }

    public static function getGeneralSetting()
    {
        return  (object) Cache::get('generalSetting');
    }
    public static function getEmailSetting()
    {
        return (object) Cache::get('emailSetting');
    }
    public static function getLogoSetting()
    {
        return (object) Cache::get('logoSetting');
    }
    public static function updateGeneralSetting($data)
    {
         Cache::forever('generalSetting',SettingService::array_override(Cache::get('generalSetting'),$data));
    }
    public static function updateEmailSetting($data)
    {
         Cache::forever('emailSetting',SettingService::array_override(Cache::get('emailSetting'),$data));

    }
    public static function updateLogoSetting($data)
    {
         Cache::forever('logoSetting',SettingService::array_override(Cache::get('logoSetting'),$data));
    }
}
