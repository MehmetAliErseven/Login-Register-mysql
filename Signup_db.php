<?php
require 'DB_connection.php';

class Signup_db extends DB_connection {

    protected function saveUserToDb($first_name, $last_name, $email, $hire_date, $phone_number, $password, $salary, $job_id) {
        $conSave = $this->connect();

        $ask = $conSave->prepare("INSERT INTO employees(first_name, last_name, email, hire_date, phone_number, password, salary, job_id) VALUES(?,?,?,?,?,?,?,?)");

        $ask->bind_param('ssssssdi', $first_name, $last_name, $email, $hire_date, $phone_number, $password, $salary, $job_id);
        $ask->execute();

        if ($conSave->errno > 0) {
            die("<b>Kaydetme sırasında bir hata oluştu</b> " . $conSave->error);
        }

        $ask->close();
        $conSave->close();
    }

    protected function searchEmail ($email) {
        $connection = $this->connect();
        $select = mysqli_query($connection, "SELECT email FROM employees WHERE email = '$email'") or exit(mysqli_error($connection));
        $connection ->close();
        return $select;
    }

    protected function searchJobId ($job_title) {
        $connection = $this->connect();
        $sql = "SELECT job_id FROM jobs WHERE job_title = '$job_title'";
        $result = $connection->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $connection->close();
        return $row['job_id'];
    }
}