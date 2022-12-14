<?php
require 'SignupDb.php';

class SignupControl extends SignupDb {
    private $first_name;
    private $last_name;
    private $email;
    private $hire_date;
    private $phone_number;
    private $password;
    private $r_password;
    private $salary;
    private $job_title;

    public function __construct($first_name, $last_name, $email, $hire_date, $phone_number, $password, $r_password, $salary, $job_title) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->hire_date = $hire_date;
        $this->phone_number = $phone_number;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->r_password = $r_password;
        $this->salary = $salary;
        $this->job_title = $job_title;
    }

    public function checkPassword () {
        if(!password_verify($this->r_password, $this->password)) {
            $_SESSION['error'] = 'Your password not same';
            header('location:signup_body.php');
            exit();
        }
    }

    public function checkEmail () {
        $result = parent::searchEmail($this->email);
        if($result == $this->email) {
            $_SESSION['m_error'] = 'This email address is used by another user, please try another...';
            header('location:signup_body.php');
            exit();
        }
    }

    public function getJobId () {
        return parent::searchJobId($this->job_title);
    }

    public function saveUser () {
        parent::saveUserToDb($this->first_name, $this->last_name, $this->email, $this->hire_date, $this->phone_number, $this->password, $this->salary, $this->getJobId());

        $_SESSION['success'] = 'Sign up successfully complete';
    }
}

