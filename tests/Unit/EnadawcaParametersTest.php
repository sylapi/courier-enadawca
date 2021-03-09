<?php

namespace Sylapi\Courier\Enadawca\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Enadawca\EnadawcaParameters;

class EnadawcaParametersTest extends PHPUnitTestCase
{
    public function testHasProperty(): void
    {
        $parameters = EnadawcaParameters::create([
            'success' => true,
        ]);

        $this->assertTrue($parameters->hasProperty('success'));
        $this->assertFalse($parameters->hasProperty('faild'));
    }
}
