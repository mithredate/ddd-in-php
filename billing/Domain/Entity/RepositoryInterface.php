<?php

namespace Podro\TMS\Billing\Domain\Entity;


interface RepositoryInterface
{
    public function save(AbstractAggregateRoot $aggregateRoot): void;

    public function find($id): AbstractAggregateRoot;

    public function beginTransaction(): void;

    public function commit(): void;

    public function rollback(): void;
}