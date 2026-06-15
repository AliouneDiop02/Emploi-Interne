<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::replacer('required', function ($message, $attribute, $rule, $parameters) {
            if ($attribute === 'cv') {
                return "Le curriculum vitae est obligatoire.";
            }
            return "Ce champ est obligatoire.";
        });

        Validator::replacer('extensions', function ($message, $attribute, $rule, $parameters) {
            return "Le fichier doit être de type : " . implode(', ', $parameters) . ".";
        });

        Validator::replacer('max', function ($message, $attribute, $rule, $parameters) {
            if ($attribute === 'cv') {
                return "Le fichier ne doit pas dépasser 2 Mo.";
            }
            return "Ce champ ne doit pas dépasser " . $parameters[0] . " caractères.";
        });
    }
}
