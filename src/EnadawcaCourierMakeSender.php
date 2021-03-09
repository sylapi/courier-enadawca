<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Contracts\CourierMakeSender;
use Sylapi\Courier\Contracts\Sender;

class EnadawcaCourierMakeSender implements CourierMakeSender
{
    public function makeSender(): Sender
    {
        return new EnadawcaSender();
    }
}
