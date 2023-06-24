<?php declare(strict_types=1);

namespace PerfectApp\Validation;

class WhitelistValidationStrategy implements ValidationStrategy
{
    /**
     * @param array $whitelist
     */
    public function __construct(private array $whitelist)
    {
    }

    /**
     * @param $data
     * @return bool
     */
    public function validate($data): bool
    {
        foreach ($data as $key => $val) {
            if (!in_array($key, $this->whitelist, true)) {
                return false; // Validation failed
            }
        }

        return true; // Validation passed
    }
}
