<?php
session_start();

if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['hire_date'], $_POST['phone_number'], $_POST['password'], $_POST['r_password'], $_POST['salary'], $_POST['job_title'])) {

    $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
    $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $hire_date = date("Y-m-d", strtotime($_POST['hire_date']));
    $phone_number = trim(filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $r_password = trim(filter_input(INPUT_POST, 'r_password', FILTER_SANITIZE_STRING));
    $salary = trim(filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_INT));
    $job_title = $_POST['job_title'];


    require 'SignupControl.php';
    $save = new SignupControl($first_name, $last_name, $email, $hire_date, $phone_number, $password, $r_password, $salary, $job_title);
    $save->checkPassword();
    $save->checkEmail();
    $save->saveUser();

    header('location:index.php');
}