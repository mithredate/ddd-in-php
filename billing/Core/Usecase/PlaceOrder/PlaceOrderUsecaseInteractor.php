<?php
/**
 * Filename: PlaceOrderUsecaseInteractor.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Core\Usecase\PlaceOrder;

use Podro\TMS\Billing\Core\Entity\Order\Order;
use Podro\TMS\Billing\Core\Entity\Order\PurchaserId;
use Podro\TMS\Billing\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Billing\Core\Entity\Order\Services\OrderRepositoryInterface;

class PlaceOrderUsecaseInteractor implements PlaceOrderUsecaseInputPortInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    public $orderRepository;
    /**
     * @var IdGeneratorInterface
     */
    public $idGenerator;
    /**
     * @var PlaceOrderUsecaseOutputPortInterface
     */
    public $outputPort;


    /**
     * PlaceOrderUsecaseInteractor constructor.
     *
     * @param OrderRepositoryInterface $orderRepository
     * @param IdGeneratorInterface $idGenerator
     * @param PlaceOrderUsecaseOutputPortInterface $outputPort
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        IdGeneratorInterface $idGenerator,
        PlaceOrderUsecaseOutputPortInterface $outputPort
    ) {
        $this->orderRepository = $orderRepository;
        $this->idGenerator = $idGenerator;
        $this->outputPort = $outputPort;
    }

    public function execute(string $purchaserId)
    {
        $order = new Order($this->idGenerator->generate(), new PurchaserId($purchaserId));
        $this->orderRepository->save($order);

        return $this->outputPort->transform($order);
    }
}