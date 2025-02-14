<?php

namespace App\Http\Controllers;

use App\Services\User\userService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class UserController extends Controller
{
    protected userService $userService;

    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $this->userService->createUser($request->all());
            return response()->json(['message' => 'User registered successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User registration failed'], 400);
        }
    }
}
