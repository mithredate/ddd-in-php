<?php
/**
 * Filename: Order.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Core\Entity\Order;


use Podro\TMS\Fulfillment\Core\Entity\AbstractAggregateRoot;

class Order extends AbstractAggregateRoot
{

    private $purchaserId;

    /**
     * Order constructor.
     *
     * @param $id
     * @param $purchaserId
     */
    public function __construct($id, $purchaserId)
    {
        $this->id = $id;
        $this->purchaserId = $purchaserId;
    }

    public function getPurchaserId()
    {
        return $this->purchaserId;
    }
}