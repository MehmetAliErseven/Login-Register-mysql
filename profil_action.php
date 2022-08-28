<?php
require 'helper.php';
require 'DB_connection.php';
session_start();

if (get('con') == 'login') {
    $_SESSION['email'] = post('email');

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
        $sql = "SELECT employees. email, employees. password, employees. first_name, employees. text FROM hr. employees WHERE employees. email = '$email' AND employees. password = '$pass'";
        $result = $connection->query($sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $info = array($row['email'] => $row['password'], $row['first_name'], $row['text']);

        if (array_key_exists($email, $info)) {
            if ($info[$email] == $pass) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $info[0];
                $_SESSION['savedText'] = $info[1];
                header('location:profil_body.php');
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
    $connection = connect();
    $sql = "UPDATE hr.employees SET text = '$text' WHERE email = '$_SESSION[email]';";

    if ($connection->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connection->error;
    }

    $connection->close();
    header('location:profil_body.php?text=add');
}

if(get('p_color') == 'color') {
    setcookie('background', get('background'), time() +(86400 * 365));
    header('location:' .$_SERVER['HTTP_REFERER'] ?? 'index.php');
}

if (get('con') == 'logout') {
    session_destroy();
    session_start();
    $_SESSION['error'] = 'Logged out successful';
    header('location:index.php');
}