<?php


namespace App\DTO;


class DTOValidationError
{
    public function __construct(
        public string $property,
        public string $message
    ) {}
}
