<?php
/**
 * Filename: CreateOrderTest.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Features;

use Mockery;
use Podro\TMS\Billing\Core\Entity\Order\Order;
use Podro\TMS\Billing\Core\Entity\Order\PurchaserId;
use Podro\TMS\Billing\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Billing\Core\Usecase\PlaceOrder\PlaceOrderUsecaseOutputPortInterface;
use Podro\TMS\Billing\TestCase;

class CreateOrderTest extends TestCase
{

    public function testValidDataShouldReturnTheOrderId()
    {
        $order = entity(Order::class)->make(['purchaserId' => new PurchaserId('test')]);
        $idGeneratorMock = Mockery::mock(
            IdGeneratorInterface::class,
            function ($mock) use ($order) {
                $mock->shouldReceive('generate')->once()->andReturn($order->getId());
            }
        );
        app()->instance(IdGeneratorInterface::class, $idGeneratorMock);
        $response = $this->call('POST', route('orders.store', []));

        $this->assertEquals(201, $response->status());
        $presenter = app()->make(PlaceOrderUsecaseOutputPortInterface::class);
        $expected = $presenter->transform($order);
        $this->seeJsonContains($expected);
        $this->entityIsPersisted(Order::class, ['id' => $order->getId()]);
    }
}