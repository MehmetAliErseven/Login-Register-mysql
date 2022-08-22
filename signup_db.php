<?php
require 'db_connection.php';

function saveUser($first_name, $last_name, $email, $hire_date, $phone_number, $password, $salary, $job_id) {
    $conSave = connect();

    $ask = $conSave->prepare("INSERT INTO employees(first_name, last_name, email, hire_date, phone_number, password, salary, job_id) VALUES(?,?,?,?,?,?,?,?)");

    $ask->bind_param('ssssssdi', $first_name, $last_name, $email, $hire_date, $phone_number, $password, $salary, $job_id);
    $ask->execute();

    if ($conSave->errno > 0) {
        die("<b>Sorgu Hatası:</b> " . $conSave->error);
        return "Kaydetme sırasında bir hata oluştu";
    } else {
        $_SESSION['success'] = 'Sign up successfully complete';
    }

    $ask->close();
    $conSave->close();
}