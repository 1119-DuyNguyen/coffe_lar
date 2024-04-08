<?php

namespace App\Providers;

use App\Http\Services\SettingService;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use App\Models\Role;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    private function setupRBAC()
    {
        try {
            $roles = Role::with('permissions')->get();
        } catch (\Throwable $th) {
            $roles = [];
            //throw $th;
        }
        $permissionsArray = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permissions) {
                $permissionsArray[$permissions->name][$role->id] = true;
            }
        }
        // Every permission may have multiple roles assigned
        foreach ($permissionsArray as $name => $roles) {
            Gate::define($name, function ($user) use ($name, $permissionsArray) {
                // We check if we have the needed roles among current user's roles
                $isRole = isset($permissionsArray[$name][$user->role->id]);
                //check if admin site

                return $isRole;
                //                    // We check if we have the needed roles among current user's roles
                //                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
            });
        }
        $gate = array_filter(Gate::abilities(), function ($var, $key) {
            return str_contains($key, 'admin');
        }, ARRAY_FILTER_USE_BOTH);
        Gate::define('admin', function ($user) use ($gate) {
            //check if admin site
            foreach ($gate as $key => $value) {
                if (Gate::any($key)) {
                    return true;
                }
            }
            return false;
        });
        // Gate::define('admin.dashboard', function ($user) {

        //     return false;
        // });
        // dd(Gate::abilities());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::hex('#6777ef'),
            'success' => Color::Green,
            'warning' => Color::Amber,
        ]);
        Paginator::useBootstrap();
        //
        App::setLocale('vi');
        Table::configureUsing(function (Table $table) {
            $table->paginated([10]);
        });
        try {
            /** set time zone */
            //            Config::set('app.timezone', $generalSetting->time_zone);
            //role & permissions
            $this->setupRBAC();
            SettingService::initSetting();
            $generalSetting = SettingService::getGeneralSetting();
            $logoSetting = SettingService::getLogoSetting();
            /** Share variable at all view */
            if (isset($generalSetting, $logoSetting)) {
                View::composer('admin.*', function ($view) use ($generalSetting, $logoSetting) {
                    $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
                });
                View::composer('frontend.dashboard.order.print', function ($view) use ($generalSetting, $logoSetting) {
                    $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
                });
                View::composer('templates.clients.master', function ($view) use ($generalSetting, $logoSetting) {
                    $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
                });
            }
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
}
