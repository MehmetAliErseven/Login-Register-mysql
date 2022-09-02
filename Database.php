<?php

class Database {
    public function connect () {
        $servername = 'localhost';
        $dbName = 'hr';
        $username = 'root';
        $password = 'ma123456';

        $dsn = "mysql:host=$servername;dbname=$dbName;charset=utf8mb4";

        try {
            $connect = new PDO($dsn, $username, $password);

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connect;

        } catch (PDOException $error) {
            echo $error->getMessage();
            exit();
        }
    }
}