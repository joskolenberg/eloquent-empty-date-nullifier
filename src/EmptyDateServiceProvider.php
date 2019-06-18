<?php

namespace JosKolenberg\EloquentEmptyDateNullifier;

use Illuminate\Support\ServiceProvider;

class EmptyDateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/empty-date.php' => config_path('empty-date.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/empty-date.php', 'empty-date');
    }

}
