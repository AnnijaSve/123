<?php

namespace App\Models;

class User
{

    private string $name;
    private string $email;
    private string $password;
    private ?string $hashedEmail;

    public function __construct(

        string  $name,
        string  $email,
        string  $password,
        ?string $hashedEmail = null

    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->hashedEmail = $hashedEmail;

    }

    public function userName(): string
    {
        return $this->name;
    }

    public function userEmail(): string
    {
        return $this->email;
    }

    public function userPassword(): string
    {
        return $this->password;
    }

    public function hashedEmail(): string
    {
        return $this->hashedEmail;
    }

    public static function create(array $data): User
    {

        return new self(
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_BCRYPT),
            md5($data['email']),
        );

    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'hashed_email' => $this->hashedEmail,
        ];
    }


}