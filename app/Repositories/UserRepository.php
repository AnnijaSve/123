<?php

namespace App\Repositories;

use Exception;

class UserRepository

{

    /**
     * @param string $email
     * @return array
     */
    public function findByEmail(string $email): array
    {
        $result = [
            'success' => false,
            'user' => null
        ];

        try {

            $user = query()
                ->select('*')
                ->from('users')
                ->where('email = :email')
                ->setParameter('email', $email)
                ->execute()
                ->fetchAssociative();

            $result = [
                'success' => true,
                'user' => $user
            ];

        } catch (Exception $e) {

            $exception = [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }

        if (!empty($exception)) {

            $result['success'] = false;
            $result['exception'] = $exception;
        }

        return $result;
    }
}