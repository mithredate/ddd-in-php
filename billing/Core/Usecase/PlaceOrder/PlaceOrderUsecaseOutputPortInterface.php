<?php
/**
 * Filename: PlaceOrderUsecaseOutputPort.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Core\Usecase\PlaceOrder;


use Podro\TMS\Billing\Core\Entity\Order\Order;

interface PlaceOrderUsecaseOutputPortInterface
{
    public function transform(Order $order);
}