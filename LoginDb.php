<?php
require 'Database.php';

class LoginDb {

    protected function getInfo ($email):array {
        $db = new Database();
        $connection = $db->connect();
        $sql = "SELECT employees. email, employees. password, employees. first_name, employees. text FROM hr. employees WHERE employees. email = '$email'";
        $result = $connection->query($sql);

        $row = $result->fetch(PDO::FETCH_ASSOC);
        return array($row['email'] => $row['password'], $row['first_name'], $row['text']);
    }

    protected function setTextToDb ($text, $email) {
        $db = new Database();
        $connection = $db->connect();
        $sql = "UPDATE hr.employees SET text = '$text' WHERE email = '$email' AND employee_id <> 0";
        return $connection->query($sql);
    }
}