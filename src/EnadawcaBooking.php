<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Abstracts\Booking;

class EnadawcaBooking extends Booking
{
    public function validate(): bool
    {
        return true;
    }
}
