<?php

namespace App\Providers;

use App\Http\Response\ResponseFactory;
use App\Http\Response\ResponseFactoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResponseFactoryInterface::class, ResponseFactory::class);
    }
}
