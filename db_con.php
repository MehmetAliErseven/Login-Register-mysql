<?php

include 'helper.php';
session_start();

function connect () {
    $servername = "localhost";
    $username = "root";
    $password = "ma123456";
    $schema = "users";
    $port = "3306";

    $connect = new mysqli($servername, $username, $password, $schema, $port);

    if ($connect->connect_error) {
        die("Bağlantı hatası: " . $connect->connect_error);
    }

    $connect->set_charset("utf8mb4");

    return $connect;
}


if (get('con') == 'login') {
    $_SESSION['email'] = post('email');
    $_SESSION['password'] = post('password');

    if (!post('email')) {
        $_SESSION['error'] = 'Please enter your email';
        header('location:index.php');
        exit();
    } elseif (!post('password')) {
        $_SESSION['error'] = 'Please enter your password';
        header('location:index.php');
        exit();
    } else {
        $email = post('email');
        $pass = post('password');
        $name = post('name');
        $connection = connect();
        $sql = "SELECT user. email, user. password, user. name FROM users. user WHERE user. email = '$email' AND user. password = '$pass'";
        $result = $connection->query($sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $info = array($row['email'] => $row['password'], $row['name']);

        if (array_key_exists($email, $info)) {

            if ($info[$email] == $pass) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $info[0];
                header('location:profil.php');
                exit();
            }
        }else {
            $_SESSION['error'] = 'Wrong email or password';
            header('location:index.php');
            exit();
        }

        $connection->close();
    }
}