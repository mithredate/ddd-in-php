<?php
/**
 * Filename: TestCase.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment;

use Podro\TMS\Fulfillment\Gateways\Doctrine\DoctrineTransactions;

class TestCase extends \TestCase
{
    use ForbidMockingNonexistingMethods;
    use DoctrineTransactions;
}