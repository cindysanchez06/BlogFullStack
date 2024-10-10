<?php

namespace App\Http\Controllers;

use App\Services\User\userService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class AuthController extends Controller
{
    protected userService $userService;

    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request): JsonResponse
    {
        try {
            $token = $this->userService->authenticateUser($request->all());
            return response()->json(['token' => $token], 200);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return response()->json(['message' => "User login failed $error"], 400);
        }
    }

}
