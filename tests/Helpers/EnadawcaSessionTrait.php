<?php

namespace Sylapi\Courier\Enadawca\Tests\Helpers;

use Sylapi\Courier\Enadawca\EnadawcaParameters;
use Sylapi\Courier\Enadawca\EnadawcaSession;
use Sylapi\Courier\Enadawca\EnadawcaSoap;

trait EnadawcaSessionTrait
{
    private function getEnadawcaSoapMock()
    {
        return $this->getMockBuilder(EnadawcaSoap::class)
                    ->disableOriginalConstructor()
                    ->getMock();
    }

    private function getSoapMock()
    {
        return $this->getMockBuilder('SoapClient')
                    ->disableOriginalConstructor()
                    ->getMock();
    }

    private function getSessionMock($soapMock, $method = 'client')
    {
        $parameters = EnadawcaParameters::create([
            'packageSize' => 'XL',
            'labelType' => 'ADDRESS_LABEL',
            'labelMethod' => 'EACH_PARCEL_SEPARATELY',
        ]);

        $sessionMock = $this->createMock(EnadawcaSession::class);
        $sessionMock->method($method)
            ->willReturn($soapMock);
        $sessionMock->method('parameters')
            ->willReturn($parameters);

        return $sessionMock;
    }
}
