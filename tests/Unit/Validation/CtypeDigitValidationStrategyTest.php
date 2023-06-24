<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\CtypeDigitValidationStrategy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CtypeDigitValidationStrategy::class)]
class CtypeDigitValidationStrategyTest extends TestCase
{
    public function testValidateReturnsTrueForValidNumericValue()
    {
        $strategy = new CtypeDigitValidationStrategy();
        $result = $strategy->validate('123');

        $this->assertTrue($result);
    }

    public function testValidateReturnsFalseForNonNumericValue()
    {
        $strategy = new CtypeDigitValidationStrategy();
        $result = $strategy->validate('abc');

        $this->assertFalse($result);
    }
}
