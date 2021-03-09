<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Contracts\CourierMakeShipment;
use Sylapi\Courier\Contracts\Shipment;

class EnadawcaCourierMakeShipment implements CourierMakeShipment
{
    public function makeShipment(): Shipment
    {
        return new EnadawcaShipment();
    }
}
