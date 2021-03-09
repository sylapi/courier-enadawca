<?php

namespace Sylapi\Courier\Enadawca\Tests\Integration;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Contracts\Response;
use Sylapi\Courier\Enadawca\EnadawcaCourierCreateShipment;
use Sylapi\Courier\Enadawca\EnadawcaParcel;
use Sylapi\Courier\Enadawca\EnadawcaReceiver;
use Sylapi\Courier\Enadawca\EnadawcaSender;
use Sylapi\Courier\Enadawca\EnadawcaShipment;
use Sylapi\Courier\Enadawca\Tests\Helpers\EnadawcaSessionTrait;
use Sylapi\Courier\Exceptions\TransportException;

class EnadawcaCourierCreateShipmentTest extends PHPUnitTestCase
{
    use EnadawcaSessionTrait;

    private $soapMock = null;
    private $sessionMock = null;

    public function setUp(): void
    {
        $this->soapMock = $this->getEnadawcaSoapMock();
        $this->sessionMock = $this->getSessionMock($this->soapMock);
    }

    private function getShipmentMock()
    {
        $senderMock = $this->createMock(EnadawcaSender::class);
        $receiverMock = $this->createMock(EnadawcaReceiver::class);
        $parcelMock = $this->createMock(EnadawcaParcel::class);
        $shipmentMock = $this->createMock(EnadawcaShipment::class);

        $shipmentMock->method('getSender')
                ->willReturn($senderMock);

        $shipmentMock->method('getReceiver')
                ->willReturn($receiverMock);

        $shipmentMock->method('getParcel')
                ->willReturn($parcelMock);

        return $shipmentMock;
    }

    public function testCreateShipmentSuccess(): void
    {
        $this->soapMock->expects($this->any())
            ->method('call')
            ->willReturnCallback(function ($methodName) {
                if ('clearEnvelope' === $methodName) {
                    return simplexml_load_string(file_get_contents(__DIR__.'/Mock/clearEnvelopeSuccess.xml'));
                }
                if ('getGuid' === $methodName) {
                    return simplexml_load_string(file_get_contents(__DIR__.'/Mock/getGuidSuccess.xml'));
                }
                if ('addShipment' === $methodName) {
                    return simplexml_load_string(file_get_contents(__DIR__.'/Mock/addShippmentSuccess.xml'));
                }
            });

        $createShipment = new EnadawcaCourierCreateShipment($this->sessionMock);
        $response = $createShipment->createShipment($this->getShipmentMock());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertObjectHasAttribute('shipmentId', $response);
        $this->assertNotEmpty($response->shipmentId);
    }

    public function testCreateShipmentFailure(): void
    {
        $this->soapMock->expects($this->any())
            ->method('call')
            ->willThrowException(new TransportException());

        $createShipment = new EnadawcaCourierCreateShipment($this->sessionMock);
        $response = $createShipment->createShipment($this->getShipmentMock());
        $this->assertInstanceOf(Response::class, $response);
        $this->assertObjectNotHasAttribute('shipmentId', $response);
        $this->assertTrue($response->hasErrors());
        $this->assertInstanceOf(TransportException::class, $response->getFirstError());
    }
}
