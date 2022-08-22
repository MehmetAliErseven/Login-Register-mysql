<?php

function connect () {
    $servername = "localhost";
    $username = "root";
    $password = "ma123456";
    $schema = "hr";
    $port = "3306";

    $connect = new mysqli($servername, $username, $password, $schema, $port);

    if ($connect->connect_error) {
        die("Bağlantı hatası: " . $connect->connect_error);
    }

    $connect->set_charset("utf8mb4");

    return $connect;
}

function runQuery($query, $type, $var) {
    $connection = connect();
    $ask = $connection->prepare($query);

    $ask->bind_param($type, $var);
    $ask->execute();

    if ($connection->errno > 0) {
        die("<b>Sorgu Hatası:</b> " . $connection->error);
        return "Hata oluştu";
    }

    $ask->close();
    $connection->close();
}