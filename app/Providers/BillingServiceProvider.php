<?php

namespace App\Providers;

use App\Http\Controllers\Order\PlaceOrderPresenter;
use Illuminate\Support\ServiceProvider;
use Podro\TMS\Billing\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Billing\Core\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Billing\Core\Usecase\PlaceOrder\PlaceOrderUsecaseInputPortInterface;
use Podro\TMS\Billing\Core\Usecase\PlaceOrder\PlaceOrderUsecaseInteractor;
use Podro\TMS\Billing\Core\Usecase\PlaceOrder\PlaceOrderUsecaseOutputPortInterface;
use Podro\TMS\Billing\Gateways\Doctrine\Order\OrderRepository;
use Podro\TMS\Billing\Infrastructure\Services\Order\IdGenerator;

class BillingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(IdGeneratorInterface::class, IdGenerator::class);
        $this->app->bind(PlaceOrderUsecaseInputPortInterface::class, PlaceOrderUsecaseInteractor::class);
        $this->app->bind(PlaceOrderUsecaseOutputPortInterface::class, PlaceOrderPresenter::class);
    }
}
