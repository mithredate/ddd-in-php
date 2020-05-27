<?php

namespace Podro\TMS\Features;

use PHPUnit\Framework\Assert;
use Podro\TMS\Fulfillment\Core\Entity\Order\Package;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\ProviderAPIInterface;

/**
 * Filename: API.
 * User: Mithredate
 * Date: May, 2020
 */
class FakeProviderAPI implements ProviderAPIInterface
{
    private $order;

    public function hasReceivedOrder(): void
    {
        Assert::assertNotNull($this->order);
    }

    public function placeAnOrder($order): void
    {
        $this->order = $order;
    }

    public function providePriceForPackage(Package $package): void
    {
    }
}