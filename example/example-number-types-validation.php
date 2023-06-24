<?php declare(strict_types=1);

/* Demonstrates setting additional validation strategies with setValidationStrategy method */

require '../vendor/autoload.php';

use PerfectApp\Validation\CtypeDigitValidationStrategy;
use PerfectApp\Validation\NumericValidationStrategy;
use PerfectApp\Validation\PositiveNumberValidationStrategy;
use PerfectApp\Validation\Validator;


//Set Initial Strategy
$validator = new Validator(new NumericValidationStrategy());

$data = '1337e0';
if ($validator->validateData($data)) {
    echo "Data is valid.";
} else {
    echo "Data is invalid.";
}

// Change the validation strategy to CtypeDigitValidationStrategy
$validator->setValidationStrategy(new CtypeDigitValidationStrategy());

$data = '0';
if ($validator->validateData($data)) {
    echo "Data is valid.";
} else {
    echo "Data is invalid.";
}

// Change the validation strategy to PositiveNumberValidationStrategy
$validator->setValidationStrategy(new PositiveNumberValidationStrategy());

$data = 1;
if ($validator->validateData($data)) {
    echo "Data is valid.";
} else {
    echo "Data is invalid.";
}

if (!$validator->validateData($data)) {
    throw new InvalidArgumentException('Invalid ID');
}
