<?php
/**
 * Filename: OrderControllerTest.
 * User: Mithredate
 * Date: May, 2020
 */

namespace App\Http\Controllers\Order;

use App\Http\Response\ResponseFactoryInterface;
use Illuminate\Http\JsonResponse;
use Mockery;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseInputPortInterface;
use Podro\TMS\Fulfillment\TestCase;

class OrderControllerTest extends TestCase
{
    public function testShouldWork()
    {
        $expected = Mockery::mock(JsonResponse::class);
        $response = [];
        $sut = new OrderController(
            Mockery::mock(PlaceOrderUsecaseInputPortInterface::class),
            Mockery::mock(ResponseFactoryInterface::class)
        );
        $sut->placeOrderUsecase->shouldReceive('execute')->with('test')->once()->andReturn($response);
        $sut->responseFactory->shouldReceive('json')->with($response, 201)->once()->andReturn($expected);

        $actual = $sut->store();

        $this->assertEquals($expected, $actual);
    }
}