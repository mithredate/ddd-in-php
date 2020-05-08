<?php
/**
 * Filename: OrderMapping.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Infrastructure\Persistence\Doctrine\Order;


use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;
use Podro\TMS\Billing\Domain\Entity\Order\Order;

class OrderMapping extends EntityMapping
{

    public function mapFor()
    {
        return Order::class;
    }

    public function map(Fluent $builder)
    {
        $builder->string('id')->primary();
        $builder->field('id', 'purchaserId');

    }
}