<?php


namespace App\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Validator {

    public function __construct(
        public string $errorMessage,
        public string $property
    ) {}
}
