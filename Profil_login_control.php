<?php
require 'Profil_login.php';

class Profil_login_control extends Profil_login {

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
                exit();
            } elseif (!$this->pass) {
                $_SESSION['error'] = 'Please enter your password';
                header('location:index.php');
                exit();
            } else {
                $email = $this->email;
                $pass = $this->pass;

                $info = parent::getInfo($email, $pass);

                if (array_key_exists($email, $info)) {
                    if ($info[$email] == $pass) {
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $info[0];
                        $_SESSION['savedText'] = $info[1];
                        header('location:profil_body.php');
                        exit();
                    }
                }else {
                    $_SESSION['error'] = 'Wrong email or password';
                    header('location:index.php');
                    exit();
                }
            }
        }
    }
}

class Logout {
    public function __construct($con_out){
        if ($con_out == 'logout') {
            session_destroy();
            session_start();
            $_SESSION['error'] = 'Logged out successful';
            header('location:index.php');
        }
    }
}