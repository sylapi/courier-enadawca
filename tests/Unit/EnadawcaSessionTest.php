<?php

namespace Sylapi\Courier\Enadawca\Tests\Unit;

use SoapClient;
use Sylapi\Courier\Enadawca\EnadawcaSoap;
use Sylapi\Courier\Enadawca\EnadawcaSession;
use Sylapi\Courier\Enadawca\EnadawcaParameters;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;


class EnadawcaSessionTest extends PHPUnitTestCase
{
    public function testEnadawcaSession(): void
    {
        $parameters = EnadawcaParameters::create([
            'apiUrl' => __DIR__.'/../Helpers/test.wsdl',
            'login' => '',
            'password' => '',
            'apiUrlEndpoint' => '',
            'loginTracking' => '',
            'passwordTracking' => '',
            'apiUrlTracking' => __DIR__.'/../Helpers/test.wsdl',
            'packageSize' => 'XL',
            'labelType' => 'ADDRESS_LABEL',
            'labelMethod' => 'EACH_PARCEL_SEPARATELY',
        ]);      
        $enadawcaSession = new EnadawcaSession($parameters);

        $this->assertInstanceOf(EnadawcaParameters::class, $enadawcaSession->parameters());
        $this->assertInstanceOf(EnadawcaSoap::class, $enadawcaSession->client());
        $this->assertInstanceOf(SoapClient::class, $enadawcaSession->clientTracking());
    }
}
