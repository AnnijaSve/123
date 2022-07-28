<?php

namespace App\Controllers;

use App\Services\LoginService;

class LoginController
{

    /** @var LoginService */
    protected LoginService $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function index()
    {
        return require_once __DIR__ . '/../Views/LoginView.php';
    }


    public function login()
    {

        $login = $this->loginService->login($_POST);
        $messages = [];

        if ($login['success']) {
            $_SESSION['id'] = $login['user']['id'];
            header('Location: /dashboard');
        } else {
            $messages = $login['messages'];
            require_once __DIR__ . '/../Views/LoginView.php';
        }
    }
}