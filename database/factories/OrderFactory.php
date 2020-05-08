<?php

/** @var LaravelDoctrine\ORM\Testing\Factory $factory */

use Faker\Generator as Faker;
use Podro\TMS\Billing\Domain\Entity\Order\Order;
use Podro\TMS\Billing\Domain\Entity\Order\PurchaserId;

$factory->define(
    Order::class,
    function (Faker $faker) {
        return [
            'id'          => $faker->uuid,
            'purchaserId' => new PurchaserId($faker->uuid),
        ];
    }
);
