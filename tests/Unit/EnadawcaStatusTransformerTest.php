<?php

namespace Sylapi\Courier\Enadawca\Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Enums\StatusType;
use Sylapi\Courier\Enadawca\EnadawcaStatusTransformer;

class EnadawcaStatusTransformerTest extends PHPUnitTestCase
{
    public function testStatusTransformer(): void
    {
        $enadawcaStatusTransformer = new EnadawcaStatusTransformer('P_D');
        $this->assertEquals(StatusType::DELIVERED, (string) $enadawcaStatusTransformer);
    }
}
