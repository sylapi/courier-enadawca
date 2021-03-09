<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Contracts\Booking;
use Sylapi\Courier\Contracts\CourierMakeBooking;

class EnadawcaCourierMakeBooking implements CourierMakeBooking
{
    public function makeBooking(): Booking
    {
        return new EnadawcaBooking();
    }
}
