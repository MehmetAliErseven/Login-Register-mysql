<?php
class Employee {
    public $first_name;
    public $last_name;
    protected $email;
    protected $phone_number;
    public $hire_date;
    public $job_id;
    protected $salary;
    public $manager_id;
    public $department_id;
    private $password;
    public $text;

    function setFirst_name ($par) {
        $this->first_name = $par;
    }
    function getFirst_name () {
        echo $this->first_name . "<br>";
    }

    function setLast_name ($par) {
        $this->last_name = $par;
    }
    function getLast_name () {
        echo $this->last_name . "<br>";
    }

    function setEmail ($par) {
        $this->email = $par;
    }
    function getEmail () {
        echo $this->email . "<br>";
    }

    function setPhone_number ($par) {
        $this->phone_number = $par;
    }
    function getPhone_number () {
        echo $this->phone_number . "<br>";
    }

    function setHire_date ($par) {
        $this->hire_date = $par;
    }
    function getHire_date () {
        echo $this->hire_date . "<br>";
    }

    function setJob_id ($par) {
        $this->job_id = $par;
    }
    function getJob_id () {
        echo $this->job_id . "<br>";
    }

    function setSalary ($par) {
        $this->salary = $par;
    }
    function getSalary () {
        echo $this->salary . "<br>";
    }

    function setManager_id ($par) {
        $this->manager_id = $par;
    }
    function getManager_id () {
        echo $this->manager_id . "<br>";
    }

    function setDepartment_id ($par) {
        $this->department_id = $par;
    }
    function getDepartment_id () {
        echo $this->department_id . "<br>";
    }

    function setPassword ($par) {
        $this->password = $par;
    }
    function getPassword () {
        echo $this->password . "<br>";
    }

    function setText ($par) {
        $this->text = $par;
    }
    function getText () {
        echo $this->text . "<br>";
    }
}