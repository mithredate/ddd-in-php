<?php

namespace Podro\TMS\Fulfillment\Core\Entity;

abstract class AbstractEntity
{
    protected $id;

    public function equals($other)
    {
        return get_class($this) === get_class($other) &&
            $this->getId() === $other->getId();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}