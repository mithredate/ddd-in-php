<?php
/**
 * Filename: CreateOrderTest.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Features;

use PHPUnit\Framework\TestCase;
use Podro\TMS\Fulfillment\Core\Entity\Order\Package;

class CreateOrderTest extends TestCase
{

    /**
     * @var ApplicationRunner
     */
    private $application;

    /**
     * @var FakeProviderAPI
     */
    private $providerAPI;


    private $package;

    protected function setUp(): void
    {
        $this->application = new ApplicationRunner();
        $this->providerAPI = new FakeProviderAPI();
        $this->package = new Package();
    }

    public function testNewOrdersFromShipmentShouldBeInInitialState()
    {
        $this->providerAPI->providePriceForPackage($this->package);
        $this->application->placeAnOrderOnForPackage($this->providerAPI, $this->package);
        $this->providerAPI->hasReceivedPriceQuoteForPackage($this->package);
        $this->providerAPI->hasReceivedOrderForPackage($this->package);
        $this->application->showOrderWasPlacedInInitialStateFor($this->providerAPI, $this->package);
    }
}