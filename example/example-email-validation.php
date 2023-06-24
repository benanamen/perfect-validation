<?php declare(strict_types=1);

require '../vendor/autoload.php';

use PerfectApp\Validation\EmailValidationStrategy;
use PerfectApp\Validation\Validator;

$validator = new Validator(new EmailValidationStrategy());

$data = 'test@example.com';

if ($validator->validateData($data)) {
    echo "Data is valid.";
} else {
    echo "Data is invalid.";
}
