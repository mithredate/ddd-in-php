<?php
/**
 * Filename: PlaceOrderUsecaseInteractor.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Core\Usecase\PlaceOrder;

use Mockery;
use Podro\TMS\Billing\Core\Entity\Order\Order;
use Podro\TMS\Billing\TestCase;
use Podro\TMS\Billing\TestDoubles\PlaceOrderUsecaseIntarctorBuilder;

class PlaceOrderUsecaseInteractorTest extends TestCase
{
    public function testCorrectDataShouldSaveTheOrder()
    {
        $expected = Mockery::mock();
        $sut = (new PlaceOrderUsecaseIntarctorBuilder())->build();
        $sut->idGenerator->shouldReceive('generate')->once()->andReturn('order-id');
        $sut->orderRepository->shouldReceive('save')->with(Order::class)->once();
        $sut->outputPort->shouldReceive('transform')->with(Order::class)->once()->andReturn($expected);

        $actual = $sut->execute('test');

        $this->assertEquals($expected, $actual);
    }
}