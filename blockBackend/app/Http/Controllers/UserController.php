<?php

namespace App\Http\Controllers;

use App\Services\User\userService;
use App\Services\User\userValidationService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class UserController extends Controller
{
    protected userService $userService;
    private userValidationService $userValidationService;

    public function __construct(UserService $userService, userValidationService $userValidationService )
    {
        $this->userService = $userService;
        $this->userValidationService = $userValidationService;
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $this->userValidationService->validateRegistration($request->all());
            $this->userService->createUser($request->all());
            return response()->json(['message' => 'User registered successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User registration failed'], 400);
        }
    }

    public function getMiddlewareForMethod($method)
    {
        return parent::getMiddlewareForMethod($method); // TODO: Change the autogenerated stub
    }
}
