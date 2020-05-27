<?php
/**
 * Filename: ForbidMockingNonexistingMethods.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment;

use Mockery;

trait ForbidMockingNonexistingMethods
{
    protected function setUp(): void
    {
        parent::setUp();
        Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
    }
}