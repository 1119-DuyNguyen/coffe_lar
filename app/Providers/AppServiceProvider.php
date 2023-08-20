<?php

namespace App\Providers;

use App\Http\Services\SettingService;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use App\Models\Role;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    private function setupRBAC(){
        $roles = Role::with('permissions')->get();
        $permissionsArray = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permissions) {
                $permissionsArray[$permissions->name][$role->id]=9  ;
            }
        }
        // Every permission may have multiple roles assigned
        foreach ($permissionsArray as $name => $roles) {
            Gate::define($name, function ($user) use (&$name,&$permissionsArray){
                // We check if we have the needed roles among current user's roles
                return isset($permissionsArray[$name][$user->role->id]);
//                    // We check if we have the needed roles among current user's roles
//                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
            });
        }
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        //
        try {
            /** set time zone */
//            Config::set('app.timezone', $generalSetting->time_zone);
            //role & permissions
            $this->setupRBAC();

            SettingService::initSetting();
            $generalSetting = SettingService::getGeneralSetting();
            $logoSetting = SettingService::getLogoSetting();
            /** Share variable at all view */
            if(isset($generalSetting)&&isset($logoSetting))
            {

                View::composer('*', function ($view) use ($generalSetting,$logoSetting){

                    $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
                });
            }

        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

    }
}
