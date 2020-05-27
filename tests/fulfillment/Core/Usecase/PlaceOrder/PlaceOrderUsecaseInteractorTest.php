<?php
/**
 * Filename: PlaceOrderUsecaseInteractor.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder;

use Mockery;
use Podro\TMS\Fulfillment\Core\Entity\Order\Order;
use Podro\TMS\Fulfillment\TestCase;
use Podro\TMS\Fulfillment\TestDoubles\PlaceOrderUsecaseIntarctorBuilder;

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