<?php

namespace Models;

require_once('Database.php');

use PDO;
use PDOException;

class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    private function getUserByEmail($email)
    {
        try {
            // work in progress
        } catch ( PDOException $e ) {
            return ['status' => false, 'msg' => 'Something went wrong.'];
        }
    }

    private function checkDuplicate($email, $username)
    {
        // check if email already in the database
        $stmt = $this->pdo->prepare('
            select email from users where email = :email
        ');
        $stmt->execute(['email' => $email]);
        $_email = $stmt->fetch();

        // check if username already in the database
        $stmt = $this->pdo->prepare('
            select username from users where username = :username
        ');
        $stmt->execute(['username' => $username]);
        $_username = $stmt->fetch();

        if ( $_email === false && $_username === false ) {
            return true;
        }
        
        if ( $_email !== false && $_email['email'] === $email ) {
            return ['status' => false, 'msg' => 'Email already exist. Please try again.'];
        } 
        
        if ( $_username !== false && $_username['username'] === $username ) {
            return ['status' => false, 'msg' => 'Username already exist. Please try again.'];
        }     
    }

    public function login($email, $password)
    {
        try {
            // check if email exists in the db if not then there is no user with that email return immediately
            $stmt = $this->pdo->prepare('
                select * from users where email = :email
            ');
            $stmt->execute(['email' => $email]);

            $user = $stmt->fetch();

            if ( $user === false ) {
                return ['status' => false, 'msg' => 'Incorrect email or password. Please try again.'];
            }

            // verify password
            if ( !password_verify($password, $user['password']) ) {
                return ['status' => false, 'msg' => 'Incorrect email or password. Please try again.'];
            }

            return ['status' => true, 'msg' => 'Login success.', 'username' => $user['username']];
        } catch ( PDOException $e ) {
            return ['status' => false, 'msg' => 'Something went wrong.'];
        }
    }

    public function register($email, $username, $password)
    {
        try {
            // check if username and email already in the database
            $dupl = $this->checkDuplicate($email, $username);

            if ( gettype($dupl) === 'array' ) {
                return $dupl;
            }

            $stmt = $this->pdo->prepare('
                insert into users (
                    email, 
                    username, 
                    password
                ) values (
                    :email,
                    :username,
                    :password
                )
            ');
            $stmt->execute([
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            return ['status' => true, 'msg' => "Congratulations, registration was successful! Welcome to our community, $username. Redirecting..."];

        } catch ( PDOException $e ) {
            return ['status' => false, 'msg' => 'Something went wrong.'];
        }
    }
}