<?php

namespace Sylapi\Courier\Enadawca\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Courier;
use Sylapi\Courier\Enadawca\EnadawcaBooking;
use Sylapi\Courier\Enadawca\EnadawcaCourierApiFactory;
use Sylapi\Courier\Enadawca\EnadawcaParameters;
use Sylapi\Courier\Enadawca\EnadawcaParcel;
use Sylapi\Courier\Enadawca\EnadawcaReceiver;
use Sylapi\Courier\Enadawca\EnadawcaSender;
use Sylapi\Courier\Enadawca\EnadawcaSession;
use Sylapi\Courier\Enadawca\EnadawcaSessionFactory;
use Sylapi\Courier\Enadawca\EnadawcaShipment;

class EnadawcaCourierApiFactoryTest extends PHPUnitTestCase
{
    /**
     * @var array<string,mixed>
     */
    private $parameters = [
        'login'           => 'login',
        'password'        => 'password',
        'sandbox'         => true,
    ];

    public function testEnadawcaSessionFactory(): void
    {
        $EnadawcaSessionFactory = new EnadawcaSessionFactory();
        $EnadawcaSession = $EnadawcaSessionFactory->session(
            EnadawcaParameters::create($this->parameters)
        );
        $this->assertInstanceOf(EnadawcaSession::class, $EnadawcaSession);
    }

    public function testCourierFactoryCreate(): void
    {
        $EnadawcaCourierApiFactory = new EnadawcaCourierApiFactory(new EnadawcaSessionFactory());
        $courier = $EnadawcaCourierApiFactory->create($this->parameters);

        $this->assertInstanceOf(Courier::class, $courier);
        $this->assertInstanceOf(EnadawcaBooking::class, $courier->makeBooking());
        $this->assertInstanceOf(EnadawcaParcel::class, $courier->makeParcel());
        $this->assertInstanceOf(EnadawcaReceiver::class, $courier->makeReceiver());
        $this->assertInstanceOf(EnadawcaSender::class, $courier->makeSender());
        $this->assertInstanceOf(EnadawcaShipment::class, $courier->makeShipment());
    }
}
