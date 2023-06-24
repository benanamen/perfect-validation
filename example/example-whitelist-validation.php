<?php declare(strict_types=1);

require '../vendor/autoload.php';

use PerfectApp\Validation\Validator;
use PerfectApp\Validation\WhitelistValidationStrategy;

$whitelist = ["username", "password"];
$data = [
    "username" => "john_doe",
    "password" => "secretpassword",
    // "email" => "john@example.com"
];

$whiteListValidator = new WhitelistValidationStrategy($whitelist);
$validator = new Validator($whiteListValidator);

if ($validator->validateData($data)) {
    echo "Validation passed! The data is valid.";
} else {
    echo "Validation failed! The data is invalid.";
}
