<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Courier;

class EnadawcaCourierApiFactory
{
    private $enadawcaSessionFactory;

    public function __construct(EnadawcaSessionFactory $enadawcaSessionFactory)
    {
        $this->enadawcaSessionFactory = $enadawcaSessionFactory;
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function create(array $parameters): Courier
    {
        $session = $this->enadawcaSessionFactory
                    ->session(EnadawcaParameters::create($parameters));

        return new Courier(
            new EnadawcaCourierCreateShipment($session),
            new EnadawcaCourierPostShipment($session),
            new EnadawcaCourierGetLabels($session),
            new EnadawcaCourierGetStatuses($session),
            new EnadawcaCourierMakeShipment(),
            new EnadawcaCourierMakeParcel(),
            new EnadawcaCourierMakeReceiver(),
            new EnadawcaCourierMakeSender(),
            new EnadawcaCourierMakeBooking()
        );
    }
}
