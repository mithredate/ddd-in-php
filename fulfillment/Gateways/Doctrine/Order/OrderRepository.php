<?php
/**
 * Filename: OrderRepository.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Gateways\Doctrine\Order;


use Podro\TMS\Fulfillment\Core\Entity\Order\Order;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Fulfillment\Infrastructure\Persistence\Doctrine\AbstractRepository;

class OrderRepository extends AbstractRepository implements OrderRepositoryInterface
{

    protected function getClass(): string
    {
        return Order::class;
    }
}