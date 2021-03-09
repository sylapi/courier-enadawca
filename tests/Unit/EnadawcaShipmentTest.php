<?php

namespace Sylapi\Courier\Enadawca\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Enadawca\EnadawcaParcel;
use Sylapi\Courier\Enadawca\EnadawcaReceiver;
use Sylapi\Courier\Enadawca\EnadawcaSender;
use Sylapi\Courier\Enadawca\EnadawcaShipment;

class EnadawcaShipmentTest extends PHPUnitTestCase
{
    public function testNumberOfPackagesIsAlwaysEqualTo1(): void
    {
        $parcel = new EnadawcaParcel();
        $shipment = new EnadawcaShipment();
        $shipment->setParcel($parcel);
        $shipment->setParcel($parcel);

        $this->assertEquals(1, $shipment->getQuantity());
    }

    public function testShipmentValidate(): void
    {
        $receiver = new EnadawcaReceiver();
        $sender = new EnadawcaSender();
        $parcel = new EnadawcaParcel();

        $shipment = new EnadawcaShipment();
        $shipment->setSender($sender)
            ->setReceiver($receiver)
            ->setParcel($parcel);

        $this->assertIsBool($shipment->validate());
        $this->assertIsBool($shipment->getReceiver()->validate());
        $this->assertIsBool($shipment->getSender()->validate());
        $this->assertIsBool($shipment->getParcel()->validate());
    }
}
