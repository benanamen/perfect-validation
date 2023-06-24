<?php declare(strict_types=1);

namespace Unit\Validation;

use PerfectApp\Validation\ValidationStrategy;
use PerfectApp\Validation\Validator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Validator::class)]
class ValidatorTest extends TestCase
{
    public function testValidateDataReturnsValidationResult()
    {
        // Create a mock ValidationStrategy
        $strategy = $this->createMock(ValidationStrategy::class);

        // Set up the expected behavior of the mock strategy
        $strategy->expects($this->once())
            ->method('validate')
            ->with('test_data')
            ->willReturn(true);

        // Create the Validator with the mock strategy
        $validator = new Validator($strategy);

        // Call the validateData method and assert the result
        $result = $validator->validateData('test_data');
        $this->assertTrue($result);
    }

    public function testSetValidationStrategyChangesStrategy()
    {
        // Create mock ValidationStrategy objects
        $strategy1 = $this->createMock(ValidationStrategy::class);
        $strategy2 = $this->createMock(ValidationStrategy::class);

        // Create the Validator with the first mock strategy
        $validator = new Validator($strategy1);

        // Call the setValidationStrategy method with the second mock strategy
        $validator->setValidationStrategy($strategy2);

        // Access the private $strategy property using reflection
        $reflector = new \ReflectionClass($validator);
        $property = $reflector->getProperty('strategy');
        $currentStrategy = $property->getValue($validator);

        // Assert that the current strategy is now the second mock strategy
        $this->assertSame($strategy2, $currentStrategy);
    }
}
