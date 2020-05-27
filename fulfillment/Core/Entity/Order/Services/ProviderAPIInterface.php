<?php
/**
 * Filename: ProviderAPIInterface.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Core\Entity\Order\Services;


interface ProviderAPIInterface
{
    public function placeAnOrder($order): void;
}