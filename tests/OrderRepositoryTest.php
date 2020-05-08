<?php

use Podro\TMS\Billing\Domain\Entity\Order\Order;
use Podro\TMS\Billing\Domain\Entity\Order\PurchaserId;
use Podro\TMS\Billing\Domain\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Billing\Infrastructure\Persistence\Doctrine\Order\OrderRepository;

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
}
