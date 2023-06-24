<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\NumericValidationStrategy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(NumericValidationStrategy::class)]
class NumericValidationStrategyTest extends TestCase
{
    public function testValidateReturnsTrueForNumericValue()
    {
        $strategy = new NumericValidationStrategy();
        $result = $strategy->validate(123);

        $this->assertTrue($result);
    }

    public function testValidateReturnsTrueForFloatValue()
    {
        $strategy = new NumericValidationStrategy();
        $result = $strategy->validate(3.14);

        $this->assertTrue($result);
    }

    public function testValidateReturnsTrueForNumericString()
    {
        $strategy = new NumericValidationStrategy();
        $result = $strategy->validate('456');

        $this->assertTrue($result);
    }

    public function testValidateReturnsFalseForNonNumericValue()
    {
        $strategy = new NumericValidationStrategy();
        $result = $strategy->validate('abc');

        $this->assertFalse($result);
    }
}
