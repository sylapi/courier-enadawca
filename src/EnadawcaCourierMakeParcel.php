<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Contracts\CourierMakeParcel;
use Sylapi\Courier\Contracts\Parcel;

class EnadawcaCourierMakeParcel implements CourierMakeParcel
{
    public function makeParcel(): Parcel
    {
        return new EnadawcaParcel();
    }
}
