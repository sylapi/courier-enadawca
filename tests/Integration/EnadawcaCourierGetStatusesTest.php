<?php

namespace Sylapi\Courier\Enadawca\Tests\Integration;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Enadawca\EnadawcaCourierGetStatuses;
use Sylapi\Courier\Enadawca\Tests\Helpers\EnadawcaSessionTrait;
use Sylapi\Courier\Entities\Status;
use Sylapi\Courier\Exceptions\TransportException;

class EnadawcaCourierGetStatusesTest extends PHPUnitTestCase
{
    use EnadawcaSessionTrait;

    private $soapMock = null;
    private $sessionMock = null;

    public function setUp(): void
    {
        $this->soapMock = $this->getSoapMock();
        $this->sessionMock = $this->getSessionMock($this->soapMock, 'clientTracking');
    }

    public function testGetStatusSuccess(): void
    {
        $this->soapMock->expects($this->any())
            ->method('__soapCall')
            ->willReturnCallback(function ($methodName) {
                if ('sprawdzPrzesylkePl' === $methodName) {
                    return simplexml_load_string(file_get_contents(__DIR__.'/Mock/sprawdzPrzesylkePlSuccess.xml'));
                }
            });

        $getStatus = new EnadawcaCourierGetStatuses($this->sessionMock);
        $trackingId = (string) rand(1000, 9999);
        $response = $getStatus->getStatus($trackingId);
        $this->assertInstanceOf(Status::class, $response);
        $this->assertTrue(true);
    }

    public function testGetStatusFailure(): void
    {
        $this->soapMock->expects($this->any())
        ->method('__soapCall')
        ->willReturnCallback(function ($methodName) {
            if ('sprawdzPrzesylkePl' === $methodName) {
                return simplexml_load_string(file_get_contents(__DIR__.'/Mock/sprawdzPrzesylkePlFailure.xml'));
            }
        });
        $getStatus = new EnadawcaCourierGetStatuses($this->sessionMock);
        $trackingId = (string) rand(1000, 9999);
        $response = $getStatus->getStatus($trackingId);
        $this->assertInstanceOf(Status::class, $response);
        $this->assertTrue($response->hasErrors());
        $this->assertInstanceOf(TransportException::class, $response->getFirstError());
    }
}
