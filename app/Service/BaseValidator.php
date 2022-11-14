<?php

namespace App\Service;

use App\Attribute\Validator;
use App\DTO\DTOValidationError;
use Illuminate\Http\Request;
use ReflectionObject;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class BaseValidator
{

    public function __construct()
    {
        $this->populate();

        if ($this->autoValidateRequest()) {
            $this->validate();
        }
    }

    public function validate()
    {
        $errors = $this->validateProperty();

        if (!empty($errors)) {
            $response = new JsonResponse($errors, 422);
            $response->send();
            exit;
        }
    }

    public function getRequest(): Request
    {
        return Request::createFromGlobals();
    }

    protected function populate(): void
    {
        foreach ($this->getRequest()->toArray() as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    protected function autoValidateRequest(): bool
    {
        return true;
    }


    /**
     * @return DTOValidationError[]
     */
    protected function validateProperty(): array
    {
        $reflection = new ReflectionObject($this);
        $errors = [];

        foreach ($reflection->getMethods() as $method) {
            $attributes = $method->getAttributes(Validator::class);

            if (count($attributes) <= 0) continue;
            if (!$this->{$method->getName()}()) {
                foreach ($attributes as $attribute) {
                    $errors[] = new DTOValidationError(
                        $attribute->getArguments()['property'],
                        $attribute->getArguments()['errorMessage'],
                    );
                }
            }

        }
        return $errors;
    }
}
