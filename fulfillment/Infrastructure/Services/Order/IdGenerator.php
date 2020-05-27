<?php
/**
 * Filename: IdGenerator.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Infrastructure\Services\Order;

use Illuminate\Support\Str;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\IdGeneratorInterface;

class IdGenerator implements IdGeneratorInterface
{
    public function generate()
    {
        return Str::uuid();
    }
}