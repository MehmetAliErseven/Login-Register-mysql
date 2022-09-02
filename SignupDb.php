<?php
require 'Database.php';

class SignupDb {

    protected function saveUserToDb($first_name, $last_name, $email, $hire_date, $phone_number, $password, $salary, $job_id) {
        $db = new Database();
        $connection = $db->connect();

        $save = $connection->prepare("INSERT INTO employees(first_name, last_name, email, hire_date, phone_number, password, salary, job_id) VALUES(:first_name, :last_name, :email, :hire_date, :phone_number, :password, :salary, :job_id)");

        $save->bindValue(':first_name', $first_name, PDO::PARAM_STR);
        $save->bindValue(':last_name', $last_name, PDO::PARAM_STR);
        $save->bindValue(':email', $email, PDO::PARAM_STR);
        $save->bindValue(':hire_date', $hire_date, PDO::PARAM_STR);
        $save->bindValue(':phone_number', $phone_number, PDO::PARAM_STR);
        $save->bindValue(':password', $password, PDO::PARAM_STR);
        $save->bindValue(':salary', $salary, PDO::PARAM_INT);
        $save->bindValue(':job_id', $job_id, PDO::PARAM_INT);

        $save->execute();
    }

    protected function searchEmail ($email) {
        $db = new Database();
        $connection = $db->connect();
        $result = $connection->query("SELECT email FROM employees WHERE email = '$email'");
        return $result->fetchColumn();
    }

    protected function searchJobId ($job_title) {
        $db = new Database();
        $connection = $db->connect();
        $sql = "SELECT job_id FROM jobs WHERE job_title = '$job_title'";
        $result = $connection->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['job_id'];
    }
}