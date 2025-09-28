<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Categorie;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Partager les catégories avec toutes les vues admin
        View::composer('layouts.admin', function ($view) {
            $categories = Categorie::orderBy('nom')->get();
            $view->with('categories', $categories);
        });
    }
}