<?php declare(strict_types=1);

namespace PerfectApp\Validation;

/**
 *
 */
class RequiredFieldsValidationStrategy implements ValidationStrategy
{
    /**
     * @var array
     */
    private array $requiredFields;
    /**
     * @var array
     */
    private array $errors;

    /**
     * @param array $requiredFields
     */
    public function __construct(array $requiredFields)
    {
        $this->requiredFields = $requiredFields;
        $this->errors = [];
    }

    /**
     * @param $data
     * @return bool
     */
    public function validate($data): bool
    {
        $this->errors = [];

        foreach ($this->requiredFields as $field) {
            if (empty($data[$field])) {
                $msg = ucwords(str_replace('_', ' ', $field));
                $this->errors[$field] = $msg . ' is required.';
            }
        }

        return empty($this->errors); // Validation passed if no errors
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
