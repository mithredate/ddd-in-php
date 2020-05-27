<?php

namespace Podro\TMS\Fulfillment\Gateways\Doctrine\Order;

use Podro\TMS\Fulfillment\Core\Entity\Order\Order;
use Podro\TMS\Fulfillment\Core\Entity\Order\PurchaserId;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Fulfillment\TestCase;

class OrderRepositoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOrderRepositoryInterfaceShouldBeConstructable()
    {
        $this->assertInstanceOf(OrderRepository::class, app()->make(OrderRepositoryInterface::class));
    }

    public function testOrderRepositoryShouldSaveAnOrder()
    {
        $sut = app()->make(OrderRepositoryInterface::class);
        $order = new Order('order-id', new PurchaserId('purchaser-id'));
        $sut->save($order);

        $this->entityIsPersisted(Order::class, ['id' => 'order-id', 'purchaserId' => new PurchaserId('purchaser-id')]);
    }

    public function testRepositoryShouldFetchTheExistingOrder()
    {
        $orderId = 'order-id';
        $purchaserId = 'purchaser-id';
        entity(Order::class)->create(['id' => $orderId, 'purchaserId' => new PurchaserId($purchaserId)]);
        $sut = app()->make(OrderRepositoryInterface::class);

        $actual = $sut->find($orderId);

        $expected = new Order($orderId, new PurchaserId($purchaserId));
        $this->assertEquals($expected, $actual);
        $this->assertTrue($actual->equals($expected));
    }
}
