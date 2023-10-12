<?php declare(strict_types=1);

namespace PerfectApp\Validation;


class Validator
{
    /**
     * @var ValidationStrategy
     */
    private ValidationStrategy $strategy;

    /**
     * @param ValidationStrategy $strategy
     */
    public function __construct(ValidationStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param ValidationStrategy $strategy
     * @return void
     */
    public function setValidationStrategy(ValidationStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function validateData($data): mixed
    {
        return $this->strategy->validate($data);
    }

    public function validateDataWithErrors($data): array
    {
        $isValid = $this->strategy->validate($data);
        if ($isValid) {
            return ['isValid' => true];
        }

        if (method_exists($this->strategy, 'getErrors')) {
            return [
                'isValid' => false,
                'errors' => $this->strategy->getErrors()
            ];
        }

        return ['isValid' => false];
    }
}
