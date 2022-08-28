<?php
// db connection.
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

// for delete or update from db.
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

// for get tables info.
function getInfo($query) {
    $conGet = connect();
    $sql = $query;
    $result = $conGet->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            print_r($row);
            echo "<br>";
            echo "<br>";
        }
    } else {
        echo "0 Result";
    }

    $conGet->close();
}