<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $roleId = Auth::user()->role_id;
                $menus = Menu::with(['subMenus' => function ($query) {
                    $query->where('status', 'active');
                }])
                ->where('role_id', $roleId)
                ->where('status', 'active')
                ->orderBy('sorting_index', 'asc')
                ->get();
                
                $view->with('menus', $menus);
            }
        });
    }
}
