<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use ArrayObject;

class EnadawcaParameters extends ArrayObject
{
    const DEFAULT_INSURANCE_TYPE = 'STANDARD';

    public function getInsuranceType()
    {
        return $this->hasProperty('insurance_type') ? $this->insurance_type : self::DEFAULT_INSURANCE_TYPE;
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public static function create(array $parameters): self
    {
        return new self($parameters, ArrayObject::ARRAY_AS_PROPS);
    }

    public function hasProperty(string $name)
    {
        return property_exists($this, $name);
    }
}
