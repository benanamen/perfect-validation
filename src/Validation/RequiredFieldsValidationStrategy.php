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
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        $this->errors = [];

        foreach ($this->requiredFields as $field) {
            $fieldValue = $data[$field] ?? null;
            $isFieldEmpty = empty($fieldValue);
            $isFieldArrayWithEmptyValues = is_array($fieldValue) && array_filter($fieldValue) === [];

            if ($isFieldEmpty || $isFieldArrayWithEmptyValues) {
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
