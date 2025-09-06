<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{RequiredRule};

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator->add("required", new RequiredRule());
    }

    public function validateRegister(array $fromData)
    {
        $this->validator->validate($fromData, [
            "email" => ["required"],
            "age" => ["required"],
            "country" => ["required"],
            "socialMediaUrl" => ["required"],
            "password" => ["required"],
            "confirmPassword" => ["required"],
            "tos" => ["required"]
        ]);
    }
}
