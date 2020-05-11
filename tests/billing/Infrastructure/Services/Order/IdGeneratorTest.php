<?php
/**
 * Filename: IdGeneratorTest.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Infrastructure\Services\Order;

use Podro\TMS\Billing\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Billing\TestCase;

class IdGeneratorTest extends TestCase
{
    public function testContainerShouldResolveTheCorrectInstance()
    {
        $this->assertInstanceOf(IdGenerator::class, app()->make(IdGeneratorInterface::class));
    }

    public function testGenerateShouldGenerateRandomNumbers()
    {
        $sut = new IdGenerator();
        $generated = [];

        for ($i = 0; $i < 100; $i++) {
            $generated[] = $sut->generate();
        }

        $this->assertCount(100, array_unique($generated));
    }
}