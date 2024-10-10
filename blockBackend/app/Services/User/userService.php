<?php

namespace App\Services\User;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class userService
{
    protected userServiceDatabase $userServiceDatabase;
    private userValidationService $userValidationService;

    /**
     * @param userServiceDatabase $userServiceDatabase
     * @param userValidationService $userValidationService
     */
    public function __construct(userServiceDatabase $userServiceDatabase, userValidationService $userValidationService )
    {
        $this->userServiceDatabase = $userServiceDatabase;
        $this->userValidationService = $userValidationService;
    }

    /**
     * @param array $data
     * @return void
     * @throws ValidationException
     */
    public function createUser(array $data)
    {
        $this->userValidationService->validateRegistration($data);
        $this->userServiceDatabase->createUser($data);
    }

    /**
     * @param int $userId
     * @return string
     */
    private function generateToken(int $userId): string
    {
        $expirationTime = time() + 3600;
        $tokenString = $userId . '|' . $expirationTime;
        return base64_encode($tokenString);
    }

    /**
     * @param array $data
     * @return string
     * @throws AuthenticationException
     * @throws ValidationException
     */
    public function authenticateUser(array $data){
        $this->userValidationService->validateLogin($data);
        $user = $this->userServiceDatabase->getUserByEmail($data['email']);
        if (!$user || !Hash::check($data['password'], $user->getPassword())) {
            throw new AuthenticationException('Invalid credentials');
        }
        return  $this->generateToken($user->getId());
    }
}
