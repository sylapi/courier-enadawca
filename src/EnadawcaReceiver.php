<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Abstracts\Receiver;

class EnadawcaReceiver extends Receiver
{
    public function validate(): bool
    {
        return true;
    }
}
