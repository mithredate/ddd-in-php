<?php

namespace App\Providers;

use App\Http\Controllers\Order\PlaceOrderPresenter;
use Illuminate\Support\ServiceProvider;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseInputPortInterface;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseInteractor;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseOutputPortInterface;
use Podro\TMS\Fulfillment\Gateways\Doctrine\Order\OrderRepository;
use Podro\TMS\Fulfillment\Infrastructure\Services\Order\IdGenerator;

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
