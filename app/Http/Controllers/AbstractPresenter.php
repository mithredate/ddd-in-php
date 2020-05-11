<?php
/**
 * Filename: AbstractPresenter.
 * User: Mithredate
 * Date: May, 2020
 */

namespace App\Http\Controllers;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;

abstract class AbstractPresenter
{
    /**
     * @var Manager
     */
    private $manager;


    /**
     * PlaceOrderPresenter constructor.
     *
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    protected function transformItem($item)
    {
        $transformer = $this->getTransformer();
        $resource = new Item($item, new $transformer());

        return $this->manager->createData($resource)->toArray();
    }


    abstract protected function getTransformer(): string;

}