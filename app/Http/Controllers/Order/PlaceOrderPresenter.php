<?php
/**
 * Filename: SaveOrderTransformer.
 * User: Mithredate
 * Date: May, 2020
 */

namespace App\Http\Controllers\Order;

use App\Http\Controllers\AbstractPresenter;
use App\Http\Transformers\OrderTransformer;
use Podro\TMS\Fulfillment\Core\Entity\Order\Order;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseOutputPortInterface;

class PlaceOrderPresenter extends AbstractPresenter implements PlaceOrderUsecaseOutputPortInterface
{

    public function transform(Order $order)
    {
        return $this->transformItem($order);
    }

    protected function getTransformer(): string
    {
        return OrderTransformer::class;
    }
}