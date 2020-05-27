<?php
/**
 * Filename: PlaceOrderUsecaseInteractor.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder;

use Podro\TMS\Fulfillment\Core\Entity\Order\Order;
use Podro\TMS\Fulfillment\Core\Entity\Order\PurchaserId;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\IdGeneratorInterface;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\OrderRepositoryInterface;
use Podro\TMS\Fulfillment\Core\Entity\Order\Services\ProviderAPIInterface;

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
     * @var ProviderAPIInterface
     */
    private $providerAPI;


    /**
     * PlaceOrderUsecaseInteractor constructor.
     *
     * @param OrderRepositoryInterface $orderRepository
     * @param IdGeneratorInterface $idGenerator
     * @param PlaceOrderUsecaseOutputPortInterface $outputPort
     * @param ProviderAPIInterface $providerAPI
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        IdGeneratorInterface $idGenerator,
        PlaceOrderUsecaseOutputPortInterface $outputPort,
        ProviderAPIInterface $providerAPI
    ) {
        $this->orderRepository = $orderRepository;
        $this->idGenerator = $idGenerator;
        $this->outputPort = $outputPort;
        $this->providerAPI = $providerAPI;
    }

    public function execute(string $purchaserId)
    {
        $order = new Order($this->idGenerator->generate(), new PurchaserId($purchaserId));
        $this->orderRepository->save($order);
        $this->providerAPI->placeAnOrder($order);

        return $this->outputPort->transform($order);
    }
}