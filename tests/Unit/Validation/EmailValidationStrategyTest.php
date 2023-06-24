<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\EmailValidationStrategy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(EmailValidationStrategy::class)]
class EmailValidationStrategyTest extends TestCase
{
    public function testValidateReturnsTrueForValidEmailAddress()
    {
        $strategy = new EmailValidationStrategy();
        $result = $strategy->validate('test@example.com');

        $this->assertTrue($result);
    }

    public function testValidateReturnsFalseForInvalidEmailAddress()
    {
        $strategy = new EmailValidationStrategy();
        $result = $strategy->validate('invalid_email');

        $this->assertFalse($result);
    }
}
