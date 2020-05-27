<?php
/**
 * Filename: PlaceOrderUsecaseOutputPort.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder;


use Podro\TMS\Fulfillment\Core\Entity\Order\Order;

interface PlaceOrderUsecaseOutputPortInterface
{
    public function transform(Order $order);
}