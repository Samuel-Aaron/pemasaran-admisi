<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        //
        Gate::define('isAdmin', function(User $user){
            return $user->role == 'admin';
        });

        Gate::define('akses-layanan', function(User $user):bool{
            $role = false; 
            if ($user -> role == 'layanan' || $user -> role == 'admin' || $user -> role == 'supervisor') {
                $role = true;
            }
            return $role;
        });
        Gate::define('akses-tiket', function(User $user):bool{
            $role = false;
            if ($user -> role == 'tiket' || $user -> role == 'admin' || $user -> role == 'supervisor') {
                $role = true;
            }
            return $role;
        });

        Gate::define('akses-eskalasi', function(User $user):bool{
            $role = false;
            if ($user -> role == 'eskalasi' || $user -> role == 'admin' || $user -> role == 'supervisor') {
                $role = true;
            }
            return $role;
        });
        
    }
}
