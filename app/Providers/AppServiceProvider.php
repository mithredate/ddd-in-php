<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Podro\TMS\Billing\Domain\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Billing\Infrastructure\Persistence\Doctrine\Order\OrderRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }
}
