<?php declare(strict_types=1);

namespace PerfectApp\Validation;

/**
 *
 */
class EmailValidationStrategy implements ValidationStrategy
{

    /**
     * @param $data
     * @return bool
     */
    public function validate($data): bool
    {
        // Return true if the data is a valid email address, false otherwise
        return filter_var($data, FILTER_VALIDATE_EMAIL) !== false;
    }
}
