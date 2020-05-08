<?php
/**
 * Filename: OrderRepository.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Infrastructure\Persistence\Doctrine\Order;


use Podro\TMS\Billing\Domain\Entity\Order\Order;
use Podro\TMS\Billing\Domain\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Billing\Infrastructure\Persistence\Doctrine\AbstractRepository;

class OrderRepository extends AbstractRepository implements OrderRepositoryInterface
{

    protected function getClass(): string
    {
        return Order::class;
    }
}