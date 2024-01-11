<?php

namespace App\Providers;

use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Pagination\Paginator;
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
        Gate::define('use-translation-manager', function (?User $user) {
            // Your authorization logic
            return $user !== null;
        });
        Paginator::useBootstrapFive();
        // Filament::getUrl('get_media_url', function ($path) {
        //     if (is_null($path)) {
        //         return null;
        //     }
    
        //     return url(config('filament.media.path') . '/' . ltrim($path, '/'));
        // });  
        
    }
   
}
