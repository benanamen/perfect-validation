<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\RequiredFieldsValidationStrategy;
use PerfectApp\Validation\ValidationStrategy;
use PerfectApp\Validation\Validator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Validator::class)]
class ValidatorTest extends TestCase
{
    private array $testDataArray;

    protected function setUp(): void
    {
        $this->testDataArray = ['key' => 'value'];
    }

    public function testValidateDataReturnsValidationResult()
    {
        $strategy = $this->createMock(ValidationStrategy::class);
        $strategy->expects($this->once())
            ->method('validate')
            ->with($this->testDataArray)
            ->willReturn(true);

        $validator = new Validator($strategy);
        $result = $validator->validateData($this->testDataArray);
        $this->assertTrue($result);
    }

    public function testSetValidationStrategyChangesStrategy()
    {
        $strategy1 = $this->createMock(ValidationStrategy::class);
        $strategy2 = $this->createMock(ValidationStrategy::class);

        $validator = new Validator($strategy1);
        $validator->setValidationStrategy($strategy2);

        $reflector = new \ReflectionClass($validator);
        $property = $reflector->getProperty('strategy');
        $property->setAccessible(true);
        $currentStrategy = $property->getValue($validator);

        $this->assertSame($strategy2, $currentStrategy);
    }

    public function testValidateDataWithErrorsReturnsIsValidTrue(): void
    {
        $strategy = $this->createMock(ValidationStrategy::class);
        $strategy->method('validate')->willReturn(true);

        $validator = new Validator($strategy);
        $result = $validator->validateDataWithErrors($this->testDataArray);

        $this->assertSame(['isValid' => true], $result);
    }

    public function testValidateDataWithErrorsReturnsIsValidFalse(): void
    {
        $strategy = $this->createMock(ValidationStrategy::class);
        $strategy->method('validate')->willReturn(false);

        $validator = new Validator($strategy);
        $result = $validator->validateDataWithErrors($this->testDataArray);

        $this->assertSame(['isValid' => false], $result);
    }

    public function testValidateDataWithErrorsReturnsErrorsWhenGetErrorsMethodExists(): void
    {
        $strategy = $this->createMock(RequiredFieldsValidationStrategy::class);
        $strategy->method('validate')->willReturn(false);
        $strategy->method('getErrors')->willReturn(['error1', 'error2']);

        $validator = new Validator($strategy);
        $result = $validator->validateDataWithErrors($this->testDataArray);

        $this->assertSame(['isValid' => false, 'errors' => ['error1', 'error2']], $result);
    }
}
