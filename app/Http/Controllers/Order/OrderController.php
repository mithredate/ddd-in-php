<?php

namespace App\Http\Controllers\Order;


use App\Http\Controllers\Controller;
use App\Http\Response\ResponseFactoryInterface;
use Podro\TMS\Fulfillment\Core\Usecase\PlaceOrder\PlaceOrderUsecaseInputPortInterface;

class OrderController extends Controller
{

    /**
     * @var PlaceOrderUsecaseInputPortInterface
     */
    public $placeOrderUsecase;
    /**
     * @var ResponseFactoryInterface
     */
    public $responseFactory;


    /**
     * OrderController constructor.
     *
     * @param PlaceOrderUsecaseInputPortInterface $placeOrderUsecase
     * @param ResponseFactoryInterface $responseFactory
     */
    public function __construct(
        PlaceOrderUsecaseInputPortInterface $placeOrderUsecase,
        ResponseFactoryInterface $responseFactory
    ) {
        $this->placeOrderUsecase = $placeOrderUsecase;
        $this->responseFactory = $responseFactory;
    }

    public function store()
    {
        return $this->responseFactory->json(
            $this->placeOrderUsecase->execute('test'),
            201
        );
    }
}