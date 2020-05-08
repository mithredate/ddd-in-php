<?php

use Doctrine\ORM\EntityManagerInterface;
use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Podro\TMS\Billing\Infrastructure\Persistence\Doctrine\DoctrineTransactions;

abstract class TestCase extends BaseTestCase
{
    use DoctrineTransactions;

    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    protected function entityIsPersisted($class, array $data)
    {
        $entityManager = app()->make(EntityManagerInterface::class);

        $this->assertGreaterThan(0, $entityManager->getRepository($class)->findBy($data));
    }
}
