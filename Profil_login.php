<?php
require 'DB_connection.php';

class Profil_login extends DB_connection {

    protected function getInfo ($email, $pass):array {
        $connection = $this->connect();
        $sql = "SELECT employees. email, employees. password, employees. first_name, employees. text FROM hr. employees WHERE employees. email = '$email' AND employees. password = '$pass'";
        $result = $connection->query($sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $info = array($row['email'] => $row['password'], $row['first_name'], $row['text']);
        $connection->close();

        return $info;
    }

    protected function setTextToDb ($text, $email) {
        $connection = $this->connect();
        $sql = "UPDATE hr.employees SET text = '$text' WHERE email = '$email' AND employee_id <> 0";
        $result = $connection->query($sql);
        $connection->close();
        return $result;
    }
}