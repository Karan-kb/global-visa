<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Info;
use App\Models\Menu;
use App\Models\Service;
use App\Models\Destination;

use App\Models\EnglishTest;
use App\Models\LanguageTest;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Use view composers to share data with views
        View::composer('*', function ($view) {
            // Share menus
            if (Schema::hasTable('menus')) {
                $menus = \App\Http\Controllers\BasicPagesController::generateMenu();
                $view->with('menus', $menus);
            } else {
                $view->with('menus', []); // Fallback if the table doesn't exist
            }

            // Share infos
            if (Schema::hasTable('infos')) {
                $view->with('infos', Info::first());
            } else {
                $view->with('infos', null); // Fallback if the table doesn't exist
            }

            // Share services
            if (Schema::hasTable('services')) {
                $services = Service::orderBy('order', 'asc')->get();
                $view->with('service', $services);
                $view->with('servicess', $services);
            } else {
                $view->with('service', []);
                $view->with('servicess', []);
            }

            // Share destinations
            if (Schema::hasTable('destinations')) {
                $view->with('destination', Destination::orderBy('order', 'asc')->get());
            } else {
                $view->with('destination', []);
            }

            // Share English tests
            if (Schema::hasTable('english_tests')) {
                $view->with('english', EnglishTest::orderBy('order', 'asc')->get());
            } else {
                $view->with('english', []);
            }

            // Share language tests
            if (Schema::hasTable('language_tests')) {
                $view->with('language', LanguageTest::orderBy('order', 'asc')->get());
            } else {
                $view->with('language', []);
            }
        });
    }
}
