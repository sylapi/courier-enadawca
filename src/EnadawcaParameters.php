<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use ArrayObject;

class EnadawcaParameters extends ArrayObject
{

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
