<?php

namespace Sylapi\Courier\Enadawca\Tests\Integration;

use Sylapi\Courier\Contracts\Booking;
use Sylapi\Courier\Entities\Response;
use Sylapi\Courier\Exceptions\TransportException;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Enadawca\EnadawcaCourierPostShipment;
use Sylapi\Courier\Enadawca\Tests\Helpers\EnadawcaSessionTrait;

class EnadawcaCourierPostShipmentTest extends PHPUnitTestCase
{
    use EnadawcaSessionTrait;
    
    private $soapMock = null;
    private $sessionMock = null;

    public function getBookingMock($shipmentId)
    {
        $booking = $this->createMock(Booking::class);
        $booking->method('getShipmentId')
            ->willReturn($shipmentId);
        return $booking;
    }

    public function setUp(): void
    {
        $this->soapMock = $this->getEnadawcaSoapMock();
        $this->sessionMock = $this->getSessionMock($this->soapMock);
    }

    public function testPostShipmentSuccess(): void
    {
        $this->soapMock->expects($this->any())
        ->method('call')
        ->willReturnCallback(function ($methodName) {
            if ('sendEnvelope' === $methodName) {
                return simplexml_load_string(file_get_contents(__DIR__.'/Mock/sendEnvelopeSuccess.xml'));
            }                
        });

        $postShipment = new EnadawcaCourierPostShipment($this->sessionMock);
        $shipmentId = (string) rand(1000,9999);
        $booking = $this->getBookingMock($shipmentId);
        $response = $postShipment->postShipment($booking);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals($shipmentId, (string) $response->shipmentId);
        $this->assertEquals('1234567890', (string) $response->trackingId);
    }

    public function testPostShipmentFailure(): void
    {
        $this->soapMock->expects($this->any())
            ->method('call')
            ->willThrowException(new TransportException());


        $postShipment = new EnadawcaCourierPostShipment($this->sessionMock);
        $shipmentId = (string) rand(1000,9999);
        $booking = $this->getBookingMock($shipmentId);
        $response = $postShipment->postShipment($booking);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertTrue($response->hasErrors());
        $this->assertInstanceOf(TransportException::class, $response->getFirstError());
    }
}
