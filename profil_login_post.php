<?php
require 'helper.php';
session_start();

if (isset($_POST['email']) || isset($_POST['password'])) {

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $pass = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    $con = get('con');

    require 'Profil_login_control.php';
    $login = new Profil_login_control($email, $pass, $con);
    $login->login();
}

if(get('p_text')) {
    $textFrom_get = get('p_text');
    $savedText = trim(htmlspecialchars(post('text')));
    $email = $_SESSION['email'];
    require 'Profil_in_control.php';
    $profil_in = new Profil_settext($textFrom_get, $email, $savedText);
    $profil_in->setText();
}


if (get('p_color')) {
    $color = get('p_color');
    $background_color = get('background');
    require 'Profil_in_control.php';
    $profil_background = new Profil_background($color, $background_color);
    $profil_background->setBackground();
}


if (get('con_out')) {
    $con_out = get('con_out');
    require 'Profil_login_control.php';
    $logout = new Logout($con_out);
}