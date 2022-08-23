<?php
require '../db_connection.php';
require 'Employee.php';

function saveEmployee($first_name, $last_name, $email, $phone_number, $hire_date, $job_id, $salary, $manager_id, $department_id, $password, $text) {
    $conSave = connect();

    $ask = $conSave->prepare("INSERT INTO employees(first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id, password, text) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

    $ask->bind_param('sssssidiiss', $first_name, $last_name, $email, $phone_number, $hire_date, $job_id, $salary, $manager_id, $department_id, $password, $text);
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

/* Get all table info. */
//getInfo("SELECT * FROM hr.table_name");

/* Get table info by id. */
//getInfo("select * from table_name where table_name_id = $id");

/* Give table_name and id number for delete from db. */
//runQuery("DELETE FROM hr.table_name WHERE table_name_id = ?", "i", $id);

/* Give table_name id number and set column and variable for update. */
//runQuery("UPDATE hr.table_name SET column_name = 'variable_name' WHERE table_name_id = ?", "s", $id);

