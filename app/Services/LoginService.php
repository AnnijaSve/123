<?php

namespace App\Services;

use App\Repositories\UserRepository;

class LoginService
{
    /** @var UserRepository */
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * @param array $loginData
     * @return array
     */
    public function login(array $loginData): array
    {

        $result = [
            'success' => false,
            'user' => null,
            'messages' => []
        ];

        if (!empty($loginData)) {

            $usersQuery = $this->userRepository->findByEmail($loginData['email']);

            if ($usersQuery['success']) {

                if (empty($usersQuery['user'])) {
                    $result['messages']['email'] = 'Wrong e-mail or password!';
                } elseif (!password_verify($loginData['password'] ?? '', $usersQuery['user']['password'])) {
                    $result['messages']['password'] = 'Invalid password';
                } else {
                    $result['success'] = true;
                    $result['user'] = $usersQuery;
                }
            }
        }
        return $result;
    }

}