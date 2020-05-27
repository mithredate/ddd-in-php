<?php
/**
 * Filename: PlaceOrderUsecaseInputPort.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder;


interface PlaceOrderUsecaseInputPortInterface
{
    public function execute(string $purchaserId);
}