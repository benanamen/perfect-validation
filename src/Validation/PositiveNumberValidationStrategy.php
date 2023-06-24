<?php declare(strict_types=1);

namespace PerfectApp\Validation;

/**
 * Validates positive number greater than zero. Handles string & Integer numbers
 */
class PositiveNumberValidationStrategy implements ValidationStrategy
{
    /**
     * @param $data
     * @return bool
     */
    public function validate($data): bool
    {
        // Convert the data to a string
        $data = strval($data);

        // Check if the data is a valid numeric value
        if (!ctype_digit($data)) {
            return false;
        }

        // Convert the data to an integer
        $number = intval($data);

        // Check if the number is greater than zero
        return $number > 0;
    }
}
