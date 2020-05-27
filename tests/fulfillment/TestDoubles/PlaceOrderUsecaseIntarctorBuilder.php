<?php
/**
 * Filename: PlaceOrderUsecaseIntarctorBuilder.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\TestDoubles;


use Mockery;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseInteractor;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseOutputPortInterface;

class PlaceOrderUsecaseIntarctorBuilder
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var IdGeneratorInterface
     */
    private $idGenerator;
    /**
     * @var PlaceOrderUsecaseOutputPortInterface
     */
    private $outputPort;

    /**
     * PlaceOrderUsecaseIntarctorBuilder constructor.
     */
    public function __construct()
    {
        $this->orderRepository = Mockery::mock(OrderRepositoryInterface::class);
        $this->idGenerator = Mockery::mock(IdGeneratorInterface::class);
        $this->outputPort = Mockery::mock(PlaceOrderUsecaseOutputPortInterface::class);
    }

    public function build(): PlaceOrderUsecaseInteractor
    {
        return new PlaceOrderUsecaseInteractor($this->orderRepository, $this->idGenerator, $this->outputPort);
    }
}