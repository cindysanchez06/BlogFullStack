<?php

namespace App\Services\Post;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
class postValidationService
{
    public function validateCreate(array $data): void
    {
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'content' => 'required|string|email|unique:users',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
