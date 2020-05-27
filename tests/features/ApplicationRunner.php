<?php

namespace Podro\TMS\Features;

use Laravel\Lumen\Testing\Concerns\MakesHttpRequests;
use Mockery;
use PHPUnit\Framework\Assert;
use Podro\TMS\Fulfillment\Core\Entity\Order\Order;
use Podro\TMS\Fulfillment\Core\Entity\Order\PurchaserId;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\ProviderAPIInterface;

/**
 * Filename: ApplicationRunner.
 * User: Mithredate
 * Date: May, 2020
 */
class ApplicationRunner
{
    use MakesHttpRequests;

    private $app;

    /**
     * ApplicationRunner constructor.
     */
    public function __construct()
    {
        require_once __DIR__.'/../../bootstrap/app.php';
        $this->app = app();
    }

    public function placeAnOrderOn(FakeProviderAPI $api)
    {
        $order = entity(Order::class)->make(['purchaserId' => new PurchaserId('test')]);
        $idGeneratorMock = Mockery::mock(
            IdGeneratorInterface::class,
            static function ($mock) use ($order) {
                $mock->shouldReceive('generate')->once()->andReturn($order->getId());
            }
        );
        $this->app->instance(IdGeneratorInterface::class, $idGeneratorMock);
        $this->app->instance(ProviderAPIInterface::class, $api);

        $this->response = $this->call('POST', route('orders.store'));
    }

    public function showOrderWasPlacedOn(FakeProviderAPI $providerAPI)
    {
        Assert::assertEquals(201, $this->response->status());
    }
}