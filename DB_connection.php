<?php

class DB_connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "ma123456";
    private $schema = "hr";
    private $port = "3306";

    protected function connect () {
        $connect = new mysqli($this->servername, $this->username, $this->password, $this->schema, $this->port);

        if ($connect->connect_error) {
            die("Bağlantı hatası: " . $connect->connect_error);
        }

        $connect->set_charset("utf8mb4");

        return $connect;
    }
}