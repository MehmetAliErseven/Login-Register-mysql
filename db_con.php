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
        $connection = connect();
        $sql = "SELECT user. email, user. password, user. name, user. text FROM users. user WHERE user. email = '$email' AND user. password = '$pass'";
        $result = $connection->query($sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $info = array($row['email'] => $row['password'], $row['name'], $row['text']);

        if (array_key_exists($email, $info)) {
            if ($info[$email] == $pass) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $info[0];
                $_SESSION['savedText'] = $info[1];
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

if (get('p_text') == 'text') {
    $text = post('text');
    $_SESSION['savedText'] = $text;
    $conn = connect();
    $sql = "UPDATE users.user SET text = '$text' WHERE email = '$_SESSION[email]';";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    header('location:profil.php?text=add');
}

if (get('con') == 'logout') {
    session_destroy();
    session_start();
    $_SESSION['error'] = 'Logged out successful';
    header('location:index.php');
}

if(get('p_color') == 'color') {
    setcookie('back', get('back'), time() +(86400 * 365));
    header('location:' .$_SERVER['HTTP_REFERER'] ?? 'index.php');
}