[![codecov](https://codecov.io/gh/benanamen/perfect-validation/branch/master/graph/badge.svg?token=ufepwQP40M)](https://codecov.io/gh/benanamen/perfect-validation)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/benanamen/perfect-validation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-validation/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/benanamen/perfect-validation/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-validation/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/benanamen/perfect-validation/badges/build.png?b=master)](https://scrutinizer-ci.com/g/benanamen/perfect-validation/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/benanamen/perfect-validation/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=coverage)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=sqale_index)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=reliability_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)

[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=bugs)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-validation&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-validation)


# Validator Class Documentation

The `Validator` class is responsible for validating data using different validation strategies. It allows you to set and switch between different validation strategies based on your specific requirements.

## Class Signature

```php
class Validator {
    private ValidationStrategy $strategy;

    public function __construct(ValidationStrategy $strategy);
    public function setValidationStrategy(ValidationStrategy $strategy): void;
    public function validateData($data): mixed;
    public function validateDataWithErrors($data): array;
}
```

## Constructor

### `__construct(ValidationStrategy $strategy)`

The constructor accepts a `ValidationStrategy` object as a parameter, which determines the specific validation strategy to use. The initial validation strategy is set during object creation.

## Public Methods

### `setValidationStrategy(ValidationStrategy $strategy): void`

This method allows you to set a new validation strategy by providing a `ValidationStrategy` object as a parameter. It replaces the existing validation strategy with the new one.

### `validateData($data): mixed`

The `validateData` method is used to perform data validation using the current validation strategy. It accepts the data to be validated as a parameter and returns the validation result.

### `validateDataWithErrors($data): array`

The `validateDataWithErrors` method performs data validation and returns an array containing the validation status and any errors, if applicable. If the strategy object has a `getErrors` method, the errors will be included in the array.

- Parameters:
  - `$data`: The data to be validated.

- Return:
  - Returns the validation result, which depends on the specific validation strategy being used. It can be a boolean value (`true` for a successful validation, `false` otherwise) or other data types based on the strategy implementation or an array with the validation status and errors, if any.

## Usage Example

Here's an example that demonstrates the basic usage of the `Validator` class:

```php
// Create a validator with a specific validation strategy
$validator = new Validator($requiredFieldsStrategy);

// Set a new validation strategy if needed
$validator->setValidationStrategy($customValidationStrategy);

// Perform data validation
$data = $_POST; // Example data to be validated
$result = $validator->validateData($data);

// Perform data validation with errors
$resultWithErrors = $validator->validateDataWithErrors($data);

// Check the validation result
if ($result === true) {
    echo "Validation passed! The data is valid.";
} elseif (isset($resultWithErrors['errors'])) {
    echo "Validation failed! Errors: " . implode(', ', $resultWithErrors['errors']);
} else {
    echo "Validation failed! Please check the data for errors.";
}
```

In the example above:
1. The `Validator` class is instantiated with an initial validation strategy (`$requiredFieldsStrategy`).
2. If needed, you can use the `setValidationStrategy` method to switch to a different validation strategy.
3. The `validateData` and `validateDataWithErrors` methods are called with the data to be validated (`$data`).
4. The returned results are checked to determine if the validation passed or failed.
5. Based on the validation results, you can perform appropriate actions or display error messages.

Note: The specific validation strategies used (`$requiredFieldsStrategy` and `$customValidationStrategy`) are not shown in the example, as they depend on your specific implementation.
