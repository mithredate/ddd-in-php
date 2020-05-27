<?php

namespace Podro\TMS\Fulfillment\Core\Entity;

abstract class AbstractIdentifier extends AbstractValueObject
{
    protected $id;

    /**
     * AbstractIdentifier constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function equalsCore($other): bool
    {
        return $this->getId() === $other->getId();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}