<?php
require 'LoginDb.php';

class LoginControl extends LoginDb {

    private $email;
    private $pass;
    private $con;

    public function __construct($email, $pass, $con) {
        $this->email = $email;
        $this->pass = $pass;
        $this->con = $con;
    }

    public function login () {
        if ($this->con == 'login') {
            $_SESSION['email'] = $this->email;

            if (!$this->email) {
                $_SESSION['error'] = 'Please enter your email';
                header('location:index.php');
            } elseif (!$this->pass) {
                $_SESSION['error'] = 'Please enter your password';
                header('location:index.php');
            } else {
                $email = $this->email;
                $pass = $this->pass;

                $info = parent::getInfo($email);

                if (array_key_exists($email, $info)) {
                    if (password_verify($pass, $info[$email])) {
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $info[0];
                        $_SESSION['savedText'] = $info[1];
                        header('location:profil_body.php');
                    }else {
                        $_SESSION['error'] = 'Wrong email or password';
                        header('location:index.php');
                    }
                }else {
                    $_SESSION['error'] = 'Wrong email or password';
                    header('location:index.php');
                }
            }
            exit();
        }
    }
}