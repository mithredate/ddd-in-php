<?php

use Doctrine\ORM\EntityManagerInterface;
use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
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
        $this->assertGreaterThan(
            0,
            count($entityManager->getRepository($class)->findBy($data)),
            'Failed asserting that record exists in db'
        );
    }
}
