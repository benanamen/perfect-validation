<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\WhitelistValidationStrategy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WhitelistValidationStrategy::class)]
class WhitelistValidationStrategyTest extends TestCase
{
    public function testValidateReturnsTrueForValidData()
    {
        $whitelist = ['username', 'password'];
        $data = [
            'username' => 'john',
            'password' => 'secret',
        ];

        $strategy = new WhitelistValidationStrategy($whitelist);
        $result = $strategy->validate($data);

        $this->assertTrue($result);
    }

    public function testValidateReturnsFalseForInvalidData()
    {
        $whitelist = ['username', 'password'];
        $data = [
            'username' => 'john',
            'password' => 'secret',
            'email' => 'john@example.com',
        ];

        $strategy = new WhitelistValidationStrategy($whitelist);
        $result = $strategy->validate($data);

        $this->assertFalse($result);
    }
}
