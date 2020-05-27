<?php
/**
 * Filename: OrderTest.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Core\Entity\Order;

use Podro\TMS\Fulfillment\TestCase;

class OrderTest extends TestCase
{
    /**
     * @dataProvider purchaserIdDataProvider
     *
     * @param $purchaserId
     */
    public function testOrderShouldReturnPurchaserId($purchaserId)
    {
        $expected = new PurchaserId($purchaserId);
        $sut = new Order('dummy', $expected);

        $actual = $sut->getPurchaserId();

        $this->assertEquals($expected, $actual);
    }

    public function purchaserIdDataProvider()
    {
        return [
            ['purchaser-id'],
            ['another-purchaser-id'],
        ];
    }
}