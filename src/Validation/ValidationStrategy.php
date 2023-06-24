<?php declare(strict_types=1);

namespace PerfectApp\Validation;

interface ValidationStrategy {

    public function validate($data);
}
