<?php

namespace App\Providers;

use App\Models\MenuLink;
use App\Models\MobileMenuLink;
use App\Models\Page;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $path = \Request::path();
//        $browserInfo = get_browser(null, true);
//        \Log::debug($browserInfo);
        Schema::defaultStringLength(191);
        Date::setLocale('ru');
        View::share([
            'header_menu' => MenuLink::query()->orderBy('position')->get(),
            'mobile_menu' => MobileMenuLink::query()->orderBy('position')->whereNull('parent_id')->get(),
            'current_path' => $path === "/" ? '' : $path,
            'isSafari' => false
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        Bkwld\LaravelPug\ServiceProvider::class;
    }
}
