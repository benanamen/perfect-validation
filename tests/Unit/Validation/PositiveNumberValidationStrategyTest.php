<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\PositiveNumberValidationStrategy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PositiveNumberValidationStrategy::class)]
class PositiveNumberValidationStrategyTest extends TestCase
{
    public function testValidateReturnsTrueForPositiveNumber()
    {
        $strategy = new PositiveNumberValidationStrategy();
        $result = $strategy->validate(10);
        $this->assertTrue($result);
    }

    public function testValidateReturnsFalseForNegativeNumber()
    {
        $strategy = new PositiveNumberValidationStrategy();
        $result = $strategy->validate(-5);
        $this->assertFalse($result);
    }

    public function testValidateReturnsFalseForZero()
    {
        $strategy = new PositiveNumberValidationStrategy();
        $result = $strategy->validate(0);
        $this->assertFalse($result);
    }

    public function testValidateReturnsFalseForNonNumericValue()
    {
        $strategy = new PositiveNumberValidationStrategy();
        $result = $strategy->validate('abc');
        $this->assertFalse($result);
    }
}
