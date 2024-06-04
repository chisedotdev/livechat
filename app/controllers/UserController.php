<?php

namespace Controllers;

require_once('BaseController.php');
require_once(__DIR__ . '/../models/User.php');

use Models\User;


class UserController extends BaseController
{
    public function showLogin($data = [])
    {
        $this->render('auth/login', $data);
    }

    public function showRegister($data = [])
    {
        $this->render('auth/register', $data);
    }

    public function login($email, $password)
    {
        $user = new User();
        return $user->login($email, $password);
    }

    public function register($email, $username, $password)
    {
        $user = new User();
        return $user->register($email, $username, $password);
    }

    public function logout()
    {
        session_destroy();
        $_SESSION = [];
    }
}