<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Abstracts\Parcel;

class EnadawcaParcel extends Parcel
{
    public function validate(): bool
    {
        return true;
    }
}
