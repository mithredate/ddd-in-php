<?php
/**
 * Filename: OrderTransformer.
 * User: Mithredate
 * Date: May, 2020
 */

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use Podro\TMS\Fulfillment\Core\Entity\Order\Order;

class OrderTransformer extends TransformerAbstract
{
    public function transform(Order $order)
    {
        return [
            'id'          => (string)$order->getId(),
            'purchaserId' => (string)$order->getPurchaserId()->getId(),
            'links'       => [
                [
                    'rel' => 'self',
                    'uri' => '/orders/'.$order->getId(),
                ],
            ],
        ];
    }
}