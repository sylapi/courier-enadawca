<?php

namespace Sylapi\Courier\Enadawca\Tests\Integration;

use Sylapi\Courier\Entities\Label;
use Sylapi\Courier\Exceptions\TransportException;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Enadawca\EnadawcaCourierGetLabels;
use Sylapi\Courier\Enadawca\Tests\Helpers\EnadawcaSessionTrait;

class EnadawcaCourierGetLabelsTest extends PHPUnitTestCase
{
    use EnadawcaSessionTrait;
    
    private $soapMock = null;
    private $sessionMock = null;

    public function setUp(): void
    {
        $this->soapMock = $this->getEnadawcaSoapMock();
        $this->sessionMock = $this->getSessionMock($this->soapMock);
    }
        
    public function testGetLabelsSuccess(): void
    {
        $this->soapMock->expects($this->any())
            ->method('call')
            ->willReturnCallback(function ($methodName) {
                if ('getPrintForParcel' === $methodName) {
                    return simplexml_load_string(file_get_contents(__DIR__.'/Mock/getPrintForParcelSuccess.xml'));
                }                
            });

        $getLabel = new EnadawcaCourierGetLabels($this->sessionMock);
        $response = $getLabel->getLabel((string) rand(1000,9999));

        $this->assertInstanceOf(Label::class, $response);
        $this->assertEquals('print', (string) $response);
    }

    public function testGetLabelsFailure(): void
    {
        $this->soapMock->expects($this->any())
            ->method('call')
            ->willThrowException(new TransportException());

        $getLabel = new EnadawcaCourierGetLabels($this->sessionMock);
        $response = $getLabel->getLabel((string) rand(1000,9999));
        $this->assertInstanceOf(Label::class, $response);
        $this->assertTrue($response->hasErrors());
        $this->assertInstanceOf(TransportException::class, $response->getFirstError());
    }
}
