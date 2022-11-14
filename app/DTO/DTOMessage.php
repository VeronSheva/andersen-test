<?php


namespace App\DTO;


use App\Attribute\Validator;
use App\Service\BaseValidator;
use JetBrains\PhpStorm\Pure;

class DTOMessage extends BaseValidator
{
    public $name;

    public $email;

    public $message;

    #[Pure]
    #[Validator(
        errorMessage: "Invalid name",
        property: "name"
    )]
    public function nameValidate(): bool
    {
        if (gettype($this->name) !== 'string') return false;
        $length = strlen($this->name);
        if ($length < 2 || $length > 50) return false;
        return true;
    }

    #[Pure]
    #[Validator(
        errorMessage: "Invalid message",
        property: "message"
    )]
    public function messageValidate(): bool
    {
        if (gettype($this->message) !== 'string') return false;
        $length = strlen($this->message);
        if ($length < 2 || $length > 200) return false;
        return true;
    }

    #[Pure]
    #[Validator(
        errorMessage: "Invalid email",
        property: "email"
    )]

    public function emailValidate(): bool
    {
        return (bool) filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

}
