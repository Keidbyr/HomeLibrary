<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Copy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::bootstrap-4');
        Gate::define('destroy-copy', function (User $user, Copy $copy) {
            if ($user->Is_admin) return true;
            $library = $copy->library;
            return $library && $library->owner_reader_id == $user->id;
        });
        Gate::define('change-copy', function (User $user, Copy $copy) {
            if ($user->Is_admin) return true;
            $library = $copy->library;
            return $library && $library->owner_reader_id == $user->id;
        });
    }
}
