<?php

namespace Podro\TMS\Fulfillment\Core\Entity;


interface RepositoryInterface
{
    public function save(AbstractAggregateRoot $aggregateRoot): void;

    /**
     * @param $id
     *
     * @return null|AbstractAggregateRoot
     */
    public function find($id): ?AbstractAggregateRoot;

    public function beginTransaction(): void;

    public function commit(): void;

    public function rollback(): void;
}