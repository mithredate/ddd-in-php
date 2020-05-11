<?php
/**
 * Filename: TestCase.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing;

use Podro\TMS\Billing\Gateways\Doctrine\DoctrineTransactions;

class TestCase extends \TestCase
{
    use ForbidMockingNonexistingMethods;
    use DoctrineTransactions;
}