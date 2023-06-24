<?php declare(strict_types=1);

namespace PerfectApp\Validation;

/**
 *
 */
class NumericValidationStrategy implements ValidationStrategy
{

    /**
     * @param $data
     * @return bool
     */
    public function validate($data): bool
    {
        // Return true if the data is a valid numeric value, false otherwise
        return is_numeric($data);
    }
}
