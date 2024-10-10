<?php

namespace App\Services\User;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class userValidationService
{
    public function validateRegistration(array $data): void
    {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function validateLogin(array $data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
