<?php declare(strict_types=1);

require '../vendor/autoload.php';

use PerfectApp\Validation\RequiredFieldsValidationStrategy;
use PerfectApp\Validation\Validator;

$requiredFields = ['username', 'password'];
$data = [
    'username' => 'john_doe',
    'password' => 'secretpassword',
    'email' => 'john@example.com',
];

$required = new RequiredFieldsValidationStrategy($requiredFields);

$validator = new Validator($required);
$isValid = $validator->validateData($data);

if ($isValid) {
    echo "Validation passed! The data is valid.";
} else {
    $errors = $required->getErrors();
    foreach ($errors as $field => $message) {
        echo "Validation error for field '$field': $message";
    }
}

