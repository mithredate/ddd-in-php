<?php

namespace Podro\TMS\Billing\Domain\Entity;

abstract class AbstractValueObject
{
    public function equals($other): bool
    {
        return get_class($this) === get_class($other) &&
            $this->equalsCore($other);
    }

    abstract protected function equalsCore($other): bool;
}