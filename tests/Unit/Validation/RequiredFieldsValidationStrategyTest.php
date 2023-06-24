<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\RequiredFieldsValidationStrategy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RequiredFieldsValidationStrategy::class)]
class RequiredFieldsValidationStrategyTest extends TestCase
{
    public function testValidateReturnsTrueForValidData()
    {
        $requiredFields = ['username', 'password'];
        $data = [
            'username' => 'john',
            'password' => 'secret',
        ];

        $strategy = new RequiredFieldsValidationStrategy($requiredFields);
        $result = $strategy->validate($data);

        $this->assertTrue($result);
    }

    public function testValidateReturnsFalseForMissingRequiredFields()
    {
        $requiredFields = ['username', 'password'];
        $data = [
            'username' => 'john',
        ];

        $strategy = new RequiredFieldsValidationStrategy($requiredFields);
        $result = $strategy->validate($data);

        $this->assertFalse($result);
    }

    public function testGetErrorsReturnsEmptyArrayForValidData()
    {
        $requiredFields = ['username', 'password'];
        $data = [
            'username' => 'john',
            'password' => 'secret',
        ];

        $strategy = new RequiredFieldsValidationStrategy($requiredFields);
        $strategy->validate($data);
        $errors = $strategy->getErrors();

        $this->assertEmpty($errors);
    }

    public function testGetErrorsReturnsArrayWithErrorMessageForMissingRequiredFields()
    {
        $requiredFields = ['username', 'password'];
        $data = [
            'username' => 'john',
        ];

        $strategy = new RequiredFieldsValidationStrategy($requiredFields);
        $strategy->validate($data);
        $errors = $strategy->getErrors();

        $expectedErrors = [
            'password' => 'Password is required.',
        ];

        $this->assertEquals($expectedErrors, $errors);
    }
}
