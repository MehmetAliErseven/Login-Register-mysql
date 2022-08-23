<?php
require '../db_connection.php';
require 'Jobs.php';

function saveJobs($job_title, $min_salary, $max_salary) {
    $conSave = connect();

    $ask = $conSave->prepare("INSERT INTO jobs(job_title, min_salary, max_salary) VALUES(?,?,?)");

    $ask->bind_param('sdd', $job_title, $min_salary, $max_salary);
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
