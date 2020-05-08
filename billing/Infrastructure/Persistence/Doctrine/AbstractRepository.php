<?php
/**
 * Filename: AbstractFluentRepository.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Podro\TMS\Billing\Domain\Entity\AbstractAggregateRoot;
use Podro\TMS\Billing\Domain\Entity\RepositoryInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * AbstractRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(AbstractAggregateRoot $aggregateRoot): void
    {
        $this->entityManager->persist($aggregateRoot);
        $this->entityManager->flush();
    }

    public function find($id): AbstractAggregateRoot
    {
        return $this->entityManager->find($this->getClass(), $id);
    }

    abstract protected function getClass(): string;

    public function beginTransaction(): void
    {
        $this->entityManager->beginTransaction();
    }

    public function commit(): void
    {
        $this->entityManager->flush();
        $this->entityManager->commit();
    }

    public function rollback(): void
    {
        $this->entityManager->rollback();
    }
}