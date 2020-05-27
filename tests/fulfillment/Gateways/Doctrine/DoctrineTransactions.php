<?php
/**
 * Filename: DoctrineTransactions.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Gateways\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Laravel\Lumen\Testing\DatabaseTransactions;

trait DoctrineTransactions
{
    use DatabaseTransactions;

    public function beginDatabaseTransaction()
    {
        $entityManager = app()->make(EntityManagerInterface::class);
        $entityManager->beginTransaction();

        $this->beforeApplicationDestroyed(
            function () use ($entityManager) {
                $entityManager->rollback();
                $entityManager->getConnection()->close();
            }
        );
    }
}