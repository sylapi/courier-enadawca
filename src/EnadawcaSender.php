<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Abstracts\Sender;

class EnadawcaSender extends Sender
{
    public function validate(): bool
    {
        return true;
    }
}
